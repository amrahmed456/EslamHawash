<?php
    require_once 'init.php';
   
    $plang = get_lang_file('portfolio');
    $cat_slug = '';
    $page = 1;
    $limit = 4;

    if( isset($_GET['category']) ){
        $cat_slug = filter_var(trim($_GET['category']), FILTER_SANITIZE_STRING);
        $cat_slug = ( $cat_slug == 'all' ) ? '' : $cat_slug;
    }

    if( isset($_GET['page']) ){
        $page = filter_var(trim($_GET['page']), FILTER_SANITIZE_STRING);
        $page = ( is_numeric($page) ) ? $page : 1;
    }

    $cats = new CategoriesModel;
    $options = $cats->getAllCats($cat_slug);
   /*  $ports = $cats->getProductsAllWithSubChilds($options);
    if(count($ports) <= 0){
        // no data found
        header("Location: index.php");
        exit();
    } */
    
    get_header();
    
?>

<span id="initial_page_number" data-page="<?php echo $page; ?>" class="d-none"></span>
<span id="page_category" data-slug="<?php echo $cat_slug; ?>" class="d-none"></span>
<span id="page_limit" data-limit="<?php echo $limit; ?>" class="d-none"></span>
<span id="data_options" class="d-none"><?php echo json_encode($options); ?></span>

<div class="portfolio-page">
    <div class="header">
        <video preload="metadata" playsinline="" loop="" muted="" class="hero_video fit-img" style="height:100%" autoplay="">
            <source src="layout/videos/portfolio-video.mp4" type="video/webm">
        </video>
        <?php
            $padder = count($options['parents']);
            if($padder > 6){
                $padder = 'add-padding';
            }
        ?>
        <div class="overlay calcHeightForParent ">
            <div class="swiper MainCategoiresSlider add-padding mt-4">
                <div class="swiper-wrapper">
                <?php
                    if(count($options['parents']) > 0){
                        foreach($options['parents'] as $parent){
                            $selected = '';
                            if(isset($options['currentCat']['slug'])){
                                if($parent['slug'] == $options['currentCat']['slug']){
                                    $selected = 'active';
                                }
                            }
                           
                            echo ' <div class="swiper-slide">
                            <a class="'.$selected.'" href="portfolio.php?category='. $parent['slug'] .'">'. $parent['name_' . get_website_lang()] .'</a>
                          </div>';
                        }
                    }
                ?>
                 
                  
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
                        <?php
                            $pageTitle = $plang->page_title . $plang->diversed;
                            if(isset($options['currentCat']['slug'])){
                                $pageTitle = $plang->page_title .$plang->in . ' ' . $options['currentCat']['name_' . get_website_lang()];
                            }
                            echo $pageTitle;
                        ?>
                        
                    </h1>
                    <p class="lead mt-3 wow fadeInUp wow-once" data-wow-duration=".6s" data-wow-delay="0.8s" data-wow-offset="100">
                        <?php echo $plang->page_lead; ?>
                        
                    </p>

                    <?php
                    if(count($options['directChilds']) > 0){
                        echo '<div class="mt-5 pt-5 sub-categories d-flex flex-wrap justify-content-center align-items-center wow fadeInUp wow-once" data-wow-duration=".4s" data-wow-delay="0.5s" data-wow-offset="100"> <div class="title">
                        '. $plang->subcats . ' </div>';
                        foreach( $options['directChilds'] as $directChild ){
                            echo ' <a href="portfolio.php?category='. $directChild['slug'] .'">
                            '. $directChild['name_' . get_website_lang()] .'
                        </a>';
                        }
                        echo '</div>';
                    }
                    ?>
                    
                       
                       
                </div>
              
              </div>
        </div>
    </div>

    <div class="show-section pt-5 pb-5">
        <div class="container">
            <div class="row" id="projects_container_template">
                
            </div>
            <div class="text-center text-secondary small no-more-data mt-5 d-none">
                <?php echo $plang->nomoreres; ?>
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
<p class="d-none PortsLoadedSlugs"></p>
<?php
    get_footer();
?>

<script>
    $(document).ready(function(){
    var loaded_slugs = [0];
    var options = $("#data_options").text();
    var loadedPorts = $(".PortsLoadedSlugs").text();
    
    if( $("#initial_page_number").length > 0 ){
    var current_page    = $("#initial_page_number").attr("data-page").trim();
    current_page        = parseInt(current_page);
    var limit           = $("#page_limit").attr("data-limit").trim();

    /* load more projects */
    var load_top,current_top,loading = 0;
    $(window).scroll(function(){
    if(loading == 0){
        prev_slugs = loaded_slugs.join(",");
        load_top 	= $("#load-more").offset().top + 100;
        current_top = $(this).scrollTop() + $(this).height();
        
        if(current_top > load_top && loading == 0){
        loading = 1;
        $("#load-more").fadeIn();
        
        $.ajax({
            
            url:	"admin/form_handler.php",
            method:	"POST",
            dataType:	"text",
            data:	{"form_action":'load_more_projects','options':options,'page':current_page,'limit':limit,'ajax_request':'ajax','loaded_slugs': prev_slugs},
            success:	function(text){
            
            if(text.length <= 10){
                            
                loading = 1;
                $("#load-more").remove();
                $(".no-more-data").removeClass("d-none");
                
            }else{
                current_page++;
                loading = 0;
                // there are more apartments
                $("#projects_container_template").append(text);
                run_portfolio_inner_slider();
                setLoadedSlugs();
            }
            }
            
        });
        
        }
    }
    
    });

    }

    
    function setLoadedSlugs(){
        loaded_slugs = [0];
        $(".product-card-template").each(function(){
            loaded_slugs.push($(this).attr("data-slug"));
        });

    }

    function run_portfolio_inner_slider(){
        var swiper = new Swiper(".imgs-cont-slider", {
        spaceBetween: 0,
        centeredSlides: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        }
      });
    }
});
</script>