<?php
    require_once 'init.php';
    get_header('homepage');
    $plang = get_lang_file('home');
    $glang = get_lang_file();
?>

    <div class="homepage">
                <!-- Slider main container -->
        <div class="swiper homeSwiper">
           
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="header">
                        <video preload="metadata" playsinline="" loop="" muted="" class="hero_video fit-img" autoplay="">
                            <source src="layout/videos/header.webm" type="video/webm">
                        </video>
                        <div class="overlay d-flex justify-content-between align-items-between flex-column">
                            <div></div>
                            <div class="container">
                                <div class="text-center main-content">
                                    <div class="verticalflip ms-5 pe-5 wow fadeInUp"data-wow-duration=".4s" data-wow-delay="0.2s" data-wow-offset="100">
                                            <?php echo $plang->htoptitle; ?>
                                            
                                            <span>
                                                <?php echo $plang->h1s; ?>
                                                
                                            </span>
                                            <span>
                                            <?php echo $plang->h2s; ?></span>
                                            <span>
                                            <?php echo $plang->h3s; ?></span>
                                        </div>
                                    <div class="aurora-content wow fadeInUp"data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
                                        <h1 class="fw-bold">
                                        <?php echo $plang->htitle; ?>
                                            
                                        </h1>
                                    </div>
                                    
                                    <p class="small wow fadeInUp"data-wow-duration=".4s" data-wow-delay="0.6s" data-wow-offset="100">
                                    <?php echo $plang->htalk; ?>
                                        
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center wow fadeInUp"data-wow-duration=".4s" data-wow-delay="0.8s" data-wow-offset="100">
                                        <a href="contact.php" class="btn btn-primary d-flex align-items-center hoverable ms-4 btn-bg">
                                            <p class="mb-0 ms-2">
                                            <?php echo $plang->strpro; ?></p>
                                            <i class="fa-solid fa-arrow-left rotate-en"></i>
                                        </a>
                                        <a href="" class="btn btn-outline-white d-flex align-items-center btn-bg go-to-swipper"  data-child="3">
                                            <p class="mb-0 ms-2">
                                            <?php echo $plang->watchpro; ?></p>
                                            <i class="fa-solid fa-arrow-down"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bottom-header">
                                <div class="container">
                                    <div class="d-flex justify-content-between align-items-center header-bottom-divs">
                                        <div class="services flip" id="flipper">
                                            <div class="step step0 set">
                                                <div class="service">
                                                    <i class="fa-solid fa-couch ms-3 icon"></i>
                                                    <div class="content">
                                                        <p class="title mb-0">
                                                        <?php echo $plang->s1t; ?></p>
                                                        <p class="desc mb-0">
                                                        <?php echo $plang->s1d; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                    
                                            <div class="step step1">
                                                <div class="service">
                                                    <i class="fa-solid fa-pen-ruler ms-3 icon"></i>
                                                    <div class="content">
                                                        <p class="title mb-0"><?php echo $plang->s1t; ?></p>
                                                        <p class="desc mb-0"><?php echo $plang->s2d; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="step step2">
                                                <div class="service">
                                                    <i class="fa-solid fa-palette ms-3 icon"></i>
                                                    <div class="content">
                                                        <p class="title mb-0"><?php echo $plang->s1t; ?></p>
                                                        <p class="desc mb-0"><?php echo $plang->s3d; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="step step3">
                                                <div class="service">
                                                    <i class="fa-solid fa-bezier-curve ms-3 icon"></i>
                                                    <div class="content">
                                                        <p class="title mb-0"><?php echo $plang->s1t; ?></p>
                                                        <p class="desc mb-0"><?php echo $plang->s4d; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="d-none d-md-block">
                                            <a href="" class="go-to-swipper" data-child="2">
                                                <p class="text-center mb-0 more-p"><?php echo $plang->dmore; ?></p>
                                                <span class="animation-container">
                                                    <span class="chevron-container">
                                                      
                                                        <i class="fa-solid fa-chevron-down icon"></i>
                                                        <i class="fa-solid fa-chevron-down icon"></i>
                                                        <i class="fa-solid fa-chevron-down icon"></i>
                                                        <i class="fa-solid fa-chevron-down icon"></i>
                                            
                                                    </span>
                                                  </span>
                                            </a>
                                        </div>
                                        <?php getSoicals(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="features-section d-flex align-items-center">
                        
                        <div class="waves-cont">
                            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                            <defs>
                            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                            </defs>
                            <g class="parallax">
                            <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(63,142,252,0.7)" />
                            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(135,191,255,0.5)" />
                            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(173,215,246,0.3)" />
                            <use xlink:href="#gentle-wave" x="48" y="7" fill="rgba(59,40,204,0.5)" />
                            </g>
                            </svg>
                        </div>

                        <div class="container h-100">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-4 mt-4">
                                    <p class="section-sub fw-bold mb-0">
                                        <?php echo $plang->sssub; ?>
                                        
                                    </p>
                                    <h2 class="fw-bold mb-3">
                                    <?php echo $plang->sstitle; ?>
                                        
                                    </h2>
                                    <p class="lead">
                                    <?php echo $plang->ssdesc; ?>
                                        
                                    </p>
                                    <div class="row features mt-5 d-none d-lg-flex">
                                        <div class="col-6 col-md-4 mb-4 p-1 feat-col">
                                            <div class="feature">
                                                <p class="title fw-bold">
                                                    99<span class="special">%</span>
                                                </p>
                                                <p class="sub fw-bold">
                                                <?php echo $plang->ssc1t; ?>
                                                    
                                                </p>
                                                <p class="small">
                                                <?php echo $plang->ssc1d; ?>
                                                    
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 mb-4 p-1 feat-col">
                                            <div class="feature">
                                                <p class="title fw-bold">
                                                    250<span class="special"> + </span>
                                                </p>
                                                <p class="sub fw-bold">
                                                <?php echo $plang->ssc2t; ?>
                                                    
                                                </p>
                                                <p class="small">
                                                <?php echo $plang->ssc2d; ?>
                                                    
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 mb-4 p-1 feat-col">
                                            <div class="feature">
                                                <p class="title fw-bold">
                                                    3<span class="special">+</span>
                                                </p>
                                                <p class="sub fw-bold">
                                                <?php echo $plang->ssc3t; ?>
                                                    
                                                </p>
                                                <p class="small">
                                                <?php echo $plang->ssc3d; ?>
                                                    
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-4 slider-animated">
                                    <div class="row">
                                        <div class="col-6 p-2">
                                            <div class="slider-to-right eng-ar-infinit-slider">
                                                <div class="slide">
                                                    <img src="layout/imgs/a1.jpg" alt="" />
                                                </div>
                                                <div class="slide">
                                                    <img src="layout/imgs/a2.jpg" alt="" />
                                                </div>
                                                <div class="slide">
                                                    <img src="layout/imgs/a3.jpg" alt="" />
                                                </div>
                                                <div class="slide">
                                                    <img src="layout/imgs/a4.jpg" alt="" />
                                                </div>
                                                <div class="slide">
                                                    <img src="layout/imgs/a5.jpg" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 p-2">
                                            <div class="slider-bottom eng-ar-infinit-slider">
                                                <div class="slide">
                                                    <img src="layout/imgs/a6.jpg" alt="" />
                                                </div>
                                                <div class="slide">
                                                    <img src="layout/imgs/a7.jpg" alt="" />
                                                </div>
                                                <div class="slide">
                                                    <img src="layout/imgs/a1.jpg" alt="" />
                                                </div>
                                                <div class="slide">
                                                    <img src="layout/imgs/a3.jpg" alt="" />
                                                </div>
                                                <div class="slide">
                                                    <img src="layout/imgs/a2.jpg" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- 
                    Get pinned projects
                -->
                <?php
                    $projects = new CategoriesModel;
                    $projects = $projects->get_category_product('','',false,'all-ports', 9,'p.views DESC', '' , '' , 1);

                ?>
    <div class="swiper-slide">
        <div class="portfolio-section">
            
            <div class="flickity-slider h-100" data-flickty>
                <?php
                    if( count($projects) > 0 ){
                        foreach($projects as $project){
                            $backSrc = 'uploads/' . $project['port_slug'] . '/'.explode(',',$project['photos'])[0];
                            ?>
                            <div class="carousel-cell h-100 w-100">
                                <div class="overlay" style="background-image:url(<?php echo $backSrc; ?>);">
                                </div>
                                <div class="overlay">
                                    <div class="container">
                                        <div class="content mb-5 pb-5">
                                            <p class="title fw-bold fs-1 mb-4">
                                                <?php echo $project['title_' . get_website_lang()] ?>
                                            </p>
                                            <div class="d-flex flex-wrap">
                                                <a href="portfolio.php?category=<?php echo $project['cat_slug']; ?>" class="category mb-2 rounded ms-3">
                                                    <?php echo $project['name_' . get_website_lang()] ?>
                                                </a>
                                                <div class="love-count rounded mb-2 d-flex align-items-center">
                                                    <i class="fa-regular fa-heart ms-2"></i>
                                                    <?php echo $project['likes'] ?>
                                                </div>
                                            </div>
                                            
                                            <div class="view-project mt-5">
                                                <div class="icon">
                                                    <i class="fa-solid fa-turn-up"></i>
                                                </div>
                                                <a href="project.php?portfolio=<?php echo $project['port_slug'] ?>" class="d-block me-4">
                                                    <span class="dup-hover-effect">
                                                        <?php echo $glang->showproject; ?>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <?php
                        }
                    }
                ?>
                

                
            </div>
            <div class="flickt-nav-cont">
                <div class="container">
                    <div class="flickty-nav-slider">
                        <?php
                         if( count($projects) > 0 ){
                            foreach($projects as $project){
                                $backSrc = 'uploads/' . $project['port_slug'] . '/'.explode(',',$project['photos'])[0];
                                ?>
                                    <div class="carousel-cell">
                                        <div class="project-thumbnail">
                                            <img src="<?php echo $backSrc; ?>" class="fit-img">
                                            <div class="overlay p-4 d-flex align-items-end">
                                                
                                                <div class="title">
                                                    <?php echo $project['title_' . get_website_lang()] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                        ?>
                        

                        <div class="carousel-cell">
                            <a href="portfolio.php" class="project-thumbnail view-more d-flex text-center align-items-center">
                            <?php echo $glang->showmore; ?>
                                <i class="fa-solid fa-chevron-left me-2 icon rotate-en"></i>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

                <div class="swiper-slide">
                    <div class="contact-section d-flex align-items-center">
                        <div class="container">
                            <div class="row">
                                
                                <div class="col-12 col-md-6">
                                    <p class="section-sub fw-bold mb-0">
                                    <?php echo $glang->contact; ?>
                                    </p>
                                    <h2 class="fw-bold mb-3">
                                    <?php echo $glang->startyourproje; ?>
                                        
                                    </h2>
                                    <p class="lead mb-4 d-none d-md-block">
                                        <?php echo $glang->contactavail; ?>
                                        
                                    </p>
                                    <div class="d-none d-md-block">
                                        <?php
                                             if(WEBSITE_SETTINGS['email'] != ''){
                                                ?>
                                        <a href="mailto:<?php echo WEBSITE_SETTINGS['email']; ?>" class="contact-cont d-flex align-items-center mb-3">
                                            <div class="icon-cont ms-3">
                                                <i class="fa-solid fa-envelope"></i>
                                            </div>
                                            <div class="content">
                                                <p class="sub mb-0"> <?php echo $glang->emls; ?></p>
                                                <p class="title">
                                                    <?php echo WEBSITE_SETTINGS['email']; ?>
                                                </p>
                                            </div>
                                        </a>
                                                <?php
                                             }
                                        ?>
                                        <?php
                                             if(WEBSITE_SETTINGS['phone'] != ''){
                                                ?>

<a href="tel:<?php echo WEBSITE_SETTINGS['phone']; ?>" class="contact-cont d-flex align-items-center mb-3">
                                            <div class="icon-cont ms-3">
                                                <i class="fa-solid fa-phone"></i>
                                            </div>
                                            <div class="content">
                                                <p class="sub mb-0">
                                                <?php echo $glang->callsus; ?>
                                                </p>
                                                <p class="title">
                                                <?php echo WEBSITE_SETTINGS['phone']; ?>
                                                </p>
                                            </div>
                                        </a>
                                            <?php
                                             }
                                            ?>
                                       
                                        <a href="" target="_blank" class="contact-cont d-flex align-items-center mb-3">
                                            <div class="icon-cont ms-3">
                                                <img src="layout/imgs/gmaps.webp" />
                                            </div>
                                            <div class="content">
                                                <p class="sub mb-0">
                                                <?php echo $glang->visitus; ?>
                                                </p>
                                                <p class="title">
                                                <?php echo $glang->locationd; ?>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    
                                </div>
                                
                                <div class="col-12 col-md-6">
                                    <?php getContactForm(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
        </div>
  
       
    </div>
    
<?php
    get_footer('home');
?>