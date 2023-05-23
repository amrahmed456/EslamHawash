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
    get_header('project', '' , $gurl, $gtitle , $gdesc , $explodedPhotos[0]);
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
                                <button class="btn btn-round ms-2 love <?php echo $liked;?>" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-slug="<?php echo $project['port_slug']; ?>">
                                    <i class="fa-solid fa-heart ms-2"></i>
                                    <span class="love-title-counter">
                                    <?php echo $project['likes']; ?> <?php echo $plang->likes; ?>
                                    </span>
                                    
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

        <div class="row mb-5">
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
           
           
           <?php
            if(strlen($project['description_' . get_website_lang()]) > 5){
                ?>
 <p class="section-title fw-bold mb-4 pt-5 wow fadeInUp wow-once" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
            <?php echo $plang->descr; ?>
                
            </p>    
            <div class="main-content-container wow fadeInUp wow-once" data-wow-duration=".5s" data-wow-delay="0.5s" data-wow-offset="100">
                <?php echo $project['description_' . get_website_lang()]; ?>
            </div>
                <?php
            }
           ?>
           

       
    </div>
    <?php getAttractSection(); ?>

    <?php
        $similarPorjects = new CategoriesModel();
        $similarPorjects = $similarPorjects->getSimilarProjects($project);
        if(count($similarPorjects) > 0){
            ?>
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
            <?php
            foreach($similarPorjects as $similar){
?>
 <div class="swiper-slide">
    <?php portfolio_template($similar); ?>
</div>
<?php
            }
            ?>
           
        </div>
    </div>
       
       </div>

    </div>

            <?php
        }
            ?>
   
    
    

</div>

    <!-- Modal -->
<div class="modal fade make-cursor-on-top" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $plang->submitt; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="col-12">
            <div class="input-container mb-0">
                <textarea required rows="3" class="form-control" name="feedback" placeholder="<?php echo $plang->urfeed; ?>"></textarea>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-bg" id="send_feedback" data-slug="<?php echo $project['port_slug']; ?>" ><?php echo $plang->sendfeed; ?></button>
      </div>
    </div>
  </div>
</div>

<?php
    get_footer('project');
?>