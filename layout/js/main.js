$(document).ready(function(){

    var rtl = true;
    if($("html").attr("dir") == 'ltr'){
      rtl = false;
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

      if($(".swiper").length > 0){
        
        const swiper = new Swiper('.swiper', {
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
        swiper.changeLanguageDirection('rtl')
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
     
      if($(".portfolio-section").length > 0){
        var slides = document.getElementsByClassName('carousel-cell');
        var flkty = new Flickity('.flickity-slider',{
          prevNextButtons: false,
          pageDots: true,
          wrapAround:true,
          setGallerySize: true,
          contain:true,
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

});