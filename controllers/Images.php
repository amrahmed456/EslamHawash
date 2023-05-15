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

    public function upload_image($folder_key, $image_key  , $compression = 80 , $file = 'file'){
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
		echo '<pre>';
		print_r($_FILES);
		$img_type = $_FILES[$file]['type'];

		$destination_file = $target_dir . $image_key . '.webp';

		if( $img_type == 'image/jpeg'){

			$image = imagecreatefromjpeg($tmp_name);
			imagewebp($image, $destination_file, $compression);
			
		}else if( $img_type == 'image/png'){
			
			$image = imagecreatefrompng($tmp_name);
			imagewebp($image, $destination_file, $compression);
			
			
			
			
		}

		return true;

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
				$photos[] = $photos_dir[$i];
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