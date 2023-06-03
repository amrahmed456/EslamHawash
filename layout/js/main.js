$(document).ready(function(){
  
    var rtl = true;
    if($("html").attr("dir") == 'ltr'){
      rtl = false;
    } 

    if($(".website-intro").length > 0){
      let inter = setInterval(function(){
        if($("#preloader").hasClass("hide")){
          runIntro();
          clearInterval(inter);
        }
      },300);  
    }

    function timerFramer(obj,delay){
      setTimeout(function(){
        obj.removeClass("hidden");
        obj.addClass("run");
      },delay);
    }

    function runIntro(){
      $(".framer:nth-child(1)").removeClass("hidden").addClass("run");
      var waitFor = 4500;
      $(".framer.hidden").each(function(){
          timerFramer($(this),waitFor);
          waitFor += waitFor;
      });

      setTimeout(function(){
        $(".website-intro").removeClass("d-flex").fadeOut();
      },waitFor+waitFor/2);
    }

    
    if(! /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      const $bigBall = document.querySelector('.cursor__ball--big');
      const $smallBall = document.querySelector('.cursor__ball--small');
      const $hoverables = $("a,button,[role='button'],[type='button']");
  
  // Listeners
  document.body.addEventListener('mousemove', onMouseMove);
  for (let i = 0; i < $hoverables.length; i++) {
    $hoverables[i].addEventListener('mouseenter', onMouseHover);
    $hoverables[i].addEventListener('mouseleave', onMouseHoverOut);
  }
  
  // Move the cursor
  function onMouseMove(e) {
    TweenMax.to($bigBall, .4, {
      x: e.clientX - 15,
      y: e.clientY - 15 });
     /*  console.log("X: "+e.pageX);
      console.log("Y" + e.pageY); */
    TweenMax.to($smallBall, .01, {
      x: e.clientX - 5,
      y: e.clientY - 7 });
  
  }
  
  // Hover an element
  function onMouseHover() {
    TweenMax.to($bigBall, .3, {
      scale: 4 });
  
  }
  function onMouseHoverOut() {
    TweenMax.to($bigBall, .3, {
      scale: 1 });
  
  }
     }else{
      $(".cursor").remove();
     }

   

    $(".dup-hover-effect").each(function(){
        let text = $(this).text();
        $(this).html(`
            <span>${text}</span>
            <span>${text}</span>
        `);
    });

    // flipping text

      if($("#flipper").length > 0){
        var Flip;
  
        Flip = class Flip {
          constructor(el) {
            this.el = el;
            this.el = $(this.el);
            this.currentStep = 0;
          }
      
          next(event) {
            var currentStepEl, nextStepEl, nextStepNum;
            if (event) {
              event.preventDefault();
            }
            nextStepNum = this.currentStep + 1;
            currentStepEl = this.el.find(`.step${this.currentStep}`);
            nextStepEl = this.el.find(`.step${nextStepNum}`);
            if (nextStepEl.length) {
              currentStepEl.prev().removeClass('down');
              currentStepEl.removeClass('set');
              currentStepEl.addClass('down');
              nextStepEl.addClass('set');
              nextStepEl.removeClass('down');
              nextStepEl.next().removeClass('down');
              return this.currentStep++;
            } else {
              // reset to 0
              this.el.find(".step").removeClass('set');
              this.el.find(`.step${this.currentStep}`).addClass('down');
              this.el.find(".step").not(`.step${this.currentStep}`).removeClass('down');
              this.currentStep = -1;
              return this.next();
            }
          }};
          
          $(function () {
            var f;
            f = new Flip(document.getElementById('flipper'));
            return setInterval(function () {
              return f.next();
            }, 2000);
          });
      }
       



      // open side bar
      $(".mobile-navigation-opener").on("click" , function(){
        if($(this).hasClass("is-active")){
          // close
          $(this).removeClass("is-active");
          $("#mobile-sidebar").removeClass("active");
          $("#mobile-sidebar .main-navigations a").removeClass("active");
        }else{
          // open
          $(this).addClass("is-active");
          $("#mobile-sidebar").addClass("active");
          let timer = 70;
          $("#mobile-sidebar .main-navigations a").each(function(){
            openASideBar($(this),timer);
            timer += 70;
          })
        }
      });

      function openASideBar(obj, timer){
        setTimeout(function(){
          obj.addClass("active");
        }, timer);
      }

      if($(".homeSwiper").length > 0){
        
        const swiper = new Swiper('.homeSwiper', {
          // Optional parameters
          direction: 'vertical',
          // If we need pagination
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          mousewheel: true,
          autoHeight:true,
          speed: 700,
          effect:'coverflow'
        
        });
        if(rtl){
          swiper.changeLanguageDirection('rtl')
        }
        
      }
     
      if($(".slider-animated").length > 0){
        $(".slider-bottom").infiniteslide({
          speed:20,
          pauseonhover: false,
          direction: 'down'
        });
        $(".slider-to-right").infiniteslide({
          speed:25,
          pauseonhover: false,
          direction: 'up'
        });
      }
      if($(".run-sliders-services").length > 0){
        $(".slider-to-right").infiniteslide({
          speed:40,
          pauseonhover: false,
          direction: 'right'
        });
        $(".slider-to-left").infiniteslide({
          speed:55,
          pauseonhover: false,
          direction: 'left'
        });
      }
     
      if($(".portfolio-section").length > 0){
        var slides = document.getElementsByClassName('carousel-cell');
        var flkty = new Flickity('.flickity-slider',{
          prevNextButtons: false,
          pageDots: true,
          wrapAround:true,
          setGallerySize: true,
          contain:true,
          autoPlay: 3500,
          pauseAutoPlayOnHover: false,
          rightToLeft:rtl
        });
        flkty.on('scroll', function () {
          flkty.slides.forEach(function (slide, i) {
            var mul = ( rtl ) ? 1/3 : -1/3;
            var image = slides[i].querySelector(".overlay");
            var x = (slide.target + flkty.x) * mul;
            image.style.backgroundPosition = x + 'px';
          });
        });

        $('.flickty-nav-slider').flickity({
          asNavFor: '.flickity-slider',
          prevNextButtons: false,
          pageDots: false,
          contain:true,
          rightToLeft:rtl
        });

      }

      $(".go-to-swipper").on("click" , function(e){
        e.preventDefault();
        let child = $(this).attr("data-child");
        $(".swiper-pagination-bullet:nth-child("+child+")").click();
      });


       // for contact form
    $("select[name='select-method']").on("change" , function(){
        let selected = $("select[name='select-method'] option:selected").attr("data-v");
        $("input[name='contact']").attr('placeholder',`${selected}`);
    });

    if($(".MainCategoiresSlider").length > 0){
      var swiper = new Swiper(".MainCategoiresSlider", {
        slidesPerView: "auto",
        freeMode: false,
        centeredSlides:true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        }
      });
      if(rtl){
        swiper.changeLanguageDirection('rtl')
      }
    }

    if($(".imgs-cont-slider").length > 0){
      var swiper = new Swiper(".imgs-cont-slider", {
        spaceBetween: 0,
        centeredSlides: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        }
      });
    }

    if($(".project-slider").length > 0){
      var swiper = new Swiper(".project-slider", {
        spaceBetween: 0,
        loop:true,
        effect:'fade',
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        }
      });
    }

    if($(".project-videos-slider").length > 0){
      var swiperv = new Swiper(".project-videos-slider", {
        slidesPerView: "auto",
        freeMode: true,
        spaceBetween: 10,
      });
      if(rtl){
        swiperv.changeLanguageDirection('rtl')
      }
    }
    if($(".services-slider").length > 0){
      var swiperv = new Swiper(".services-slider", {
        slidesPerView: "auto",
        freeMode: true,
        spaceBetween: 18,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        }
      });
      if(rtl){
        swiperv.changeLanguageDirection('rtl')
      }
    }
    if($(".other-projects-slider").length > 0){
      var swiperv = new Swiper(".other-projects-slider", {
        slidesPerView: "auto",
        freeMode: true,
        spaceBetween: 20,
        loop:false,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
      });
      if(rtl){
        swiperv.changeLanguageDirection('rtl')
      }
    }
    if($(".project-panoramas-slider").length > 0){
      var swiperv = new Swiper(".project-panoramas-slider", {
        slidesPerView: "auto",
        freeMode: true,
        spaceBetween: 10,
      });
      if(rtl){
        swiperv.changeLanguageDirection('rtl')
      }
    }
 
    if($(".calcHeightForParent").length > 0){
      $(".calcHeightForParent").each(function(){
        let height = $(this).outerHeight();
        $(this).parent().css({
          "height": height + "px"
        })
      });
    }

    if($(".js-video-button").length > 0){
      $(".js-video-button").modalVideo();
    }
   

    if($(".collection-panoramas-sources").length > 0){
      $(".collection-panoramas-sources span").each(function(){
        let src = $(this).attr("data-panorama");
        let id = $(this).attr("data-id");
        var panorama = new PANOLENS.ImagePanorama( src );
        var viewer = new PANOLENS.Viewer( {
          container: document.querySelector(id)
        });
        viewer.add( panorama );
      });
     
    }
   // for share this
   if($(".share_link").length > 0){
    $("body").append(`
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=63a18012b92caa0012f80f1d&product=sop' async='async'></script>
    `);
}
  $(".share_link").on("click" , function(){
      $("[data-network='sharethis']").click();
  });

  var c = 0;
    $("body").on("click", "[data-network='sharethis']" , function(e){
        if(c != 0){
            e.preventDefault();
            return;
        }else{
            c = 1;
            setTimeout(function(){
                c = 0;
            },1000);
        }
    });



    // navbar scrollup/down event
    var lastScrollTop = 0;
    $(window).scroll(function(event){
     
        var st = $(this).scrollTop();
        if (st < lastScrollTop){
            // scrolling up
            if(st < 100){
                $(".sticked-when-scrolled").removeClass("active");
            }
        }else{
            // scrolling down
            if(st > 70){
                $(".sticked-when-scrolled").addClass("active");
            }
			if(st < 50){
				if($(".wow").length > 0){
					$('.wow').each(function(){
						if($(this).hasClass("wow-once")){
							$(this).removeClass('wow');
							$(this).removeAttr('style');
						}
					});
						new WOW().init();
				}
				
			}
            
        }
        lastScrollTop = st;
	});

  // send feedback
  
$("#send_feedback").on("click" , function(){

  let feedback = $("textarea[name='feedback']").val().trim();
  let slug = $(this).attr("data-slug");

  if( feedback.length > 1 ){
      $.ajax({
          url: "admin/form_handler.php",
          method:"POST",
          dataType: "text",
          data:{'form_action':'send_feedback','feedback':feedback,'port_slug':slug,'ajax_request':'ajax'},
          success:function(txt){

              if( txt == 'success' ){
                  show_success_message('feedback_form','success');
              }else if( txt == 'duplicate' ){
                  show_success_message('feedback_form_duplicate' , 'question');
              }
              $(".btn-close").click();
          }
      })
  }

});

function show_success_message(template,status){

  let tem = {
      
      'contact_form': {
          'en': {
              'title':'Message Sent!',
              'mssg': 'Your message is sent successfully, Thank you'
          },
          'ar': {
              'title':'تم الإرسال',
              'mssg': 'لقد تلقينا رسالتك بنجاح, شكراً لتواصلك معنا سنقوم بالرد فى أقرب وقت ممكن'
          }
          
      },
      'feedback_form' : {
          'en' : {
              'title': 'Thank you!',
              'mssg': 'Your feedback has been sent successfully, we appreciate your time'
          },
          'ar': {
              'title': 'شكراً لك',
              'mssg': 'لقد تلقينا تعليقك بنجاح، نشكرك على وقتك'
          }
      },
      'feedback_form_duplicate' : {
          'en' : {
              'title': 'Duplication ?',
              'mssg': 'you already submitted this feedback before'
          },
          'ar': {
              'title': 'تم الإرسال بالفعل',
              'mssg': 'لقد تلقينا هذه الرسالة من قبل شكراً لك'
          }
      }
  }
  let lang = ( rtl ) ? 'ar' : 'en';
  Swal.fire(
      tem[template][lang].title,
      tem[template][lang].mssg,
      status
  )
  
}


// for project page
$(".love").on("click" , function(){

  let status = '';
  let count = parseFloat($(".love-title-counter").text().trim());
  if( $(this).hasClass("loved") ){
      status = 'dislike';
  }else{
      status = 'like';
  }
  if( status == 'dislike' ){
      $(this).removeClass("loved");
  }else{
      $(this).addClass("loved");
  }
  
  let new_count = ( status == 'like' ) ? count+1 : count-1;
  $(".love-title-counter").text(new_count);
  let slug = $(this).attr("data-slug");

  $.ajax({
      url: "admin/form_handler.php",
      method:"POST",
      dataType: "text",
      data:{'form_action':'love_btn','status':status,'like':new_count,'port_slug':slug,'ajax_request':'ajax'},
      success:function(txt){

          if( txt == 'success' ){
              show_success_message('feedback_form','success');
          }else if( txt == 'duplicate' ){
              show_success_message('feedback_form_duplicate' , 'question');
          }
          $(".btn-close").click();
      }
  })

});


$("form#contact-form").on("submit" , function(e){
  e.preventDefault();
  $("form#contact-form button[type='submit']").attr("disabled" , true).text('Sending...');
  let name = $("#contact-form input[name='name']").val().trim();
  let method = $("#contact-form select[name='select-method'] option:selected").val().trim();
  let contact = $("#contact-form input[name='contact']").val().trim();
  let mssg = $("#contact-form textarea[name='open']").val().trim();

  $.ajax({
      url: "admin/form_handler.php",
      method:"POST",
      dataType: "text",
      data:{'form_action':'insert_mssg_form','name':name,'method':method,'contact':contact,'mssg':mssg,'ajax_request':'ajax'},
      success:function(txt){
          
          if( txt == 'success' ){
              show_success_message('contact_form','success');
          }
          $("form#contact-form button[type='submit']").text('Thank you');
          $("form#contact-form input,form#contact-form select").val("");
      }
  });

});

  $("body").on("mouseover",".make-cursor-on-top,.swal2-container", function(){
    $(".cursor").addClass("make-top");
  });

  $("body").on("mouseout",".make-cursor-on-top,.swal2-container", function(){
    $(".cursor").removeClass("make-top");
  });

});
