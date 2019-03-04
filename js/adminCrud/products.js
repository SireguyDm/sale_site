$(document).ready(function(){
    
    var action = false;
    var add_count = 1;
    
    //Получение списка товаров
    getProduct(action, add_count);
    
    //Открытие формы
    $('#Add').click(function(){
        
        openClose('#AddModal');
    });
    
    //Закрытие формы
    $('.modal_close').click(function(){
        
        openClose('#AddModal');
    })
    
    //Действия при нажатии на плюс
    $('#plus').click(function(){
        var count = $('#addCount').val();
        if (count < 99){
            count++;
        }
        $('#addCount').val(count);
    });
    
    //Действия при нажатии на минус
    $('#minus').click(function(){
        var count = $('#addCount').val();
        if (count > 1){
            count--;
        }
        $('#addCount').val(count);
    });
    
    //Возможность ввода только цифр
    $("#addCount").keydown(function(event) {
        // Разрешаем: backspace, delete, tab и escape
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 ||
          // Разрешаем: Ctrl+A
          (event.keyCode == 65 && event.ctrlKey === true) ||
          // Разрешаем: home, end, влево, вправо
          (event.keyCode >= 35 && event.keyCode <= 39)) {
          // Ничего не делаем
          return;
        } else {
          // Запрещаем все, кроме цифр на основной клавиатуре, а так же Num-клавиатуре
          if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
            event.preventDefault();
          }
        }
    });
    
    //Действия при нажатии на кнопку Да
    $('#modal_send').click(function(){
        
        action = 'add';
        add_count = $('#addCount').val();
        
        $('.row').empty();
        getProduct(action, add_count);
        
        openClose('#AddModal');
    });
    
});

function getProduct(action, add_count){
    $.post('../php/admin_get_productlist.php', {
        action,
        add_count
    }, function (data) {
        var products = JSON.parse(data);
        
        products.forEach(function(product){
            if (product['old_cost'] == 0){
                var old_cost = '';
            } else {
                var old_cost = '<p class="product-oldcost">'+ product['old_cost'] +' руб.</p>';
            }
            $('.row').append(
            '<div class="col-lg-3 col-md-4 col-6 product-item text-center">' +
                '<a href="../controllers/admin_product_cart.php?product_id='+ product['id'] +'" class="container">' +
                    '<img src="../pics/tovar/'+ product['img'] +'/'+ product['img'] +'1.jpg" class="img-fluid"></img>' +
                '</a>'+
                '<h3>'+ product['title'] +'</h3>'+
                '<p class="product-cost">'+ product['cost'] +' руб.</p>'+
                ' '+ old_cost +' '+
            '</div>'
            );
        }); 
    });
};

function openClose(target){
    var modal = $(target);
    if (modal.css('display') == 'none' && modal.css('opacity') == '0'){
        modal.css('display', 'block');
        modal.css('opacity', '1');
    } else {
        modal.css('display', 'none');
        modal.css('opacity', '0');
    }
};