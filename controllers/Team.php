<?php

class Team{

    public function insert_new_member(){
        $this->prepare_data('insert');
    }
    public function edit_member(){
        $this->prepare_data('edit');
    }

    public function prepare_data($action){
        $key        = filter_var($_POST['key'],FILTER_SANITIZE_STRING);
        $img_src        = $key . '/personalimg.webp';
        $img = new Images();
        $ex = $img->get_images($key);
        if( count($ex) > 0 ){

            $name_en    = filter_var($_POST['name_en'], FILTER_SANITIZE_STRING);
            $name_ar    = filter_var($_POST['name_ar'], FILTER_SANITIZE_STRING);
            $pos_en     = filter_var($_POST['pos_en'], FILTER_SANITIZE_STRING);
            $pos_ar     = filter_var($_POST['pos_ar'], FILTER_SANITIZE_STRING);
            $facebook   = filter_var($_POST['facebook'], FILTER_SANITIZE_STRING);
            $instagram  = filter_var($_POST['instagram'], FILTER_SANITIZE_STRING);
            $whatsapp  = filter_var($_POST['whatsapp'], FILTER_SANITIZE_STRING);
            $email      = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            $orer       = filter_var($_POST['order'], FILTER_SANITIZE_STRING);
            $pin        = ( isset($_POST['pin'])  ) ? '1' : '0';

            $db = new TeamModel;
            if( $action == 'insert' ){
                if( $db->insert_new_member($name_en,$name_ar,$pos_en,$pos_ar,$facebook,$instagram,$email,$whatsapp,$orer,$pin,$img_src) ){
                    set_form_response(1,'Member Added Succesfully');
                    return;
                }
            }else if( $action == 'edit' ){
                $id       = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
                if( $db->edit_member($name_en,$name_ar,$pos_en,$pos_ar,$facebook,$instagram,$email,$whatsapp,$orer,$pin,$img_src,$id) ){
                    set_form_response(1,'Member updated Succesfully');
                    return;
                }
            }
            

        }
        
        set_form_response(2, 'You must upload one photo for the member');
        return;
        
    }

    public function delete_member(){

        $id = filter_var($_POST['member_id'] , FILTER_SANITIZE_STRING);
        $cam = new TeamModel;
        if($cam->delete_member($id)){
            set_form_response(1,'Member Deleted succesfully');
            return true;
        }
        set_form_response(2);
        return;
    }
    

}