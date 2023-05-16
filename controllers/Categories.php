<?php

class Categories{

    public function insert_category(){

        $name_en = filter_var($_POST['name_en'],FILTER_SANITIZE_STRING);
        $name_ar = filter_var($_POST['name_ar'],FILTER_SANITIZE_STRING);
        $parent_id = filter_var($_POST['parent_id'],FILTER_SANITIZE_STRING);
        $slug = time();

        $cat = new CategoriesModel;
        if( $cat->check_names($name_en,$name_ar) ){
            set_form_response(2, 'One of category names already Exists!');
            return;
        }

        if($cat->insert_category($name_en,$name_ar,$slug,$parent_id)){
            set_form_response(1,'Category created succesfully');
            return true;
        }

        set_form_response(2);
        return;

    }
    

    public function edit_category(){

        $id = filter_var($_POST['camp_id'],FILTER_SANITIZE_STRING);
        $en = filter_var(trim(($_POST['name_en'])), FILTER_SANITIZE_STRING);
        $ar = filter_var(trim(($_POST['name_ar'])), FILTER_SANITIZE_STRING);
        $parent_id = filter_var($_POST['parent_id'],FILTER_SANITIZE_NUMBER_INT);
        echo 'id is: ' . $id;
        $camp = new CategoriesModel;
        if( $camp->update_category($en,$ar,$id,$parent_id) ){
            set_form_response(1,'Category Updated succesfully');
            return true;
        }

        set_form_response(2);
        return;
        
    }


    public function insert_new_project(){

        $this->get_params_ready('insert');
    }
    public function update_portfolio(){

        $this->get_params_ready('update');
    }

    public function get_params_ready($method){

        $port_slug      = filter_var($_POST['port_slug'], FILTER_SANITIZE_STRING);
        $category_slug  = filter_var($_POST['category_slug'], FILTER_SANITIZE_STRING);
        $title_en       = filter_var($_POST['title_en'], FILTER_SANITIZE_STRING);
        $title_ar       = filter_var($_POST['title_ar'], FILTER_SANITIZE_STRING);
        $desc_en        = filter_var($_POST['desc_en'], FILTER_SANITIZE_STRING);
        $desc_ar        = filter_var($_POST['desc_ar'], FILTER_SANITIZE_STRING);
        $videos         = [];
        $status         = ( isset($_POST['to_status']) ) ? '1' : '0';
        $img = new Images();
        $photos = $img->get_images($port_slug);
        $panormas = $img->get_images($port_slug . '/panorama');

        if(isset($_POST['videos'])){
            foreach($_POST['videos'] as $video){
                if($video != ''){
                    $videos[] = $video;
                }
            }
        }
        
        $videos = implode(',' , $videos);

        if( count($photos) == 0 ){
            set_form_response(2 , 'You must upload at least 1 Image to the project');
            return false;
        }
        $photos = implode(',' , $photos);
        $panormas = implode(',' , $panormas);

        $port = new CategoriesModel;
        if( $method == 'insert' ){
            $date = date('Y-m-d');
            if( $port->insert_portfolio($port_slug,$category_slug,$title_en,$title_ar,$desc_en,$desc_ar,$status,$photos,$panormas,$date,$videos) ){
                set_form_response(1 , 'Portfolio Has been added succesfully :)');
                return true;
            }
            set_form_response(2);
            return false;
        }else if( $method == 'update'){
            if( $port->update_portfolio($port_slug,$category_slug,$title_en,$title_ar,$desc_en,$desc_ar,$status,$photos,$panormas,$videos) ){
                set_form_response(1 , 'Portfolio Has been Updated succesfully :)');
                return true;
            }
            set_form_response(2);
            return false;
        }

    }


    public function delete_porject_img($port_slug,$img , $is_panorama = false){

        $cats = new CategoriesModel;
        $cat = $cats->get_category_product('' , $port_slug);
        if( count($cat) > 0 ){
            if($is_panorama){
                $photos = $cat[0]['panorama'];
                $result = self::searchImages($photos, $img);
            }else{
                $photos = $cat[0]['photos'];
                $result = self::searchImages($photos, $img);
            }
            if($result !== false){
                return $cats->update_photos($port_slug,$result,$is_panorama);
            }
           
        }
        return false;
    }

    public function searchImages($photos, $img){
        $photos = explode(',' , $photos);
        $k = array_search($img,$photos);
        if( $k === false ){
            return false;
        }else{
            unset($photos[$k]);
            $photos = implode(',' , $photos);
            return $photos;
        }
    }

    public function delete_project(){
        $slug = filter_var($_POST['port_slug'], FILTER_SANITIZE_STRING);
        $cat = new CategoriesModel;
        if( $cat->delete_proj($slug) ){
            set_form_response(1 , 'Portfolio deleted succesfully :)');
            return true;
        }
        set_form_response(2);
        return false;
    }

}