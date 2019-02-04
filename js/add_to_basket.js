$(document).ready(function(){
    
    $('#add_article').click(function(){
        var basket_product_id = $('#data-id').attr('data-id');
        
        $.post(
          "../controllers/add_to_basket.php",
          {
            basket_product_id: basket_product_id,
          }
        );
        
        
    });
    
});