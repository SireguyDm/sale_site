$(document).ready(function(){
    
    var photo = '';
    $('.article-btn-active').click(function(){
        photo = $(this).attr('src');
        $('.article-main-photo').attr('src', photo);
    });
    
    hideThis('#color');
    hideThis('#size');
    hideThis('#material');
    hideThis('#country');
    
    $('#add_article').click(function(){
        $('.succes-window').css('display', 'flex');
        $('.succes-window').animate({
            opacity: '1'
        },500);
        $('.succes-window').animate({
            opacity: '0'
        },700);
        setTimeout(function(){
            $('.succes-window').css('display', 'none');
        }, 1000);
    });
    
});

function hideThis($target){
    if ($($target).text() === ''){
        $($target).parent().css('display', 'none');
    }
}