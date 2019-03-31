$(document).ready(function(){
    
    $('#add_article').click(function(){
        var product_id = $('#data-id').attr('data-id');
        
        $.post("../php/add_to_basket.php", {
            product_id
        }, function (data) {
            var cookie = getCookie('basket_count');
            if ($('#basket_count').length > 0 && cookie > 0){
                $('#basket_count').text(cookie);
            } else {
                $('.bag-item').append('<span id="basket_count">'+ cookie +'</span>')
            }

            console.log(cookie);
        });
    });
    
});

function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}