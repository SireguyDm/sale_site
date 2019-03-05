$(document).ready(function(){
    
    var product_id = false;
    var count = false;
    var action = false;
    
    getProduct(product_id, count, action);
    
    // Действия при нажатии на кнопку плюс
    $(document).on('click', '.btn-plus', function () {
        
        //Изменение счетчика
        var counter = $(this).parent().prev('.basket-cutom-text');
        var count = counter.text();
        count = parseInt(count);
        if (count < 15){
            count += 1;
        }
        counter.text(count);
        
        //Блокировка кнопок на время
        LockBut('.btn-plus', '.btn-minus');
        
        var product_id = $(this).parent().parent().parent().parent('.basket-product').data('id');
        
        var action = 'change';
        $('.products-list').empty();
        getProduct(product_id, count, action);
    });
    
    // Действия при нажатии на кнопку минус
    $(document).on('click', '.btn-minus', function () {
        
        //Изменение счетчика
        var counter = $(this).parent().prev('.basket-cutom-text');
        var count = counter.text();
        count = parseInt(count);
        if (count > 1){
            count -= 1;
        }
        counter.text(count);
        
        //Блокировка кнопок на время
        LockBut('.btn-plus', '.btn-minus');
        
        var product_id = $(this).parent().parent().parent().parent('.basket-product').data('id');
        
        var action = 'change';
        $('.products-list').empty();
        getProduct(product_id, count, action);
    });
    
    // Действия при нажатии на кнопку удалить
    $(document).on('click', '.basket-btn-delete', function () {
        
        var product_id = $(this).parent().parent('.basket-product').data('id');
        
        var action = 'delete';
        $('.products-list').empty();
        getProduct(product_id, count, action);
    });
    
});

function getProduct(product_id, count, action){
    $.post('../php/get_basket_products.php', {
        product_id,
        count,
        action
    }, function (data) {
        var products = JSON.parse(data);
        
        //Перенаправление, если товара нет
        if (products.length == 0){
            window.location = "../controllers/empty_basket.php";
        }
        
        var summ = 0;
        
        products.forEach(function(product){
            $('.products-list').append(
            '<div class="basket-product" data-id="'+ product[0]['id'] +'">' +
                '<div class="basket-product-item-left">' +
                    '<div class="basket-product-img-div">' +
                        '<img src="../pics/tovar/'+ product[0]['img'] +'/'+ product[0]['img'] +'1.jpg">' +
                    '</div>' +
                    '<div class="basket-product-description">' +
                        '<p class="basket-product-name">'+ product[0]['title'] +'</p>' +
                        '<p class="basket-product-article">'+ product['category'] +'</p>' +
                    '</div>' +
                '</div>' +
                '<div class="basket-product-item-right">' +
                    '<div class="basket-product-count">' +
                        '<p class="basket-cutom-text">'+ product['count'] +'</p>' +
                        '<div class="basket-product-btns">' +
                            '<button class="btn-plus">+</button>' +
                            '<button class="btn-minus">-</button>' +
                        '</div>' +
                    '</div>' +
                    '<p class="basket-cutom-text basket_p_cost">'+ product['all_cost'] +' руб.</p>' +
                    '<button class="basket-btn-delete">&#10006;</button>' +
                '</div>' +
            '</div>'
            );
            
            //Вывод итоговой суммы
            var cost = product['all_cost'];
            cost = parseInt(cost);
            summ += cost;
            $('#basket-itogsumm').text(summ + ' руб.');
            $('#products_summ').text(summ + ' руб.');
            $('#products_summ').attr('data-summ', summ);
            
            var delivery = $('#form_delivery').data('delivery');
            summ += delivery;
            $('#itog_summ').text(summ + ' руб.');
            
            
        }); 
        
    });
};

function LockBut(object_1, object_2){
        var LockInterval = setInterval(function(){
           $(object_1).css('pointer-events', 'none');
           $(object_2).css('pointer-events', 'none');
        });
        
        setTimeout (function(){
            $(object_1).css('pointer-events', 'painted');
            $(object_2).css('pointer-events', 'painted');
           clearInterval(LockInterval);
        }, 500);
};
