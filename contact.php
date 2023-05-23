<?php
    require_once 'init.php';
    get_header();
    $plang = get_lang_file('contact');
?>
<div class="contact-page pt-5 mt-5">
    <div class="container">
        <div class="header padd mt-5 text-center">
            <p class="section-sub fw-bold mb-3 wow fadeInUp wow-once" data-wow-duration="0.4s" data-wow-delay="0.4s" data-wow-offset="150">
                <?php echo $plang->ctctus; ?>
                
            </p>
            <h1 class="fw-bold fs-2 mb-4 wow fadeInUp wow-once" data-wow-duration="0.6s" data-wow-delay="0.6s" data-wow-offset="150">
            <?php echo $plang->letsstartproj; ?>
                
            </h1>
            <p class="lead wow fadeInUp wow-once" data-wow-duration="0.8s" data-wow-delay="0.8s" data-wow-offset="150">
            <?php echo $plang->cotdesc; ?>
                
            </p>
        </div>
        <div class="contacts-cont-contact ps-4 pe-4">
            <div class="row">
                <?php
                    if( WEBSITE_SETTINGS['email'] != '' ){
?>
 <div class="col-12 col-md-4 mb-4 wow fadeInUp wow-once" data-wow-duration="0.4s" data-wow-delay="0.4s" data-wow-offset="150">
    <a href="mailto:<?php echo WEBSITE_SETTINGS['email']; ?>" class="contact-cont-href text-center d-block">
        <div class="icon-cont d-flex justify-content-center align-items-center mb-3">
            <i class="fa-solid fa-envelope"></i>
        </div>
        <p class="title fw-bold fs-5">
        <?php echo $plang->email; ?>
            
        </p>
        <p class="lead fs-6 mb-4">
        <?php echo $plang->emaild; ?>
            
        </p>

        <div class="d-flex justify-content-center align-items-center linker">
            <p class="mb-1 fw-bold"><?php echo WEBSITE_SETTINGS['email']; ?></p>
            <i class="fa-solid fa-arrow-left me-2 arrow rotate-en"></i>
        </div>
    </a>
</div>
<?php
                    }
                ?>
               
               <?php
                    if( WEBSITE_SETTINGS['phone'] != '' ){
?>

<div class="col-12 col-md-4 mb-4 wow fadeInUp wow-once" data-wow-duration="0.6s" data-wow-delay="0.6s" data-wow-offset="150">
    <a href="tel:<?php echo WEBSITE_SETTINGS['phone']; ?>" class="contact-cont-href text-center d-block">
        <div class="icon-cont d-flex justify-content-center align-items-center mb-3">
            <i class="fa-solid fa-phone"></i>
        </div>
        <p class="title fw-bold fs-5">
        <?php echo $plang->talkus; ?>
            
        </p>
        <p class="lead fs-6 mb-4">
        <?php echo $plang->talkusd; ?>
            
        </p>

        <div class="d-flex justify-content-center align-items-center linker">
            <p class="mb-1 fw-bold"><?php echo WEBSITE_SETTINGS['phone']; ?></p>
            <i class="fa-solid fa-arrow-left me-2 arrow rotate-en"></i>
        </div>
    </a>
</div>
<?php
                    }
?>
                
                <div class="col-12 col-md-4 mb-4 wow fadeInUp wow-once" data-wow-duration="0.8s" data-wow-delay="0.8s" data-wow-offset="150">
                    <a href="" class="contact-cont-href text-center d-block">
                        <div class="icon-cont d-flex justify-content-center align-items-center mb-3">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <p class="title fw-bold fs-5">
                        <?php echo $plang->visitus; ?>
                            
                        </p>
                        <p class="lead fs-6 mb-4">
                        <?php echo $plang->visusd; ?>
                           
                        </p>

                        <div class="d-flex justify-content-center align-items-center linker">
                            <p class="mb-1 fw-bold">
                            <?php echo $plang->showdir; ?>
                           </p>
                            <i class="fa-solid fa-arrow-left me-2 arrow rotate-en"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="padd contact-directly">
        <div class="container">
            <div class="head text-center mb-6">
                <p class="section-sub fw-bold mb-3 wow fadeInUp wow-once" data-wow-duration="0.4s" data-wow-delay="0.4s" data-wow-offset="150">
                <?php echo $plang->diretitl; ?>
                    
                </p>
                <h2 class="fw-bold fs-2 mb-4 wow fadeInUp wow-once" data-wow-duration="0.6s" data-wow-delay="0.6s" data-wow-offset="150">
                <?php echo $plang->diredesc; ?>
                   
                </h2>
            </div>
            <div class="row mt-5 pt-5">
                <div class="col-12 col-md-7 mb-4 wow fadeInUp wow-once" data-wow-duration="0.8s" data-wow-delay="0.8s" data-wow-offset="150">
                   <?php getContactForm(true); ?>
                </div>
                <div class="col-12 col-md-5 mb-4 wow fadeInUp wow-once" data-wow-duration="1.5s" data-wow-delay="0.8s" data-wow-offset="150">
                    <div class="img-contact-cont">
                        <img src="layout/imgs/contact.jpeg" class="fit-img" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  
<?php
    get_footer('contact');
?>