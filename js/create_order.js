$(document).ready(function(){
    
    $('#order-tel').mask("+7 (999) 999-99-99");
    
    $('#order').click(function(){
        
        $('#order-name').val() !== '' ? name = $('#order-name').val() : name = false;
        $('#order-second-name').val() !== '' ? secondName = $('#order-second-name').val() : secondName = false;
        $('#order-adress').val() !== '' ? adress = $('#order-adress').val() : adress = false;
        $('#order-city').val() !== '' ? city = $('#order-city').val() : city = false;
        $('#order-domofon').val() !== '' ? domofon = $('#order-domofon').val() : domofon = false;
        $('#order-email').val() !== '' ? email = $('#order-email').val() : email = false;
        $('#order-tel').val() !== '' ? tel = $('#order-tel').val() : tel = false;
        $('#itog_summ').data('itog') !== '' ? itog = $('#itog_summ').data('itog') : itog = false;

        if (tel != false){
            tel = tel.replace(/\s+/g, '');
            tel = tel.replace(/-/g, '');
            tel = tel.replace('+', '');
            tel = tel.replace(')', '');
            tel = tel.replace('(', '');
        }
        
        var basket = [];
        var product = [];
        
        $('.basket-product').each(function(){
            var product_id = $(this).data('id');
            var product_count = $(this).children('.basket-product-item-right').children('.basket-product-count').children('.basket-cutom-text').data('count');
            
            product.push({id: product_id, count: product_count});
            basket.push(product[0]);
            product = [];
        });  
        
        if (name != 'false' && tel != false && adress != false && city != false){
            createOrder(name, secondName, adress, city, domofon, email, tel, basket, itog);
        } else {
            
            if (name === 'false'){
                $('#order-name').parent('.basket-two-in-row-item').addClass('basket-error');
                $('#order-name').parent('.basket-two-in-row-item').addClass('error-name');
                focusToForm();
                
            } else {
                $('#order-name').parent('.basket-two-in-row-item').removeClass('basket-error');
                $('#order-name').parent('.basket-two-in-row-item').removeClass('error-name');
            }

            if (adress == false){
                $('#order-adress').parent('.basket-form-adress').addClass('basket-error');
                $('#order-adress').parent('.basket-form-adress').addClass('error-adress');
                focusToForm();
                
            } else {
                $('#order-adress').parent('.basket-form-adress').removeClass('basket-error');
                $('#order-adress').parent('.basket-form-adress').removeClass('error-adress');
            }

            if (city == false){
                $('#order-city').parent('.basket-two-in-row-item').addClass('basket-error');
                $('#order-city').parent('.basket-two-in-row-item').addClass('error-city');
                focusToForm();
                
            } else {
                $('#order-city').parent('.basket-two-in-row-item').removeClass('basket-error');
                $('#order-city').parent('.basket-two-in-row-item').removeClass('error-city');
            }

            if (tel == false){
                $('#order-tel').parent('.basket-two-in-row-item').addClass('basket-error');
                $('#order-tel').parent('.basket-two-in-row-item').addClass('error-tel');
                focusToForm();
                
            } else {
                $('#order-tel').parent('.basket-two-in-row-item').removeClass('basket-error');
                $('#order-tel').parent('.basket-two-in-row-item').removeClass('error-tel');
            }
        }
        
    
    });
    
});

function createOrder(name, secondName, adress, city, domofon, email, tel, basket, itog){
    $.post('../php/create_order.php', {
        name,
        secondName,
        adress,
        city,
        domofon,
        email,
        tel,
        basket,
        itog
    }, function (data) {
        var answer = JSON.parse(data);
        
        $('#order').text(answer);
    });
};

//Фокус на input
function focusToForm(){
    $('html body').animate({
        scrollTop: $('#form-zag').offset().top
    }, 200);
}