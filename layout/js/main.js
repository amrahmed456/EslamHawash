$(document).ready(function(){

    $(".dup-hover-effect").each(function(){
        let text = $(this).text();
        $(this).html(`
            <span>${text}</span>
            <span>${text}</span>
        `);
    });

});