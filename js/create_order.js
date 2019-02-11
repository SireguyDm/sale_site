$(document).ready(function(){
    
    $('#order-tel').bind("change keyup input click", function() {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });
    
    $('#order').click(function(){
        
        var name = $('#order-name').val();
        var secondName = $('#order-second-name').val();
        var adress = $('#order-adress').val();
        var city = $('#order-city').val();
        var domofon = $('#order-domofon').val();
        var tel = $('#order-tel').val();
        var email = $('#order-email').val();
        
        var basket = [];
        var product = [];
        $('.basket-product').each(function(){
            var product_id = $(this).data('id');
            var product_count = $(this).children('.basket-product-item-right').children('.basket-product-count').children('.basket-cutom-text').data('count');
            
            product.push({id: product_id, count: product_count});
            basket.push(product[0]);
            product = [];
        });
        
//        $.each(basket, function(product, value){
//            console.log(value.cost);
//        });
               
        if (name && city && adress && tel.length >= 7){
            $.post(
              "../php/create_order.php",
              {
                basket,
                first_name: name,
                second_name: secondName,
                adress,
                city,
                domofon,
                tel,
                email
              }            
            )
        } else {
            
            if (!name){
                $('#order-name').parent('.basket-two-in-row-item').addClass('basket-error');
                $('#order-name').parent('.basket-two-in-row-item').addClass('error-name');
            }
            
            if (!adress){
                $('#order-adress').parent('.basket-form-adress').addClass('basket-error');
                $('#order-adress').parent('.basket-form-adress').addClass('error-adress');
            }
            
            if (!city){
                $('#order-city').parent('.basket-two-in-row-item').addClass('basket-error');
                $('#order-city').parent('.basket-two-in-row-item').addClass('error-city');
            }
            
            if (!tel){
                $('#order-tel').parent('.basket-two-in-row-item').addClass('basket-error');
                $('#order-tel').parent('.basket-two-in-row-item').addClass('error-tel');
            }
    
        }
           
    });
    
});