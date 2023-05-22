<?php
    require_once 'init.php';
    $plang = get_lang_file('project');

    $project = '';
    $cats = new CategoriesModel;
    function update_view_project($slug,$views){
       
        global $project;
        global $cats;
        // update views
        $cats->increase_view( $slug ,$views );

        $_SESSION['projects'][] = [ 'port_slug' => $slug, 'like' => '0'];

    }
   
    if( isset($_GET['portfolio']) ){
        $project = filter_var(trim($_GET['portfolio']), FILTER_SANITIZE_STRING);
    }else{
        header("location: portfolio.php");
        exit();
    }

    $project = $cats->get_category_product('', $project , true);
    if( empty($project) ){
        header("location: portfolio.php");
        exit();
    }
    $project = $project[0];
    if( $project['status'] == '0' ){
        header("location: portfolio.php");
        exit();
    }
    $liked = '';
    if( isset($_SESSION['projects']) ){
        $found = false;
        foreach( $_SESSION['projects'] as $sess_pro ){
            if( $sess_pro['port_slug'] == $project['port_slug'] ){
                $found = true;
                $liked = ( $sess_pro['like'] == '1' ) ? 'loved' : '';
            }
        }
        if( $found === false ){
            update_view_project($project['port_slug'],$project['views']);
        }
        
    }else{
        update_view_project($project['port_slug'],$project['views']);
    }


    $gurl = 'project.php?portfolio=' . $project['port_slug'];
    $gtitle = $project['title_' . get_website_lang()];
    $gdesc = $project['description_' . get_website_lang()];
    $imgsFolder = 'uploads/' . $project['port_slug'] . '/';
    $explodedPhotos = explode(',' , $project['photos']);
    $gimg = $imgsFolder . $explodedPhotos[0];
    get_header();
?>
<div class="project-page">

    <div class="header" style="background:url(<?php echo $imgsFolder . $explodedPhotos[0]; ?>) no-repeat center center">
        <div class="overlay d-flex align-items-center calcHeightForParent">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-5 d-flex align-items-center mb-4">
                        <div>
                            <p class="section-sub fw-bold mb-3 wow fadeInUp wow-once" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
                                <?php echo $project['name_' .  get_website_lang()]; ?>
                            </p>
                            <h1 class="fw-bold fs-1 mb-5 wow fadeInUp wow-once" data-wow-duration=".4s" data-wow-delay="0.6s" data-wow-offset="100">
                                <?php echo $project['title_' .  get_website_lang()]; ?>
                            </h1>
                            <p class="small date mb-3 wow fadeInUp wow-once" data-wow-duration=".4s" data-wow-delay="0.7s" data-wow-offset="100">
                             <?php echo get_data_stylish($project['date']); ?>
                            </p>
                            
                            <div class="mt-4 d-flex wow fadeInUp wow-once" data-wow-duration=".7s" data-wow-delay="0.5s" data-wow-offset="100">
                                <button class="btn btn-round ms-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-heart ms-2"></i>
                                    <?php echo $project['likes']; ?> <?php echo $plang->likes; ?>
                                </button>
                                <button class="btn btn-round share share_link">
                                    <i class="fa-solid fa-share-nodes ms-2"></i>
                                    <?php echo $plang->sharepos; ?>
                                    
                                </button>
                            </div>
                        </div>
                       
                    </div>
                    <!-- ShareThis BEGIN -->
<div class="sharethis-inline-share-buttons sharethis-buttons d-none"></div>
<!-- ShareThis END -->
                    <div class="col-12 col-md-6 col-lg-7 wow fadeInUp wow-once" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
                        <div class="project-imgs-cont mb-4">
                            <div class="project-slider swiper h-100 w-100">
                                <div class="swiper-wrapper h-100 w-100">
                                    <?php
                                        foreach($explodedPhotos as $photo){
                                            $photoSrc = $imgsFolder . $photo;
                                            ?>
                                                <a href="<?php echo $photoSrc; ?>" class="swiper-slide d-block h-100 w-100" data-lightbox="gallery">
                                                    <img src="<?php echo $photoSrc; ?>" class="fit-img" />
                                                </a>
                                            <?php
                                        }
                                    ?>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
       
    </div>

    
    <div class="videos-section padd pb-0">
        <div class="container">
        <?php
            $videos = explode(',' , $project['videos']);
            if(count($videos) > 1){
                ?>
                    <p class="section-title fw-bold mb-4 wow fadeInUp wow-once" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
                    <?php echo $plang->videos; ?>
                    </p>

                    <div class="project-videos-slider swiper mb-5 pb-5 wow fadeInUp wow-once" data-wow-duration=".6s" data-wow-delay="0.6s" data-wow-offset="100">
                        <div class="swiper-wrapper">
                            <?php
                                foreach($videos as $video){
                                    if (strpos($video, '?v=') !== false) {
                                        $videoID = explode('?v=' , $video)[1];
                                        ?>
                                            <div class="swiper-slide">
                                                <a href="#" class="d-block video-thumb js-video-button" data-video-id="<?php echo $videoID; ?>" data-channel="youtube">
                                                    <img class="fit-img" src="https://img.youtube.com/vi/<?php echo $videoID; ?>/sddefault.jpg">
                                                    <div class="playbtn">
                                                        <button class="btnz">
                                                            <span class="play"></span>
                                                        </button>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php
                                    }
                                }
                            ?>
                            
                        </div>
                    </div>
                <?php
            }
        ?>
        
            <?php
                $panoramas = explode(',' , $project['panorama']);
                if(count($panoramas) > 1){
?>
        <!-- Panoramas -->
        <p class="section-title fw-bold mb-4 wow fadeInUp wow-once" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
            <?php echo $plang->thrtedeg; ?>
        </p>
        <div class="d-none collection-panoramas-sources">
            <?php
                $count = 1;
                foreach($panoramas as $panorama){
                    $panSrc = $imgsFolder . 'panorama/' . $panorama;
                    echo '<span data-panorama="'.$panSrc.'" data-id="#panorama'. $count .'"></span>';
                    $count++;
                }
            ?>
        </div>

        <div class="row">
            <?php
                $count = 1;
                foreach($panoramas as $panorama){
                    $panSrc = $imgsFolder . 'panorama/' . $panorama;
                    echo '<div class="col-12 col-md-6 col-lg-4 mb-4 wow fadeInUp wow-once" data-wow-duration=".6s" data-wow-delay="0.6s" data-wow-offset="100">
                    <div id="panorama'.$count.'" class="panorama-container"></div>
                </div>';
                    $count++;
                }
            ?>
        </div>
<?php
                }
            ?>
           
          
           
            <p class="section-title fw-bold mb-4 mt-5 pt-5 wow fadeInUp wow-once" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
            <?php echo $plang->descr; ?>
                
            </p>    
            <div class="main-content-container wow fadeInUp wow-once" data-wow-duration=".5s" data-wow-delay="0.5s" data-wow-offset="100">
                <?php echo $project['description_' . get_website_lang()]; ?>
            </div>

       
    </div>
    <?php getAttractSection(); ?>

    <div class="other-projects padd">
        <div class="container">

        
        <div class="d-flex align-items-center justify-content-between mb-5">
            <div>
                <p class="section-sub fw-bold mb-3 wow fadeInUp wow-once" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
                <?php echo $plang->morep; ?>
                    
                </p>
                <h2 class="fw-bold fs-3 wow fadeInUp wow-once" data-wow-duration=".5s" data-wow-delay="0.5s" data-wow-offset="100">
                <?php echo $plang->moret; ?>
                    
                </h2>
            </div>
            <a href="" type="button" class="btn btn-primary btn-bg wow fadeInUp wow-once" data-wow-duration=".5s" data-wow-delay="0.5s" data-wow-offset="100">
            <?php echo $plang->browsal; ?>
                 <i class="fa-solid fa-chevron-left me-2 rotate-en"></i>
            </a>
        </div>
        
       <div class="other-projects-slider swiper wow fadeInUp wow-once" data-wow-duration="0.8s" data-wow-delay="0.8s" data-wow-offset="150">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="" class="product-card-template wow fadeInUp wow-once" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
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
    </div>
       </div>

    </div>
    
    

</div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
  
          <div class="col-12">
              <div class="input-container mb-0">
                  <p class="label"></p>
                  <textarea required rows="3" class="form-control" name="feedback"></textarea>
              </div>
          </div>
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-bg" id="send_feedback" data-slug="" >إرسال</button>
        </div>
      </div>
    </div>
  </div>

<?php
    get_footer('project');
?>