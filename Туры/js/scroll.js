$(document).ready(function () {
    
    var start_coord = window.innerHeight;
    
    $('#arrow-up').css('display', 'none');
    
    $(window).scroll(function(){
        var animation_target = $(this).scrollTop();
//        console.log(animation_target);
        if (animation_target > start_coord){
    
            $('#arrow-up').fadeIn(500);
            
        } else {
            $('#arrow-up').fadeOut(200);
        }
               
    });
    
    $('#arrow-up').click(function () {
        $('body').animate({
            scrollTop: 1
        }, 1000);
        
    });
    
    
});
