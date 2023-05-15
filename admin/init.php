<?php

    session_start();
    
    $website_settings_file = '../includes/website.json';
    require_once 'includes/page_header_footer.php';
    require_once '../includes/common_functions.php';
    require_once 'includes/template_parts.php';

    require_once '../controllers/Users.php';
    require_once '../controllers/Images.php';
    require_once '../controllers/Categories.php';
    require_once '../controllers/Team.php';
    require_once '../controllers/Messages.php';

    require_once '../models/Database.php';
    require_once '../models/UsersModel.php';
    require_once '../models/CategoriesModel.php';
    require_once '../models/MessagesModel.php';
    require_once '../models/CommentsModel.php';
    require_once '../models/TeamModel.php';
    require_once '../models/FeedbackModel.php';
    
    require_once 'form_handler.php';
    

    function display_login_user(){
        get_header(true);
        require_once 'includes/login.php';
        get_footer();
        exit();
        return;
    }
    if( $ajax == '' ){
        if( !isset($_SESSION['user']['status']) ) { // 1 = admin
            display_login_user();
        }else{
            if( $_SESSION['user']['status'] != '1' ){
                display_login_user();
            }
        }
    }
    

    function view($file_name){
        require_once 'views/' . $file_name . '.php';
    }

    function set_form_response($code , $mssg = ''){
        define('FORM_SUBMIT' , ['code' => $code , 'message' => $mssg]);
    }

    function get_form_messages(){

        if(FORM_SUBMIT['code'] == 1){
            $form_message_code = ( FORM_SUBMIT['message'] == '' ) ? 'Data has been updated successfully' : FORM_SUBMIT['message'];
            echo '<div class="alert alert-success text-center">' . $form_message_code . '</div>';
        }else if(FORM_SUBMIT['code'] == 2){
            $form_message_code = ( FORM_SUBMIT['message'] == '' ) ? 'Sorry!, we suffered from technical issue and query not updated yet :(' : FORM_SUBMIT['message'];
            echo '<div class="alert alert-danger text-center">' . $form_message_code . '</div>';
        }
    }


?>