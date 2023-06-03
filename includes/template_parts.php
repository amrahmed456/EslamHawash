<?php


function portfolio_template($project){

    $lng = $_SESSION['user']['website_settings']['lang'];
    

    if(!empty($project)){
        $photos = explode("," , $project['photos']);
    ?>
        
        <a href="<?php echo 'project.php?portfolio=' . $project['port_slug']; ?>" class="product-card-template wow fadeInUp wow-once" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100" data-slug="<?php echo $project['port_slug']; ?>">
                <div class="product-imgs-cont">
                    <div class="imgs-cont-slider swiper h-100 w-100">
                        <div class="swiper-wrapper w-100 h-100">
                            <?php
            foreach($photos as $photo){
                echo '
                    <div class="swiper-slide w-100 h-100">
                    <img src="uploads/'.$project['port_slug'].'/'. $photo .'" class="fit-img" />
                </div>
                ';
            }
                            ?>
                            
                            
                        </div>
                    </div>
                </div>
                <p class="title mb-0">
                    <?php echo $project['title_'.$lng]; ?>
                </p>
                <div class="d-flex align-items-center justify-content-between">
                    <p class="mb-0 date">
                        <?php echo get_data_stylish($project['date']); ?>
                    </p>
                    <div class="d-flex align-items-center">
                        <?php if ($project['likes'] > 0){
                            ?>
                        <div class="d-flex justify-content-center align-items-center loves-show ms-3">
                            <p class="mb-0"> <?php echo $project['likes']; ?></p>
                            <i class="fa-solid fa-heart me-2"></i>
                        </div>
                            <?php
                        } ?>
                       
                        <div class="arrow-go d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-arrow-left rotate-en"></i>
                        </div>
                    </div>
                </div>
            </a>
           
    <?php
    }

}


function getAttractSection(){
    global $glang;
    ?>
<div class="container mb-5 pt-5 wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
    <div class="attract-section mt-4 pt-5">
        <div class="row">
            <div class="col-12 col-md-7">
                <p class="section-sub fw-bold mb-3">
                    <?php echo $glang->strproj ?>
                </p>
                <h2 class="fw-bold fs-2">
                    <?php echo $glang->contactnow ?>
                </h2>
                <p class="lead">
                    <?php echo $glang->contactnowdesc ?>
                    
                </p>

                <div class="d-flex align-items-center btns mt-5">
                    <a href="contact.php" class="btn btn-primary btn-white btn-bg ms-3">
                        <?php echo $glang->contact ?>
                    </a>
                    <?php
                    if(WEBSITE_SETTINGS['phone'] != ''){
                        echo '<a href="tel:'. WEBSITE_SETTINGS['phone'] .'" class="btn btn-outline-white btn-bg">
                        <i class="fa-solid fa-phone ms-2"></i>
                        '.$glang->callsus.'
                    </a>';
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
}

function getSoicals($page = ''){
    ?>
    <div class="socials d-flex <?php echo ($page == 'contact') ? 'me-3' : ''; echo ($page == 'nav') ? 'justify-content-center' : ''; ?>">
        <?php
            if(WEBSITE_SETTINGS['facebook'] != ''){
                echo '<a href="'.WEBSITE_SETTINGS['facebook'].'" target="_blank" class="social-icon">
                <i class="fa-brands fa-facebook-f"></i>
            </a>';
            }
        ?>
        <?php
            if(WEBSITE_SETTINGS['twitter'] != ''){
                echo '<a href="'.WEBSITE_SETTINGS['twitter'].'" target="_blank" class="social-icon">
                <i class="fa-brands fa-twitter"></i>
            </a>';
            }
        ?>
        <?php
            if(WEBSITE_SETTINGS['whatsapp'] != ''){
                echo '<a href="'.WEBSITE_SETTINGS['whatsapp'].'"" target="_blank" class="social-icon">
                <i class="fa-brands fa-whatsapp"></i>
            </a>';
            }
        ?>
        <?php
            if(WEBSITE_SETTINGS['behance'] != ''){
                echo '<a href="'.WEBSITE_SETTINGS['behance'].'" target="_blank" class="social-icon">
                <i class="fa-brands fa-behance"></i>
            </a>';
            }
        ?>
        <?php
            if(WEBSITE_SETTINGS['instagram'] != ''){
                echo '<a href="'.WEBSITE_SETTINGS['instagram'].'" target="_blank" class="social-icon">
                <i class="fa-brands fa-instagram"></i>
            </a>';
            }
        ?>
        <?php
            if(WEBSITE_SETTINGS['email'] != ''){
                echo '<a href="mailto:'.WEBSITE_SETTINGS['email'].'" target="_blank" class="social-icon">
                <i class="fa-regular fa-envelope"></i>
            </a>';
            }
        ?>

        <?php
            if(WEBSITE_SETTINGS['phone'] != ''){
                echo '<a href="tel:'.WEBSITE_SETTINGS['phone'].'" class="social-icon">
                <i class="fa-solid fa-phone"></i>
            </a>';
            }
        ?>
        
        
       
        
    </div>
    <?php
}

function getContactForm($showLables = false){
    global $glang;
    $lab1 = ( $showLables ) ? '<label>'.$glang->cont_method.'</label>' : '<label></label>';
    $lab2 = '';
    $lab3 = ( $showLables ) ? '<label>'. $glang->your_name .'</label>' : '';
    $lab4 = ( $showLables ) ? '<label> '. $glang->mssg_op .'</label>' : '';
    ?>
<form id="contact-form">
    <div class="contact-form h-100">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="input-container">
                    <?php echo $lab1; ?>
                    <select required name="select-method" class="required custom-select custom-select-md mb-0 academic-level-input" data-to="level">
                        <option disabled="" ><?php echo $glang->cont_method; ?></option>
                        <option value="phone" data-v="<?php echo $glang->phone_lbl; ?> "><?php echo $glang->phone; ?></option>
                        <option value="email" data-v="<?php echo $glang->email_lbl; ?>"><?php echo $glang->emls; ?></option>
                        <option value="whatsapp" data-v="<?php echo $glang->whts_lbl; ?> "><?php echo $glang->whts; ?></option>
                        <option value="messanger" data-v="<?php echo $glang->mssngr_lbl; ?>"><?php echo $glang->mssnger; ?></option>
                        <option value="instagram" data-v="<?php echo $glang->instagram_lbl; ?>"><?php echo $glang->instagram; ?></option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="input-container mb-4">
                    <?php echo $lab2; ?>
                    <label><p class="mb-0" style="visibility: hidden;">ddd</p></label>
                    <input placeholder="<?php echo $glang->phone_lbl; ?>" type="text" name="contact" class="required" required />
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="input-container">
                    <?php echo $lab3; ?>
                    <input type="text" name="name" class="required" required="" placeholder="<?php echo $glang->your_name; ?>">
                </div>
            </div>
            
            <div class="col-12 mb-4">
                <div class="input-container">
                    <?php echo $lab4; ?>
                    <textarea placeholder="<?php echo $glang->mssg_op; ?>" required="" class="form-control" name="open"></textarea>
                </div>
            </div>
            <div class="col-12 d-flex">
                <button type="submit" class="btn btn-white btn-bg btn-block"><?php echo $glang->send_mssg; ?></button>
                
            </div>
        </div>
    </div>
</form>
    <?php
}