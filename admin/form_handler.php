<?php

    $ajax = '';
    if( isset($_POST['ajax_request']) ){
        $ajax = 'ajax';
    }
    require_once 'init.php';
    define('FORM_SUBMIT' , ['code' => 0 , 'message' => ''] , true);
    /*
        0 => no form submitted
        1 => success
        2 => error
    */
    

    if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_action']) ){
        $form_action = $_POST['form_action'];
       
        if($form_action == 'register_new_user'){
            $user = new Users;
            $user->register_new_user();
        }
        if($form_action == 'login_user'){
            $user = new Users;
            $user->login_user();
        }

        if( $form_action == 'load_more_projects' && isset($_POST['page'])  && isset($_POST['cat_slug']) ){
            $cats = new CategoriesModel;
            $cat_slug   = filter_var( $_POST['cat_slug'], FILTER_SANITIZE_STRING );
            $page       = filter_var( $_POST['page'], FILTER_SANITIZE_STRING );
            $limit      = filter_var( $_POST['limit'], FILTER_SANITIZE_STRING );
            
            $ports = $cats->get_category_product($cat_slug,'',false,'all-ports',$limit,'' , $page);
            if( count($ports) > 0 ){
                require_once '../includes/template_parts.php';
                foreach($ports as $project){
                    ?>
                        <div class="col-12 col-md-6 mb-4 wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.3s" data-wow-offset="100">
                            <?php portfolio_template($project); ?>
                        </div>
                    <?php
                }
            }else{
                echo 'no-more';
                exit();
            }
        }
     
        if($form_action == 'delete_image' || $form_action == 'delete_img_db'){
            if($form_action == 'delete_img_db'){
                $is_panorama = strpos($_POST['imgSrc'], 'panorama');
                $is_panorama = ($is_panorama >= 1) ? true : false;
                $img =  explode("/" , $_POST['imgSrc']);
                $port_slug = $img[0];
                if($is_panorama){
                    $img = $img[2];
                }else{
                    $img = $img[1];
                }
                $cat = new Categories;
                
                if( $cat->delete_porject_img($port_slug,$img , $is_panorama) ){
                    delete_img();
                }

                return;
            }
            delete_img();
        }

        if( $form_action == 'update_profile_info' ){
            $user = new Users;
            $user->update_user_info();
        }
        if( $form_action == 'send_feedback' && isset($_POST['port_slug']) && isset($_POST['feedback']) ){
            $feedback   = filter_var($_POST['feedback'] , FILTER_SANITIZE_STRING);
            $slug       = filter_var($_POST['port_slug'] , FILTER_SANITIZE_STRING);
            $ss = new FeedbackModel;

            $ss->insert_feedback($slug,$feedback);
        }
        if( $form_action == 'love_btn' && isset($_POST['port_slug']) && isset($_POST['like']) ){
            $like           = filter_var($_POST['like'] , FILTER_SANITIZE_STRING);
            $slug           = filter_var($_POST['port_slug'] , FILTER_SANITIZE_STRING);
            $status         = filter_var($_POST['status'] , FILTER_SANITIZE_STRING);
            $status         = ( $status == 'like' ) ? '1' : '0';
            if( is_numeric($like) ){
                $ss = new CategoriesModel;
                $ss->update_love($slug,$like,$status);
            }
           
        }
        if( $form_action == 'insert_campaign' ){
            $campaign = new Campaigns;
            $campaign->insert_campaign();
        }
        if( $form_action == 'edit_project' ){
            $campaign = new Categories;
            $campaign->update_portfolio();
        }
        if( $form_action == 'insert_new_project' ){
            $campaign = new Categories;
            $campaign->insert_new_project();
        }
        if( $form_action == 'insert_mssg_form' ){
            
            $campaign = new Messages;
            $campaign->insert_new_message();
        }
        if( $form_action == 'insert_member' ){
            $campaign = new Team;
            $campaign->insert_new_member();
        }
        if( $form_action == 'edit_member' ){
            $campaign = new Team;
            $campaign->edit_member();
        }
        if( $form_action == 'delete_campaign' ){
            $campaign = new Campaigns;
            $campaign->delete_campaign();
        }
        if( $form_action == 'delete_feedback' ){

            $campaign = new FeedbackModel;
            $id = filter_var($_POST['feedback_id'] , FILTER_SANITIZE_NUMBER_INT);

            $campaign->delete_feedback($id);
        }
        if( $form_action == 'delete_member' ){
            $campaign = new Team;
            $campaign->delete_member();
        }
        if( $form_action == 'delete_project' ){
            $campaign = new Categories;
            $campaign->delete_project();
        }
        if( $form_action == 'delete_message' ){
            $campaign = new Messages;
            $campaign->delete_message();
        }

        if( $form_action == 'edit_campaign' ){
            $campaign = new Campaigns;
            $campaign->edit_campaign();
        }
        if( $form_action == 'edit_category' ){
            $campaign = new Categories;
            $campaign->edit_category();
        }
        if( $form_action == 'insert_category' ){
            $campaign = new Categories;
            $campaign->insert_category();
        }
        if( $form_action == 'mark-done' || $form_action == 'mark-undone'){
            $campaign = new Messages;
            $campaign->toggle_status();
        }

        if( $form_action == 'update_website_settings' ){
            // update what you want here and then run update function
            $lock = ( isset($_POST['lock']) ) ? '1' : '';
            $temp_arr = [
                'facebook'  => $_POST['facebook'],
                'twitter'   => $_POST['twitter'],
                'whatsapp'  => $_POST['whatsapp'],
                'telegram'  => $_POST['telegram'],
                'instagram' => $_POST['instagram'],
                'email'     => $_POST['email'],
                'phone'     => $_POST['phone'],
                'lock'      => $lock
            ];
            update_website_settings($temp_arr);
            define('WEBSITE_SETTINGS' , $temp_arr);
            set_form_response(1 , 'Website settings updated successfully');
        }
        
        if( $form_action == 'upload_img' && isset($_POST['key']) && isset($_POST['img_name']) ){
            // key is folder name
            $img_name = $_POST['img_name'];
            $is_panorama = isset($_POST['is_panorma']) ? true : false;
            $folder_key = $_POST['key'];
            $logoPosition = ( isset($_POST['logo-position']) ) ? $_POST['logo-position'] : 'bottom';
            if($img_name != 'english' && $img_name != 'arabic' && $img_name != 'personalimg'){
                $img_name = uniqid('' , true);
            }

            $img = new Images;
            $img->upload_image($folder_key , $img_name,75,'file',$is_panorama , $logoPosition);
            echo $img_name . '.webp';
        }
        
        
    }

    function delete_img(){
        $user = new Images;
        $user->delete_image();
    }