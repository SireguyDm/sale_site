$(document).ready(function(){
    
    $('#add_article').click(function(){
        var product_id = $('#data-id').attr('data-id');
        
        $.post(
          "../php/add_to_basket.php",
          {
            product_id
          }
        );
   
    });
    
});