$(document).ready(function(){
   
    var width = $('.slider div').css('width');
    width = parseInt(width);
    i = 1;
    $('.slider').css('margin-left', -width);
    
    $('.next').click(function(){
        var margin = $(this).prev('.slider').css('margin-left');
        margin = parseInt(margin);
        
        if (margin == -width * 4) {
            $(this).prev('.slider').css('margin-left', -width);
            margin = -width * 2;
        } else {
            margin = margin - width;
        }
        
        LockBut(this, '.prev');
        
        $(this).prev('.slider').animate({marginLeft: margin}, 1000);
    });
    
    $('.prev').click(function() {
        var margin = $(this).prev().prev('.slider').css('margin-left');
        margin = parseInt(margin);
        if (margin == 0) {
            $(this).prev().prev('.slider').css('margin-left', -width * 3);
            margin = -width * 2;
        } else {
            margin = margin + width;
        }
        LockBut(this, '.next');
        
        $(this).prev().prev('.slider').animate({marginLeft: margin}, 1000);
    });
    function LockBut(object_1, object_2){
        var LockInterval = setInterval(function(){
           $(object_1).css('pointer-events', 'none');
           $(object_2).css('pointer-events', 'none');
        });
        
        setTimeout (function(){
            $(object_1).css('pointer-events', 'painted');
            $(object_2).css('pointer-events', 'painted');
           clearInterval(LockInterval);
        }, 1000);
    }
});
