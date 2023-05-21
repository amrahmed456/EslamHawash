<?php
    require_once 'init.php';
    get_header();
    $plang = get_lang_file('portfolio');
?>

<!-- <span id="initial_page_number" data-page="<?php echo $page; ?>" class="d-none"></span>
<span id="page_category" data-slug="<?php echo $cat_slug; ?>" class="d-none"></span>
<span id="page_limit" data-limit="<?php echo $limit; ?>" class="d-none"></span> -->

<div class="portfolio-page">
    <div class="header">
        <video preload="metadata" playsinline="" loop="" muted="" class="hero_video fit-img" style="height:100%" autoplay="">
            <source src="layout/videos/portfolio-video.mp4" type="video/webm">
        </video>
        <div class="overlay calcHeightForParent">
            <div class="swiper MainCategoiresSlider mt-4">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <a href="">تصميم داخليى</a>
                  </div>
                  <div class="swiper-slide">
                    <a href="">تصميم خارجي</a>
                  </div>
                  <div class="swiper-slide">
                    <a href="">معماري</a>
                  </div>
                  <div class="swiper-slide">
                    <a href="">حديث</a>
                  </div>
                  <div class="swiper-slide">
                    <a href="">عصري</a>
                  </div>
                  <div class="swiper-slide">
                    <a href="">شقق سكنية</a>
                  </div>
                  <div class="swiper-slide">
                    <a href="">أبراج</a>
                  </div>
                  <div class="swiper-slide">
                    <a href="">فيلات</a>
                  </div>
                  <div class="swiper-slide">
                    <a href="">حدائق</a>
                  </div>
                  <div class="swiper-slide">
                    <a href="">مزارع</a>
                  </div>
                  <div class="swiper-slide">
                    <a href="">وحدات سكنية</a>
                  </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>

              <div class="content text-center d-flex justify-content-center mt-5 pt-5">
                <div>
                    <p class="section-sub fw-bold mb-3 wow fadeInUp wow-once" data-wow-duration=".4s" data-wow-delay="0.2s" data-wow-offset="100">
                        <?php echo $plang->page_cat; ?>
                    </p>
                    <h1 class="fw-bold wow fadeInUp wow-once"data-wow-duration=".5s" data-wow-delay="0.6s" data-wow-offset="100">
                        <?php echo $plang->page_title; ?>
                        
                    </h1>
                    <p class="lead mt-3 wow fadeInUp wow-once" data-wow-duration=".6s" data-wow-delay="0.8s" data-wow-offset="100">
                        <?php echo $plang->page_lead; ?>
                        
                    </p>

                    <div class="mt-5 pt-5 sub-categories d-flex flex-wrap justify-content-center align-items-center wow fadeInUp wow-once" data-wow-duration=".4s" data-wow-delay="0.5s" data-wow-offset="100">
                        <div class="title">
                            <?php echo $plang->subcats; ?>
                        </div>
                        <a href="">
                            الحرف الصناعية
                        </a>
                        <a href="">
                            العمارة
                        </a>
                        <a href="">
                            التصميم الداخلي
                        </a>
                        <a href="">
                            الخاريج
                        </a>
                        <a href="">
                            مكاتب
                        </a>
                    </div>
                </div>
              
              </div>
        </div>
    </div>

    <div class="show-section pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 mb-4 wow fadeInUp wow-once" data-wow-duration=".8s" data-wow-delay="0.4s" data-wow-offset="100">
                    <a href="" class="product-card-template">
                        <div class="product-imgs-cont">
                            <div class="imgs-cont-slider swiper h-100 w-100">
                                <div class="swiper-wrapper w-100 h-100">
                                    <div class="swiper-slide w-100 h-100">
                                        <img src="layout/temp/t1.webp" class="fit-img" />
                                    </div>
                                    <div class="swiper-slide w-100 h-100">
                                        <img src="layout/temp/t2.webp" class="fit-img" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="title mb-0">
                            تصميم لفراغ استقبال علي طراز النيو كلاسيك 
                        </p>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 date">
                                Oct 25, 2022
                            </p>
                            <div class="d-flex align-items-center">
                                <div class="d-flex justify-content-center align-items-center loves-show ms-3">
                                    <p class="mb-0">12</p>
                                    <i class="fa-solid fa-heart me-2"></i>
                                </div>
                                <div class="arrow-go d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
            </div>

            <div class="loading-content loader mt-2" id="load-more">
                <svg class="spinner" viewBox="0 0 50 50">
                  <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
                </svg>
            </div>

            <?php getAttractSection(); ?>
        </div>
    </div>
</div>

<?php
    get_footer();
?>