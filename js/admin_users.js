$(document).ready(function(){
    
    $('.user-change').click(function(){
        var show_box = $(this).parent().parent().next('.user_change_box');
        if (show_box.css('display') == 'none'){
            $(this).text('Закрыть');
            show_box.css('display', 'flex');
        } else {
            show_box.css('display', 'none');
            $(this).text('Изменить');
        }
    });
    
    
});