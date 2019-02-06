$(document).ready(function(){
    
    
    
    $('.basket-btn-delete').click(function(){
        
        var delete_product = $(this).parent().parent('.basket-product').data("id");
        
        $.post(
          "../controllers/add_to_basket.php",
          {
            delete_product: delete_product,
          }
        );
        location.reload();
    });
    
    $('.btn-plus').click(function(){
    
        var product_id = $(this).parent().parent().parent().parent('.basket-product').data("id");
        var all_count = $(this).parent().prev('.basket-cutom-text'); 
        var count = all_count.text();
        
        var cost = $(this).parent().parent().next('.basket-cutom-text').data("cost");
        var summ_text = $(this).parent().parent().next('.basket-cutom-text');
        
        
        if (count < 30){
            count++;
        }
        all_count.text(count);
        
        var summ = count * cost;
        summ_text.text(summ +' руб.');
        
        $.post(
          "../controllers/add_to_basket.php",
          {
            basket_summ: summ,
            basket_count: count,
            basket_id: product_id,
          }
        );
        
    });
    
    $('.btn-minus').click(function(){
        
        var product_id = $(this).parent().parent().parent().parent('.basket-product').data("id");
        var all_count = $(this).parent().prev('.basket-cutom-text');
        var count = all_count.text();
        
        var cost = $(this).parent().parent().next('.basket-cutom-text').data("cost");
        var summ_text = $(this).parent().parent().next('.basket-cutom-text');
    
        
        if (count > 1){
            count--;
        }
        all_count.text(count);
        
        var summ = count * cost;
        summ_text.text(summ +' руб.');

        $.post(
          "../controllers/add_to_basket.php",
          {
            basket_summ: summ,
            basket_count: count,
            basket_id: product_id,
          }
        );
        
    });
    
    
    
});