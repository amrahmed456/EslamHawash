<?php

function get_header( $select = 'home', $include = '' , $url = '' , $title = '' , $description = '', $img = ''){
    global $glang;
    $overflow = '';
    if($select == 'homepage'){
        $overflow = "overflow:hidden !important";
    }
?>
<!DOCTYPE html>
<html dir="<?php echo (get_website_lang() == 'ar') ? 'rtl' : 'ltr'  ?>" lang="<?php echo get_website_lang(); ?>" style='<?php echo $overflow;?>'>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <meta name="robots" content="max-image-preview:large" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $glang->webtitle; ?>" />
    <meta property="og:description" content="<?php echo $glang->description; ?>"/>
    <meta property="og:image" content="layout/imgs/logo-w.webp" />
    <meta property="og:site_name" content="<?php echo $glang->webtitle; ?>" />
    <meta name="twitter:title" content="<?php echo $glang->webtitle; ?>" />
    <meta name="twitter:description" content="<?php echo $glang->description; ?>"/>
    <meta name="theme-color" content="#ffd175">
    <link rel="icon" href="layout/imgs/favicon.webp"/>
    <meta name="description" content="<?php echo $glang->description; ?>" />
    <title><?php echo $glang->webtitle; ?></title>
    <?php
        echo ( get_website_lang() == 'ar' ) ? '<link rel="stylesheet" href="layout/css/main.css?v=1">' : '<link rel="stylesheet" href="layout/css/main-en.css?v=1">';
    ?>
    <style>
        .preloader .layer{
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            bottom: 0;
            z-index: 9999;
            background: #000;
            overflow: hidden;
            transition: 0.3s ease-in-out;

        }
        .layer.layer1{
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 99999;
        }
        .layer.layer2{
            z-index: 99998;
            background-color: blueviolet;
            transition: 0.6s;
        }
        .layer.layer3{
            z-index: 99997;
            background-color: rgb(43, 128, 226);
            transition: 0.9s;
        }
        .layer.layer4{
            z-index: 99996;
            background-color: rgb(226, 195, 43);
            transition: 1.2s;
        }
        #progress-overlay-proloader{
            display: flex;
            justify-content: center;
            margin-top: 70px;
        }
        .progress-parent{
            width: 250px;
            height: 3px;
            background-color: transparent;
            border-radius: 5px;
            overflow: hidden;
            margin: auto;
            position: relative;
            margin-top: 9px;
        }
        .progress-parent .child{
            transition: 0.4s;
            position: absolute;
            right: 0;
            top: 0;
            width: 0%;
            background-color: #FFF;
            border-radius: 6px;
            height: 100%;
        }
        .img-logo-pre{
            display: flex;
            justify-content: center;
            margin: auto;
            width: 120px;
        }
        
    </style>
</head>
<body>

    <!-- <div class="preloader" id="preloader">
        <div class="layer1 layer">
            <div class="content">
                <img src="layout/imgs/logo-w.webp" class="img-logo-pre" />
                <p class="percentage" id="progress-overlay-proloader">
                </p>
                <div class="progress-parent">
                    <div class="child" id="progresser"></div>
                </div>
            </div>
        </div>
        <div class="layer2 layer"></div>
        <div class="layer3 layer"></div>
        <div class="layer4 layer"></div>
    </div>

    <script>
        var is_progress = true;
        function updatePageProgress(progress){
            if(is_progress){
                progress = Math.round(progress);
                var element = document.getElementById("progress-overlay-proloader");
                element.innerText = progress + '%';
                document.getElementById("progresser").style.width = progress + "%";
                if(progress >= 72){
                    is_progress = false;
                    element.innerText = 100 + '%';
                    document.getElementById("progresser").style.width = 100 + "%";
                    var element = document.getElementById("preloader");
                    element.classList.add("hide");
                    new WOW().init();
                    setTimeout(function(){
                        document.getElementById("preloader").classList.add("hide");
                        
                    },200);
                }
            }
            
            
        }
    </script>
    <script src="layout/js/pace.min.js"></script> -->

    <div class="cursor">
  <div class="cursor__ball cursor__ball--big ">
    <svg height="30" width="30">
      <circle cx="15" cy="15" r="12" stroke-width="0"></circle>
    </svg>
  </div>
  
  <div class="cursor__ball cursor__ball--small">
    <svg height="10" width="10">
      <circle cx="5" cy="5" r="4" stroke-width="0"></circle>
    </svg>
  </div>
</div>

    <div class="navbar" id="navbar">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center w-100 pt-4 pb-4 sticked-when-scrolled">
                <a href="index.php" class="logo d-block">
                    <img src="layout/imgs/logo-w.webp" class="fit-img">
                </a>
                <div class="d-flex align-items-center">
                    <div class="navigations d-flex align-items-center ms-3 bg-blured">
                        <ul class="list-unstyled d-flex align-items-center p-0 m-0">
                            <li><a href="index.php" class="dup-hover-effect"><?php echo $glang->home; ?></a></li>
                            <li><a href="portfolio.php" class="dup-hover-effect"><?php echo $glang->portfolio; ?></a></li>
                            <li><a href="services.php" class="dup-hover-effect"><?php echo $glang->services; ?></a></li>
                            <li><a href="about.php" class="dup-hover-effect"><?php echo $glang->about; ?></a></li>
                            <?php $r = ( get_website_lang() == 'ar' ) ? 'en' : 'ar'; ?>
                            <li><a href="<?php
                    echo $_SERVER['PHP_SELF'] . get_proper_link_query() . 'lang=' . $r;
                ?>"><i class="fa-solid fa-globe ms-1"></i> <?php echo ( get_website_lang() == 'ar' ) ? 'EN' : 'AR';  ?></a></li>
                        </ul>
                    </div>
                    <div>
                        <a href="contact.php" class="bg-blured btn btn-outline-white d-flex align-items-center h-100 fw-bold contact-btn">
                       
                            <i class="fa-solid fa-circle ms-2 green-dot"></i>
                            <p class="mb-0"><?php echo $glang->strproj; ?></p>
                            
                        </a>
                    </div>
                    <button class="hamburger mobile-navigation-opener hamburger--spin me-3" type="button">
                        <span class="hamburger-box">
                          <span class="hamburger-inner"></span>
                        </span>
                    </button>
                      
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-sidebar" id="mobile-sidebar">
        <div class="d-flex flex-column justify-content-between h-100">
            <div class="main-navigations">
                <a href="index.php" class="d-flex align-items-center w-100">
                    <i class="fa-solid fa-house-chimney ms-3"></i>
                    <?php echo $glang->home; ?>
                    
                </a>
                <a href="portfolio.php" class="d-flex align-items-center w-100">
                    <i class="fa-solid fa-briefcase ms-3"></i>
                    <?php echo $glang->portfolio; ?>
                    
                </a>
                <a href="services.php" class="d-flex align-items-center w-100">
                    <i class="fa-brands fa-buffer ms-3"></i>
                    <?php echo $glang->services; ?>
                    
                </a>
                <a href="about.php" class="d-flex align-items-center w-100">
                    <i class="fa-solid fa-circle-exclamation ms-3"></i>
                    <?php echo $glang->about; ?>
                    
                </a>
                <a href="contact.php" class="d-flex align-items-center w-100">
                    <i class="fa-regular fa-comments ms-3"></i>
                    <?php echo $glang->contact; ?>
                    
                </a>
                
            </div>

            <div>
                
                <div class="d-flex justify-content-center mb-5">
                    <a href="?lang=en"><i class="fa-solid fa-globe ms-1"></i> EN</a>
                </div>
                
                <?php getSoicals('nav'); ?>
                
            </div>
        </div>
    </div>
<?php
}

function get_footer($include = ''){
    ?>
    <script src="layout/js/jquery-3.6.0.min.js"></script>
    <script src="layout/js/bootstrap.min.js"></script>
    <script src="layout/js/all.min.js"></script>
    <script src="layout/js/swipper.min.js"></script>
    <?php
        if($include == 'home' || $include == 'services'){
            echo '<script src="layout/js/infiniteslidev2.min.js"></script>';
        }

        if($include == 'project'){
            echo '<script src="layout/js/modal-video.min.js"></script>
            <script src="layout/js/three.min.js"></script>
            <script src="layout/js/panolens.min.js"></script>
            <script src="layout/js/lightbox.min.js"></script>';
        }

        if($include == 'home'){
            echo '<script src="layout/js/flickt.min.js"></script>';
        }

        if($include == 'home' || $include == 'contact'){
            echo '<script src="layout/js/sweetalert.min.js"></script>';
        }
    ?>
    
    <script src="layout/js/TweenMax.min.js"></script>
    <script src="layout/js/wow.min.js"></script>
    <script src="layout/js/main.js"></script>
</body>
</html>
    <?php
}
?>