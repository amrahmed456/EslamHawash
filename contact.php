<?php
    require_once 'init.php';
    get_header();
?>
<div class="contact-page pt-5 mt-5">
    <div class="container">
        <div class="header padd mt-5 text-center">
            <p class="section-sub fw-bold mb-3 wow fadeInUp wow-once" data-wow-duration="0.4s" data-wow-delay="0.4s" data-wow-offset="150">
                تواصل معنا
            </p>
            <h1 class="fw-bold fs-2 mb-4 wow fadeInUp wow-once" data-wow-duration="0.6s" data-wow-delay="0.6s" data-wow-offset="150">
                لنبدأ مشروعك الأن
            </h1>
            <p class="lead wow fadeInUp wow-once" data-wow-duration="0.8s" data-wow-delay="0.8s" data-wow-offset="150">
                سعداء بتقديم جميع خدماتنا لتلبية وتنفيذ مشروعك بأفضل جودة وأقل أسعار تتناسب مع ذوقك ومساحتك بخبراتنا الواسعه وفريقنا المحترف يمكنك الإعتماد علينا لتنفيذ مشروعك
            </p>
        </div>
        <div class="contacts-cont-contact ps-4 pe-4">
            <div class="row">
                <div class="col-12 col-md-4 mb-4 wow fadeInUp wow-once" data-wow-duration="0.4s" data-wow-delay="0.4s" data-wow-offset="150">
                    <a href="" class="contact-cont-href text-center d-block">
                        <div class="icon-cont d-flex justify-content-center align-items-center mb-3">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <p class="title fw-bold fs-5">
                            البريد الإلكتروني
                        </p>
                        <p class="lead fs-6 mb-4">
                            راسلنا عبر البريد الإلكتروني وسنقوم بالرد فى أقرب وقت ممكن
                        </p>

                        <div class="d-flex justify-content-center align-items-center linker">
                            <p class="mb-1 fw-bold">mr_amr456@yahoo.com</p>
                            <i class="fa-solid fa-arrow-left me-2 arrow"></i>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-4 mb-4 wow fadeInUp wow-once" data-wow-duration="0.6s" data-wow-delay="0.6s" data-wow-offset="150">
                    <a href="" class="contact-cont-href text-center d-block">
                        <div class="icon-cont d-flex justify-content-center align-items-center mb-3">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <p class="title fw-bold fs-5">
                            تحدث معنا الأن
                        </p>
                        <p class="lead fs-6 mb-4">
                            سعداء بتلقى مكالمتك فى أى وقت ومستعدون للإجابة على أسئلتك
                        </p>

                        <div class="d-flex justify-content-center align-items-center linker">
                            <p class="mb-1 fw-bold">(+20)10-33-677-906</p>
                            <i class="fa-solid fa-arrow-left me-2 arrow"></i>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-4 mb-4 wow fadeInUp wow-once" data-wow-duration="0.8s" data-wow-delay="0.8s" data-wow-offset="150">
                    <a href="" class="contact-cont-href text-center d-block">
                        <div class="icon-cont d-flex justify-content-center align-items-center mb-3">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <p class="title fw-bold fs-5">
                            زر مكتبنا
                        </p>
                        <p class="lead fs-6 mb-4">
                            يمكنك زيارة مكتبنا من السبت إلى الخميس من الساعه 8 صباحاً وحتى 8 مساءاً
                        </p>

                        <div class="d-flex justify-content-center align-items-center linker">
                            <p class="mb-1 fw-bold">عرض الموقع</p>
                            <i class="fa-solid fa-arrow-left me-2 arrow"></i>
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
                    أرسل لنا
                </p>
                <h2 class="fw-bold fs-2 mb-4 wow fadeInUp wow-once" data-wow-duration="0.6s" data-wow-delay="0.6s" data-wow-offset="150">
                    تواصل معنا بشكل مباشر
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