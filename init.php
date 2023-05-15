<?php

    session_start();
    $website_settings_file = 'includes/website.json';
    require_once 'includes/page_header_footer.php';
    require_once 'includes/template_parts.php';
    require_once 'includes/common_functions.php';

    if( WEBSITE_SETTINGS['lock'] == '1' ){
        header("location: locked.html");
        exit();
    }

    require_once 'controllers/Categories.php';
    require_once 'controllers/Team.php';
    require_once 'controllers/Messages.php';

    require_once 'models/Database.php';
    require_once 'models/CategoriesModel.php';
    require_once 'models/MessagesModel.php';
    require_once 'models/TeamModel.php';


    $lang = 'ar'; // default is ar
   
    
    function check_lang_get(){

        if( isset($_GET['lang']) ){
            $temp_l = $_GET['lang'];
            $lng = ($temp_l == 'en') ? 'en' : 'ar';

            return $lng;
        }
        
        return false;
    }

    function set_website_lang($lang){
        $_SESSION['user']['website_settings']['lang'] = $lang;
    }
    
    if(!isset($_SESSION['user']['website_settings']['lang'])){
        // get website info
        //$website_settings = new SitesettingsModel;
        $lng = check_lang_get();
        $lang = ($lng == false) ? $lang : $lng;
        set_website_lang($lang);

    }else{

        $lng = check_lang_get();
        $lang = ($lng == false) ? $_SESSION['user']['website_settings']['lang'] : $lng;
        set_website_lang($lang);
    }
    
    function get_website_lang(){
        return $_SESSION['user']['website_settings']['lang'];
    }
    function get_lang_file($file_name = 'general'){
        $lang = $_SESSION['user']['website_settings']['lang'];
        $path = 'includes/lang/' . $lang . '/' . $file_name . '.json';
        $lng = file_get_contents($path);
	    return json_decode($lng);
    }
    $glang = get_lang_file();

    

?>