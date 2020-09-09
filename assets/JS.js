$(function(){
   
    $(window).scroll(function () { 
        if($('body').scrollTop()>100){
            $('.croll').addClass('hien-thi-croll');
        }
        else{
            $('.croll').removeClass('hien-thi-croll');
        }
    });
    $('.croll').click(function () { 
        $('body').animation({scrollTop: 0});
    });

});