$(document).ready(function(){
    
    var status_id = false;
    var order_id = false;
    getBasket(status_id, order_id);
    
    $(document).on('click', '#openModal', function(){
        openClose()
        
        var order_id = $(this).parent().parent('#admin_basket').data('orderid');
        $('#ChangeModal').attr('data-orderid', order_id);
    });
    
    //Закрытие при нажатии на кнопку сохранить
    $(document).on('click', '#save', function () {
        
        var status_id = $('input[name=status-radio]:checked').val();
        var order_id = $('#ChangeModal').data('orderid');
        
        $('#ChangeModal').attr('data-orderid', false);
        
        $('.admin_zakazi').empty();
        $('#status-radio-box').empty();
        
        getBasket(status_id, order_id);
        openClose();
    });
    
    //Закрытие формы изменения
    $(document).on('click', '.modal_close', function () {
        
        $('#ChangeModal').attr('data-orderid', false);
        openClose();
    });
    
});

function getBasket(status_id, order_id){
    
    $.post('../php/admin_get_basket.php', {
        status_id,
        order_id
    }, function (data) {
        var data = JSON.parse(data);
        
        var arr_basket = data['basket_info'];
        var arr_status = data['status'];
    
        arr_basket.forEach(function(item){
            
            var user = item['info'];
            var basket = item['basket'];
            
            var basket_html = '';
            var status_html = '';
            basket.forEach(function(product){
                basket_html += 
                '<div class="row text-center admin_basket_item mt-2 mb-2">' +
                    '<div class="col-4 h5">'+ product['product_title'] +'</div>' +
                    '<div class="col-4 h5">'+ product['product_count'] +'</div>' +
                    '<div class="col-4 h5">'+ product['product_cost'] +' руб.</div>' +
                '</div>'
            });
            
            if (user['status_title'] === 'Ожидает'){
                var status_class = 'alert-success';
            } else if (user['status_title'] === 'В пути'){
                var status_class = 'alert-warning';
            } else if (user['status_title'] === 'Доставлен'){
                var status_class = 'alert-dark';
            } else if (user['status_title'] === 'Отмена' || user['status_title'] === 'Потерян'){
                var status_class = 'alert-danger';
            } else {
                var status_class = 'alert-primary';
            }
            
            $('.admin_zakazi').append(
                '<div class="alert '+ status_class +' mb-4" role="alert" id="admin_basket" data-orderId="'+ user['id'] +'">' +
                    '<div class="user-info">' +
                        '<h3 id="order-status">'+ user['status_title'] +'</h3>' +
                        '<h4 class="alert-heading admin_time text-center">29.01.2019: 22:40</h4>' +
                        '<p class="text-center h4" id="user_name">'+ user['first_name'] +'<span id="user-f"> '+ user['second_name'] +'</span></p>' +
                        '<p class="h5 admin_basket_row mt-4">Телефон: <span>'+ user['tel'] +'</span></p>' +
                        '<p class="h5 admin_basket_row">E-mail: <span>'+ user['email'] +'</span></p>' +
                        '<p class="h5 admin_basket_row mt-3">Адресс: <span>'+ user['adress'] +'</span></p>' +
                        '<p class="h5 admin_basket_row">Домофон: <span>'+ user['domofon'] +'</span></p>' +  
                    '</div>' +
                    '<hr>' +
                    '<div class="row text-center" >' +
                        '<div class="col-4 h5">Товар</div>'+
                        '<div class="col-4 h5">Кол-во</div>' +
                        '<div class="col-4 h5">Цена</div>' +
                    '</div>' +
                    '<div class="basket_box">' + basket_html + '</div>' +
                    '<div class="text-center mt-4 order_status" >' +
                        '<p>Изменить статус: </p>' +
                        '<button id="openModal">Изменить</button>' +
                    '</div>' +
                '</div>'
            )
        });
        
        arr_status.forEach(function(status){
            $('#status-radio-box').append(
                '<div class="form-check">' +
                    '<input class="form-check-input" type="radio" name="status-radio" id="gridRadios1" value="'+ status['id'] +'" checked>' +
                    '<label class="form-check-label" for="gridRadios1">'+ status['status_title'] +'</label>' +
                '</div>'
            )
        });
        
    });
    // Конец запроса
};

function openClose(){
    var modal = $('#ChangeModal');
    if (modal.css('display') == 'none' && modal.css('opacity') == '0'){
        modal.css('display', 'block');
        modal.css('opacity', '1');
    } else {
        modal.css('display', 'none');
        modal.css('opacity', '0');
    }
}


