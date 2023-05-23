<?php

define('DB_SETTINGS', [
    'db_name'       => 'eslam',
    'db_host'       => 'localhost',
    'db_username'   => 'root',
    'db_password'   => '',
    'db_prefix'     => 'eslam_',
    'uploads'       => 'uploads/',
    'url'           => 'https://www.aidesignteams.com/',
    'mailer'        => ['mail' => '','pass' => '']
]);



$json = file_get_contents($website_settings_file);
define('WEBSITE_SETTINGS' , json_decode($json,true),true);


function update_website_settings($new_arr){
    // update function
    $read = fopen('../includes/website.json' , 'w+');
    fwrite($read, json_encode($new_arr));
    fclose($read);
    
}


function get_data_stylish($date){
    //May 23, 2022

    $lng = $_SESSION['user']['website_settings']['lang'];
    $dates = [
        'en' => [
            '','January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
        ],
        'ar' => ['','يناير','فبراير','مارس','إبريل','مايو','يونيو','يوليو','أغسطس','سبتمبر','أكتوبر','نوفمبر','ديسمبر']
    ];
    $date = explode('-' , $date);
    $month = $dates[$lng][ltrim($date[1], '0')];
    $day = $date[2];
    $year =  $date[0];
    $final = $month . ' ' . $day . ', ' . $year;

    if($lng == 'ar'){
        $final = $day . ' ' . $month . '، ' . $year;
    }
    

    return $final;
}



function get_proper_link_query(){

    $s = '?';
    if( $_SERVER['QUERY_STRING'] != '' ){
        $s = '?' . $_SERVER['QUERY_STRING'] . '&';
    }

    return $s;

}


function displayOpenGraphPt($url = '', $title = '', $description = '', $img = '' , $keywords = ''){
    global $glang;
    $url = ($url == '') ? DB_SETTINGS['url'] : DB_SETTINGS['url'] . $url;
    $title = ($title == '') ? $glang->webtitle : $title . ' - ' . $glang->webtitle;
    $description = ($description == '') ? $glang->description : $description;
    $img = ($img == '') ? DB_SETTINGS['url'] . 'layout/imgs/logo-b.webp' : DB_SETTINGS['url'] . DB_SETTINGS['uploads'] . $img;
    $keywords = ( $keywords == '' ) ? 'تصميم, عمارة, تصميم داخلى, تشطيب, تشطيبات, مكتب, ديكور, جواز, interior, design, furniture, home, marriage, decor, exterior design, exterior' : $keywords;


    echo '<meta property="og:url"           content="'.$url.'"  />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="'.$title.'" />
    <meta property="og:description"   content="'.$description.'" />
    <meta property="og:image"         content="'.$img.'" />
    <meta name="keywords" content="'. $keywords .'">
';


?>

<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": "Ai Design Teams",
    "url": "<?php echo DB_SETTINGS['url']; ?>",
    "logo": "<?php echo DB_SETTINGS['url'] . 'layout/imgs/favicon.webp'; ?>",
    "sameAs": [
            "https://web.facebook.com/aidesignteams/"
            ],
    "contactPoint": [{
            "@type": "ContactPoint",
            "telephone": "",
            "contactType": "customer support"
        }
    ]
}
{
    "@context": "http://schema.org",
    "@type": "WebSite",
    "url": "<?php echo DB_SETTINGS['url']; ?>",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "?key={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "",
    "description": "",
    "publisher": {
        "@type": "Organization",
        "name": ""
    }
}
</script>

<?php
}


function update_like_session($slug,$up){

    $sess = $_SESSION['projects'];
    for($i = 0 ; $i < count($sess); $i++){
        
        if( $sess[$i]['port_slug'] == $slug ){
            $_SESSION['projects'][$i]['like'] = $up;
            return;
        }
    }
}


function gate_allows($permission_name , $suspend = false)
{
    if($_SESSION['user']['user_id'] == 1){
        return true;
    }
    $user_permissions = $_SESSION['user']['permissions'];
    foreach($user_permissions as $permission){
        if($permission['per_name'] == $permission_name){
            return true;
        }
    }
    return false;
}

?>