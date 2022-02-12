$(document).ready(function(){

    $('.wrapper').click(function() {
        $(".wrapper").animate({zoom: '150%'}, 2000);
        $(".wrapper").fadeOut(500,function(){
            $(".website").fadeIn(500);
         });

    });

});