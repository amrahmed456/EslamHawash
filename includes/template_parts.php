<?php


function get_basic_contact_btns($center = false){
   
    global $glang;
    ?>
    <div class="btns d-flex flex-wrap <?php echo ($center == true) ? 'justify-content-center' : ''; ?>">
        <a href="contact.php" class="btn btn-sm btn-primary mb-2 wow fadeInUp wow-once" data-wow-duration=".8s" data-wow-delay="0.6s" data-wow-offset="120" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.6s; animation-name: fadeInUp;">
        <?php echo $glang->contact; ?>
        </a>
        <?php
            if( WEBSITE_SETTINGS['phone'] != '' ){
?>
<a href="tel:<?php echo WEBSITE_SETTINGS['phone']; ?>" class="custom-call-link d-flex align-items-center ms-3 me-3 mb-2 wow fadeInUp wow-once" data-wow-duration=".6s" data-wow-delay="0.7s" data-wow-offset="130" style="visibility: visible; animation-duration: 0.6s; animation-delay: 0.7s; animation-name: fadeInUp;">
    <span class="icomoon icon-phone me-2"></span>
    <div>
        <p class="small mb-0"><?php echo $glang->call_now; ?></p>
        <p class="m-0"><?php echo WEBSITE_SETTINGS['phone']; ?></p>
    </div>
    
</a>
<?php
            }
        ?>
        
    </div>
    <?php
}

function get_we_do_it_all(){
    global $glang;
    ?>
<div class="we-do-it-all-section position-relative padd pt-4">
            
            
            <div class="section-titles text-center mb-5 pb-2">
                <p class="small font m-0 wow fadeInUp"data-wow-duration=".4s" data-wow-delay="0.2s" data-wow-offset="100"><?php echo $glang->we_do_all; ?></p>
                <h2 class="m-0 font wow fadeInUp"data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100"><?php echo $glang->all_do_tit; ?></h2>
            </div>
            <div class="d-flex justify-content-center mb-4">
                <div class="arrow-for-slider-cat categories-prev-arrow">
                    <span class="icomoon icon-short-arrow">
                    </span>
                </div>
                <div class="arrow-for-slider-cat categories-next-arrow">
                    <span class="icomoon icon-short-arrow">
                    </span>
                </div>
    
            </div>
            <div class="we-do-ite-slider">
                <div>
                    <div class="we-do">
                        <div class="img-cont mb-3">
                            <img src="layout/imgs/w1.webp" class="fit-img" />
                        </div>
                        <p class="title"><?php echo $glang->all_s_color; ?></p>
                    </div>
                </div>
                <div>
                    <div class="we-do">
                        <div class="img-cont mb-3">
                            <img src="layout/imgs/w2.webp" class="fit-img" />
                        </div>
                        <p class="title"><?php echo $glang->all_s_light; ?></p>
                    </div>
                </div>
                <div>
                    <div class="we-do">
                        <div class="img-cont mb-3">
                            <img src="layout/imgs/w3.webp" class="fit-img" />
                        </div>
                        <p class="title"><?php echo $glang->all_s_audio; ?></p>
                    </div>
                </div>
                <div>
                    <div class="we-do">
                        <div class="img-cont mb-3">
                            <img src="layout/imgs/w4.webp" class="fit-img" />
                        </div>
                        <p class="title"><?php echo $glang->all_s_roof; ?></p>
                    </div>
                </div>
                <div>
                    <div class="we-do">
                        <div class="img-cont mb-3">
                            <img src="layout/imgs/w5.webp" class="fit-img" />
                        </div>
                        <p class="title"> <?php echo $glang->all_s_arc; ?></p>
                    </div>
                </div>
                <div>
                    <div class="we-do">
                        <div class="img-cont mb-3">
                            <img src="layout/imgs/w6.webp" class="fit-img" />
                        </div>
                        <p class="title"><?php echo $glang->all_space_p; ?></p>
                    </div>
                </div>
               
            </div>
        </div>

    <?php
}

function get_want_to_start_project(){
    global $glang;
    ?>
    <div class="gurantes-section padd pt-0">
            
            <div class="container">
                <div class="backers p-5 position-relative">
                    <span class="d-none d-md-block particles-svg wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.2s" data-wow-offset="100" data-position="17px 0px auto auto" data-color="#2A66FF" data-width="180px" data-height="360px" data-radius="0px 200px 200px 0px"></span>
                    <span class="d-none d-md-block particles-svg wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.3s" data-wow-offset="100" data-position="17px 180px auto auto" data-color="#FF4545" data-width="180px" data-height="360px" data-radius="0px 200px 200px 0px"></span>
                    <span class="d-none d-md-block particles-svg wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100" data-position="17px 360px auto auto" data-color="#FDB52A" data-width="180px" data-height="180px" data-radius="0px 200px 200px 200px"></span>
                    <span class="d-none d-md-block particles-svg wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100" data-position="200px 360px auto auto" data-color="#4FC553" data-width="180px" data-height="180px" data-radius="200px 200px 200px 200px"></span>

                    <div class="row">
                        <div class="col-12 col-md-6 mb-4">
                            
                            <h2 class="font mb-4 wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.2s" data-wow-offset="100">
                                <?php echo $glang->want_to_start; ?>
                            </h2>
                            <p class="lead mb-5 wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
                                <?php echo $glang->want_to_start_d; ?>
                            </p>
                            <?php get_basic_contact_btns(); ?>
                        </div>
                        <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    <?php
}


function form_message_template(){
    global $glang;
    ?>
<form id="contact-form">
    <div class="form-holder-parent">
        <div class="row">
            <div class="col-12">
                <div class="input-container">
                    <p class="label"><?php echo $glang->your_name; ?></p>
                    <input type="text" name="name" class="required" required />
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="input-container">
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
                <div class="input-container">
                    <p class="label to_be_changed"><?php echo $glang->phone_lbl; ?></p>
                    <input type="text" name="contact" class="required" required />
                </div>
            </div>
            <div class="col-12">
                <div class="input-container">
                    <p class="label"><?php echo $glang->mssg_op; ?></p>
                    <textarea required rows="3" class="form-control" name="open"></textarea>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-bg btn-block"><?php echo $glang->send_mssg; ?></button>
            </div>
        </div>
    </div>
</form>

    <?php
}

function portfolio_template($project){

    $lng = $_SESSION['user']['website_settings']['lang'];
    

    if(!empty($project)){
        $photos = explode("," , $project['photos']);
        $title = $project['title_' . $lng];
    ?>
        
                <div class="project-container-template">
                    <a href="project.php?portfolio=<?php echo $project['port_slug']; ?>" class="portfolio-template d-block">
                        <div class="img-cont position-relative">
                            <p class="m-0 category c4"><?php echo $project['name_' . $lng]; ?></p>
                            <div class="fit-img portfolio-template-inner-slider">
                                <?php
                                    foreach( $photos as $photo ){
                                        $src = DB_SETTINGS['uploads'] . $project['port_slug'] . '/' . $photo;
                                        
                                        echo "<img src='$src' width='100%' class='fit-img' alt='$title' title='$title' />";
                                    }
                                ?>
                                
                               
                            </div>
                        </div>
                        <div class="content">
                            <div class="d-flex justify-content-between">
                                <p class="small m-0 date"><?php echo get_data_stylish($project['date']); ?></p>
                                <div class="d-flex align-items-center">
                                    <span class="icomoon icon-heart me-1"></span>
                                    <?php echo $project['likes']; ?>
                                </div>
                            </div>
                            <p class="title mb-0"><?php echo $title; ?></p>
                        </div>
                        
                    </a>
                </div>
           
    <?php
    }

}


function get_social_btns($center = 'center'){
    $facebook = ( WEBSITE_SETTINGS['facebook'] == '' ) ? '' : "<a target='_blank' href='".WEBSITE_SETTINGS['facebook']."' class='linkw'><span class='icomoon icon-facebook'></span></a>";
    $twitter = ( WEBSITE_SETTINGS['twitter'] == '' ) ? '' : "<a target='_blank' href='".WEBSITE_SETTINGS['twitter']."' class='linkw'><span class='icomoon icon-twitter'></span></a>";
    $whatsapp = ( WEBSITE_SETTINGS['whatsapp'] == '' ) ? '' : "<a target='_blank' href='".WEBSITE_SETTINGS['whatsapp']."' class='linkw'><span class='icomoon icon-whatsapp'></span></a>";
    $telegram = ( WEBSITE_SETTINGS['telegram'] == '' ) ? '' : "<a target='_blank' href='".WEBSITE_SETTINGS['telegram']."' class='linkw'><span class='icomoon icon-telegram'></span></a>";
    $instagram = ( WEBSITE_SETTINGS['instagram'] == '' ) ? '' : "<a target='_blank' href='".WEBSITE_SETTINGS['instagram']."' class='linkw'><span class='icomoon icon-instagram'></span></a>";
    $email = ( WEBSITE_SETTINGS['email'] == '' ) ? '' : "<a href='mailto:".WEBSITE_SETTINGS['email']."' class='linkw'><span class='icomoon icon-email'></span></a>";
    $phone = ( WEBSITE_SETTINGS['phone'] == '' ) ? '' : "<a href='tel:".WEBSITE_SETTINGS['phone']."' class='linkw'><span class='icomoon icon-phone'></span></a>";
    echo "
        <div class='socials d-flex flex-wrap justify-content-$center'>
        
            $facebook $twitter $whatsapp $telegram $instagram $email $phone
            
        </div>
    ";
}


function get_team_section($pin = 'all'){
    echo '<div class="d-flex justify-content-center flex-wrap mb-5">';
    $pin = ( $pin == 'all' ) ? '' : '1';
    $team = new TeamModel;
    $team = $team->get_team('','', $pin);
    foreach($team as $member){
        $img_src = DB_SETTINGS['uploads'] . '/' . $member['photo'];
        $lng = get_website_lang();
        extract($member);
       
        ?>
    <div class="ms-2 me-2 mb-3 wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.2s" data-wow-offset="100">
        <div class="team-member-template position-relative">
            <div class="overlay d-flex flex-column justify-content-end">
                <div class="desc-cont d-flex justify-content-between align-items-center flex-wrap">
                    <div class="content">
                        <p class="name m-0"><?php echo $member['name_' . $lng] ?></p>
                        <p class="lead m-0"><?php echo $member['job_' . $lng] ?></p>
                    </div>
                    <div class="social-icons d-flex">
                        <?php
                            if($member['facebook'] != ''){
                                echo "
                                <div>
                                    <a href='$facebook' class='icon-cont d-flex justify-content-center align-items-center facebook'>
                                        <span class='icomoon icon-facebook'></span>
                                    </a>
                                </div>
                                ";
                            }
                        
                            if($member['whatsapp'] != ''){
                                echo "
                                <div>
                                    <a href='$whatsapp' class='icon-cont d-flex justify-content-center align-items-center whatsapp'>
                                        <span class='icomoon icon-whatsapp'></span>
                                    </a>
                                </div>
                                ";
                            }
                            if($member['instagram'] != ''){
                                echo "
                                <div>
                                    <a href='$instagram' class='icon-cont d-flex justify-content-center align-items-center instagram'>
                                        <span class='icomoon icon-instagram'></span>
                                    </a>
                                </div>
                                ";
                            }
                            if($member['email'] != ''){
                                echo "
                                <div>
                                    <a href='$email' class='icon-cont d-flex justify-content-center align-items-center email'>
                                        <span class='icomoon icon-email'></span>
                                    </a>
                                </div>
                                ";
                            }
                        ?>
                        
                        
                    </div>
                </div>
            </div>
            
            <img src="<?php echo $img_src; ?>" class="fit-img" title="<?php echo $member['name_' . $lng]; ?>" alt=<?php echo $member['name_' . $lng]; ?>"" />
        </div>
    </div>
        <?php
    }

    echo '</div>';
}