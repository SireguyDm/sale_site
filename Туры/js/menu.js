$(document).ready(function(){
    $('#etc').click(function(){
        var etc_div = $('.nav_prochee');
        if (etc_div.css('display') == 'none') {
            etc_div.show();
        } else {
            etc_div.hide();
        }
    });
    
});