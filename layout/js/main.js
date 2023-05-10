$(document).ready(function(){

    $(".dup-hover-effect").each(function(){
        let text = $(this).text();
        $(this).html(`
            <span>${text}</span>
            <span>${text}</span>
        `);
    });

    // flipping text
    $(function () {
        var Flip;
      
        Flip = class Flip {
          constructor(el) {
            this.el = el;
            this.el = $(this.el);
            this.currentStep = 0;
            $('.next').on('click', $.proxy(this.next, this));
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
      
      });

});