$(function(){


    

    var len=$('.child_menu').length;

    for (var i = 0; i < len; i++) {
        $('.child_menu').eq(i).click(function(){
            $(this).next('ul').slideToggle();
        })
    };


})