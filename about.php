<?php
    require_once 'init.php';
    get_header();
    $plang = get_lang_file('about');
?>
<div class="about-page">
    <div class="header">
        <div class="wow fadeInUp wow-once" data-wow-duration="3.5s" data-wow-delay="0.4s" data-wow-offset="100">
             <img src="layout/imgs/about.webp">
        </div>
       
        <div class="overlay d-flex align-items-center padd">
            <div class="container">
                <div class="content">
                    <p class="section-sub fw-bold mb-2 wow fadeInUp wow-once" data-wow-duration="0.4s" data-wow-delay="0.4s" data-wow-offset="100">
                        <?php echo $plang->nowus; ?>
                        
                    </p>
                    <h1 class="fw-bold fs-2 mb-3 wow fadeInUp wow-once" data-wow-duration="0.6s" data-wow-delay="0.6s" data-wow-offset="100">
                    <?php echo $plang->abotitle; ?>
                        
                    </h1>
                    <p class="lead mb-5 wow fadeInUp wow-once" data-wow-duration="0.8s" data-wow-delay="0.8s" data-wow-offset="100">
                    <?php echo $plang->abtlead; ?>
                        
                    </p>
                    <div class="d-flex btns wow fadeInUp wow-once" data-wow-duration="0.6s" data-wow-delay="1s" data-wow-offset="100">
                        <a href="" class="btn btn-primary btn-bg btn-white ms-3">
                        <?php echo $plang->wtchport; ?>
                            
                        </a>
                        <a href="" class="btn btn-primary btn-bg btn-white-outline">
                        <?php echo $plang->cttus; ?>
                            
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
    
    <div class="features">
        <div class="container-fluid ps-5 pe-5">
            <div class="row wow fadeInUp wow-once" data-wow-duration="0.4s" data-wow-delay="0.4s" data-wow-offset="100">
                <div class="col-12 mb-4 col-md-4 wow fadeInUp wow-once" data-wow-duration="0.4s" data-wow-delay="0.4s" data-wow-offset="100">
                    <div class="feature">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <p class="super fw-bold">
                                99%
                            </p>
                            <div class="icon-cont d-flex justify-content-center align-items-center">
                                <i class="fa-regular fa-thumbs-up"></i>
                            </div>
                        </div>
                        <p class="sub fw-bold">
                        <?php echo $plang->f1t; ?>
                            
                        </p>
                        <p class="lead">
                        <?php echo $plang->f1d; ?>
                           
                        </p>
                    </div>
                </div>
                <div class="col-12 mb-4 col-md-4 wow fadeInUp wow-once" data-wow-duration="0.6s" data-wow-delay="0.6s" data-wow-offset="100">
                    <div class="feature">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <p class="super fw-bold">
                                99%
                            </p>
                            <div class="icon-cont d-flex justify-content-center align-items-center">
                                <i class="fa-regular fa-thumbs-up"></i>
                            </div>
                        </div>
                        <p class="sub fw-bold">
                        <?php echo $plang->f2t; ?>
                        </p>
                        <p class="lead">
                        <?php echo $plang->f2d; ?>
                        </p>
                    </div>
                </div>
                <div class="col-12 mb-4 col-md-4 wow fadeInUp wow-once" data-wow-duration="0.8s" data-wow-delay="0.8s" data-wow-offset="100">
                    <div class="feature">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <p class="super fw-bold">
                                99%
                            </p>
                            <div class="icon-cont d-flex justify-content-center align-items-center">
                                <i class="fa-regular fa-thumbs-up"></i>
                            </div>
                        </div>
                        <p class="sub fw-bold">
                        <?php echo $plang->f3t; ?>
                        </p>
                        <p class="lead">
                        <?php echo $plang->f3d; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
 

    <div class="quick-services padd">
        <div class="container">
            <p class="section-title fw-bold mb-4 fs-3 wow fadeInUp wow-once" data-wow-duration="0.4s" data-wow-delay="0.4s" data-wow-offset="100">
            <?php echo $plang->orserv; ?>
                
            </p>
            <div class="services-slider swiper mb-5 pb-5 wow fadeInUp wow-once" data-wow-duration="0.6s" data-wow-delay="0.6s" data-wow-offset="100">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="service">
                            <img src="layout/temp/t1.webp" class="fit-img" />
                            <div class="overlay d-flex align-items-end">
                                <div class="content p-5">
                                    <p class="title mb-3 fw-bold fs-4">
                                    <?php echo $plang->s1t; ?>
                                        
                                    </p>
                                    <p class="lead fs-6">
                                    <?php echo $plang->s1d; ?>
                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="service">
                            <img src="layout/temp/t2.webp" class="fit-img" />
                            <div class="overlay d-flex align-items-end">
                                <div class="content p-5">
                                    <p class="title mb-3 fw-bold fs-4">
                                    <?php echo $plang->s2t; ?>
                                        
                                    </p>
                                    <p class="lead fs-6">
                                    <?php echo $plang->s2d; ?>
                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="service">
                            <img src="layout/temp/t3.webp" class="fit-img" />
                            <div class="overlay d-flex align-items-end">
                                <div class="content p-5">
                                    <p class="title mb-3 fw-bold fs-4">
                                    <?php echo $plang->s3t; ?>
                                        
                                    </p>
                                    <p class="lead fs-6">
                                    <?php echo $plang->s3d; ?>
                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="service">
                            <img src="layout/temp/t1.webp" class="fit-img" />
                            <div class="overlay d-flex align-items-end">
                                <div class="content p-5">
                                    <p class="title mb-3 fw-bold fs-4">
                                    <?php echo $plang->s4t; ?>
                                        
                                    </p>
                                    <p class="lead fs-6">
                                    <?php echo $plang->s4d; ?>
                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="service">
                            <img src="layout/temp/t1.webp" class="fit-img" />
                            <div class="overlay d-flex align-items-end">
                                <div class="content p-5">
                                    <p class="title mb-3 fw-bold fs-4">
                                    <?php echo $plang->s5t; ?>
                                        
                                    </p>
                                    <p class="lead fs-6">
                                    <?php echo $plang->s5d; ?>
                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

    <div class="info padd">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 mb-4">
                    <p class="section-sub fw-bold mb-2 wow fadeInUp wow-once" data-wow-duration="0.4s" data-wow-delay="0.4s" data-wow-offset="100">
                    <?php echo $plang->gtnus; ?>
                        
                    </p>
                    <h2 class="fw-bold fs-2 mb-3 wow fadeInUp wow-once" data-wow-duration="0.6s" data-wow-delay="0.6s" data-wow-offset="100">
                    <?php echo $plang->gtustitle; ?>
                        
                    </h2>
                    <p class="lead mb-5 pb-4 wow fadeInUp wow-once" data-wow-duration="0.8s" data-wow-delay="0.8s" data-wow-offset="100">
                    <?php echo $plang->gtuslead; ?>
                        
                    </p>

                    <div class="tics">
                        <div class="tic d-flex mb-5  wow fadeInUp wow-once" data-wow-duration="0.4s" data-wow-delay="0.4s" data-wow-offset="150">
                            <div class="icon ms-3">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <div class="tic-content">
                                <p class="title mb-1 fw-bold">
                                <?php echo $plang->usfet1t; ?>
                                    
                                </p>
                                <p class="small mb-0">
                                <?php echo $plang->usfet1d; ?>
                                    
                                </p>
                            </div>
                        </div>
                        <div class="tic d-flex mb-5 wow fadeInUp wow-once" data-wow-duration="0.6s" data-wow-delay="0.6s" data-wow-offset="100">
                            <div class="icon ms-3">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <div class="tic-content">
                                <p class="title mb-1 fw-bold">
                                <?php echo $plang->usfet2t; ?>
                                    
                                </p>
                                <p class="small mb-0">
                                <?php echo $plang->usfet2d; ?>
                                    
                                </p>
                            </div>
                        </div>
                        <div class="tic d-flex mb-5 pb-3 wow fadeInUp wow-once" data-wow-duration="0.8s" data-wow-delay="0.8s" data-wow-offset="100">
                            <div class="icon ms-3">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <div class="tic-content">
                                <p class="title mb-1 fw-bold">
                                <?php echo $plang->usfet3t; ?>
                                    
                                </p>
                                <p class="small mb-0">
                                <?php echo $plang->usfet3d; ?>
                                    
                                </p>
                            </div>
                        </div>

                        <a href="services.php" class="btn btn-primary btn-bg wow fadeInUp wow-once" data-wow-duration="0.4s" data-wow-delay="0.4s" data-wow-offset="100">
                        <?php echo $plang->knowourfeat; ?>
                             <i class="fa-solid fa-chevron-left me-3 rotate-en"></i>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 mb-4 wow fadeInUp wow-once" data-wow-duration="2.4s" data-wow-delay="0.4s" data-wow-offset="100">
                    <div class="img-cont fit-img sticked" style="height: auto;">
                        <img src="layout/imgs/info.webp" class="fit-img" />
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>

    <?php getAttractSection();  ?>
</div>

  
<?php
    get_footer();
?>