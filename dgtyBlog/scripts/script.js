$(document).ready(function(){

    $('.tela').click(function() {
        $(".wrapper").animate({zoom: '200%'}, 2000);
        $(".wrapper").fadeOut(500,function(){
            $(".website").fadeIn(500);
         });

    });

});