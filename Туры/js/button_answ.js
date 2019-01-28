$(document).ready(function () {
    
    $('button').click(function () {

        var answtext = $(this).parent().next('.answtext');

        if ($(answtext).css('display') == 'none') {
            $(answtext).show();
            $(this).css('background', 'url(icons_img/sort-up.png) center center / contain no-repeat');
        } else {
            $(answtext).hide();
            $(this).css('background', '');
        }
        
    });
});