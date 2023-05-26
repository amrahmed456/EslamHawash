<?php

class Images{

	private $directory;

	public function __construct($dir = '../')
	{	
		$this->directory = $dir . DB_SETTINGS['uploads'];
	}
	public function validate_image($file){

		$image = $_FILES[$file];

		
		if($image['error'] == 4 && $image['size'] == 0){
			// image not found
			
			return false;
			
		}else{
			
			if( $image['size'] > 800000000 ){
				// 25 MB
				
				return true;
			}
			
		}
		
		return true;

	}

    public function upload_image($folder_key, $image_key  , $compression = 70 , $file = 'file', $is_panorama , $logoPosition = 'bottom'){
		// $file is the name of the input to upload

		
		if(!$this->validate_image($file)){
			return false;
			// photo dosen't meet the specifications decalred in the validation function
		}
		
		$target_dir 	= $this->directory . $folder_key . "/";

		// check if file exists
		if(!file_exists($target_dir)){
			// create new directory in uploaded_files
			mkdir($target_dir);
			chmod($this->directory, 0777);
		}
		
		$tmp_name = $_FILES[$file]['tmp_name'];
		
		$img_type = $_FILES[$file]['type'];

		$destination_file = $target_dir . $image_key . '.webp';

		$is_panorama = ($image_key == 'personalimg') ? true : $is_panorama;
		
		if( $img_type == 'image/jpeg'){
			$image = imagecreatefromjpeg($tmp_name);
			self::watermark_and_convert_to_webp($image,$destination_file, $compression,$is_panorama, $logoPosition);
		}else if( $img_type == 'image/png'){
			$image = imagecreatefrompng($tmp_name);
			self::watermark_and_convert_to_webp($image,$destination_file, $compression,$is_panorama, $logoPosition);
		}
		return true;

    }

	public function getPosition($positon,$imageW , $imageH, $wtW, $wtH){
		$positions = ['x' => 0, 'y' => 0];
		if($positon == 'top'){
			$positions['x'] = ($imageW / 2) - ($wtW / 2);
			$positions['y'] = 0.1*$imageH - ($wtH / 2);
		}else if($positon == 'top-left'){
			$positions['x'] = 0.1*$imageW - ($wtW / 2);
			$positions['y'] = 0.1*$imageH - ($wtH / 2);
		}else if($positon == 'top-right'){
			$positions['x'] = 0.9*$imageW - ($wtW / 2);
			$positions['y'] = 0.1*$imageH - ($wtH / 2);
		}else if($positon == 'bottom-left'){
			$positions['x'] = 0.1*$imageW - ($wtW / 2);
			$positions['y'] = 0.9*$imageH - ($wtH / 2);
		}else if($positon == 'bottom-right'){
			$positions['x'] = 0.9*$imageW - ($wtW / 2);
			$positions['y'] = 0.9*$imageH - ($wtH / 2);
		}else{
			// bottom is default
			$positions['x'] = ($imageW / 2) - ($wtW / 2);
			$positions['y'] = 0.9*$imageH - ($wtH / 2);
		}

		return $positions;
	}

	public function watermark_and_convert_to_webp($img, $destination_file, $compression,$is_panorama , $logoPosition) {
		if($is_panorama){
			imagewebp($img, $destination_file, $compression);
			return;
		}
		
		$watermark = imagecreatefrompng('watermark.png');
		imagealphablending($watermark, false);
		imagesavealpha($watermark, true);
		$img_w = imagesx($img);
		$img_h = imagesy($img);
		$wtrmrk_w = imagesx($watermark);
		$wtrmrk_h = imagesy($watermark);
		$dst_x = ($img_w / 2) - ($wtrmrk_w / 2);
		$dst_y = ($img_h / 2) - ($wtrmrk_h / 2);
		imagecopy($img, $watermark, $dst_x, $dst_y, 0, 0, $wtrmrk_w, $wtrmrk_h);

		$watermarkBottom = imagecreatefrompng('watermark-bottom.png');
		imagealphablending($watermarkBottom, false);
		imagesavealpha($watermarkBottom, true);
		$wtrmrk_w = imagesx($watermarkBottom);
		$wtrmrk_h = imagesy($watermarkBottom);
		
		$positions = self::getPosition($logoPosition,$img_w,$img_h,$wtrmrk_w,$wtrmrk_h);
		$dst_x = $positions['x'];
		$dst_y = $positions['y'];
		imagecopy($img, $watermarkBottom, $dst_x, $dst_y, 0, 0, $wtrmrk_w, $wtrmrk_h);
		
		imagewebp($img, $destination_file, $compression);
		
		imagedestroy($img);
		imagedestroy($watermark);
	}


    public function delete_image($imgSrc = ''){
		$imgSrc = ( $imgSrc == '' ) ? $_POST['imgSrc'] : $imgSrc;
        unlink($this->directory . $imgSrc);
        return;
        
	}
	

	
	
	public function get_images($key , $exception = []){

		$dir = $this->directory . $key . '/';
		
		if(file_exists($dir)){
			
			$photos_dir = scandir($dir);
			rsort($photos_dir);
			$photos = array();
			for($i = 0 ; $i < count($photos_dir) -2 ; $i++){
				if($photos_dir[$i] != 'panorama'){
					$photos[] = $photos_dir[$i];
				}
				
			}

			for($i = 0 ; $i < count($exception) ; $i++){
				$search = array_search($exception[$i] , $photos);
				if( $search >= 0 ){
					unset($photos[$search]);
				}
				
			}

			return $photos;

		}else{
			return [];
		}
		
	}


	public function delete_imgs_folder($folders){
		$folder = $this->directory . $folders;

		if (is_dir($folder))
			$dir_handle = opendir($folder);
			if (!$dir_handle)
				return false;
			while($file = readdir($dir_handle)) {
					if ($file != "." && $file != "..") {
						if (!is_dir($folder."/".$file))
							unlink($folder."/".$file);
						else
							$this->delete_imgs_folder($folders);
							
					}
			}

			closedir($dir_handle);
			rmdir($folder);
			return true;

	}

}