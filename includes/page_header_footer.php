<?php

function get_header($select = 'home', $include = '' , $url = '' , $title = '' , $description = '', $img = ''){
    global $glang;
?>
<!DOCTYPE html>
<html dir="<?php echo (get_website_lang() == 'ar') ? 'rtl' : 'ltr'  ?>" lang="<?php echo get_website_lang(); ?>">
<head>
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <meta name="robots" content="max-image-preview:large" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $glang->web_title; ?>" />
    <meta property="og:description" content="<?php echo $glang->web_desc; ?>"/>
    <meta property="og:image" content="layout/imgs/logo-b.webp" />
    <meta property="og:site_name" content="<?php echo $glang->web_title; ?>" />
    <meta name="twitter:title" content="<?php echo $glang->web_title; ?>" />
    <meta name="twitter:description" content="<?php echo $glang->web_desc; ?>"/>
    <meta name="theme-color" content="#17242b">
    <link rel="icon" href="layout/imgs/favicon.webp"/>
    <meta name="description" content="<?php echo $glang->web_desc; ?>" />
    <title><?php echo $glang->web_title; ?></title>
    <?php
      displayOpenGraphPt($url,$title,$description,$img);
    ?>
    <!-- general styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;800&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="layout/css/libs.css"><!-- libreraies -->
    <?php echo ( $include == '' ) ? '' : '<link rel="stylesheet" href="layout/css/'. $include .'.css" />'; ?>
    <?php
        echo ( get_website_lang() == 'ar' ) ? '<link rel="stylesheet" href="layout/css/main-ar.css?v=1">' : '<link rel="stylesheet" href="layout/css/main.css?v=1">';
    ?>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZK8LCES2PV"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ZK8LCES2PV');
</script>

</head>
<body class="<?php echo ( $select == 'home' ) ? '' : 'navbar-fix'; ?>" data-lang="<?php echo get_website_lang(); ?>"> <!-- ar / en -->

<!-- preloader -->

<div id="preloader">
    <div class="wrapper">
        
        <div class="loader"></div>

    </div>
</div>

<!-- desktop navbar -->
<navbar>
        <div class="container">
            <div class="d-flex justify-content-between navbar-holder">
                <div class="logo">
                    <a href="index.php">
                        <img src="layout/imgs/logo-<?php echo ( $select == 'home' ) ? 'w' : 'b'; ?>.webp" alt="logo" title="" width="220px" />
                    </a>
                </div>
                <div class="navs d-none d-lg-flex align-items-center">
                    <ul class="list-unstyled d-flex mb-0 navigation">
                        <li class="<?php echo ($select == 'home') ? 'active' : '';?>"><a href="index.php"><?php echo $glang->home; ?></a></li>
                        <li class="<?php echo ($select == 'services') ? 'active' : '';?>"><a href="services.php"><?php echo $glang->services; ?></a></li>
                        <li class="<?php echo ($select == 'portfolio') ? 'active' : '';?>"><a href="portfolio.php"><?php echo $glang->port; ?></a></li>
                        <li class="<?php echo ($select == 'about') ? 'active' : '';?>"><a href="about.php"><?php echo $glang->about; ?></a></li>
                    </ul>
                    <div class="btns d-flex">

                        <?php $r = ( get_website_lang() == 'ar' ) ? 'en' : 'ar'; ?>
                        <a href="<?php
                    echo $_SERVER['PHP_SELF'] . get_proper_link_query() . 'lang=' . $r;
                ?>" class="btn btn-sm btn-hover me-3 d-flex align-items-center">
                            <span class="icomoon icon-language me-3"></span> <?php echo ( get_website_lang() == 'ar' ) ? 'English' : 'العربية';  ?>
                        </a>
                        <a href="contact.php" class="btn btn-sm btn-primary">
                            <?php echo $glang->contact; ?>
                        </a>
                    </div>
                </div>
                <div class="mobile-opener-cont d-flex align-items-center d-lg-none">
                    <div class="opener">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    
                </div>
            </div>
        </div>
    </navbar> <!-- desktop navbar -->

    <div class="mobile-navbar">
        
        <div class="container">
            <div class="d-flex justify-content-between mb-5 pt-4 pb-4">
                <div class="close-mobile-nav d-flex align-items-center justify-content-center">
                    <div>
                        <span></span>
                        <span></span>
                    </div>
                   
                </div>
                <div class="logo">
                    <a href="index.php">
                        <img src="layout/imgs/logo-b.webp" alt="logo" title="" width="160px" />
                    </a>
                </div>
            </div>
            <div class="content mb-4 ps-4 pe-4">
                <ul class="list-unstyled">
                   
                </ul>
            </div>
            <div class="btns mt-5 mb-4">
                       
                <a href="contact.php" class="btn btn-sm btn-primary btn-block mb-2 font">
                    Contact us
                </a>
                
                <?php $r = ( get_website_lang() == 'ar' ) ? 'en' : 'ar'; ?>
                        <a href="<?php
                    echo $_SERVER['PHP_SELF'] . '?lang=' . $r;
                ?>" class="btn btn-sm btn-hover btn-block">
                    <span class="icomoon icon-language me-3"></span> <?php echo ( get_website_lang() == 'ar' ) ? 'English' : 'العربية';  ?>
                </a>

            </div>

            <?php get_social_btns(); ?>
        </div>
    </div>

    <a href="<?php echo WEBSITE_SETTINGS['whatsapp']; ?>" class="whatsapp-sticked">
        <span class="icomoon icon-whatsapp"></span>
    </a>
   
<?php
}

function page_footer($include = ''){
    $glang = get_lang_file();
    ?>
<footer class="padd-sm pb-0">
        <div class="container">
            <div class="d-flex justify-content-center mb-3">
                <a href="">
                    <img src="layout//imgs/logo-b.webp" width="220px" />
                </a>
            </div>
            <p class="text-center title"><?php echo $glang->web_fot_t; ?></p>
            <p class="text-center small"><?php echo $glang->web_for; ?></p>
            

            <?php get_social_btns(); ?>

            <div class="text-center mb-4 mt-5">
                <p class="small">Designed & Developed By <a class="text-primary" href="https://www.amrahmed.online" target="_blank" >Amr Ahmed</a></p>
            </div>
            
        </div>
        <img src="layout/imgs/footer.webp" />
    </footer>

    <script src="layout/js/jquery-3.6.0.min.js"></script>
    <script src="layout/js/bootstrap.min.js"></script>
    <script src="layout/js/popper.min.js"></script>
    <script src="layout/js/wow.min.js"></script>
    <script src="layout/js/slick.min.js"></script>
    <script src="layout/js/lightbox.min.js"></script>
    <script src="layout/js/sweetalert.min.js"></script>
    <?php echo ( $include == '' ) ? '' : '<script src="layout/js/'. $include .'.js"></script>'; ?>
    <script src="layout/js/main.js?v=1"></script>
</body>
</html>
    <?php
}
?>