$(document).ready(function(){
    
    var sort = 'desc';
    var view_id = 'false';
    var time = false;
    var status_id = false;
    var order_id = false;
    var page = 1;
    
    getBasket(status_id, order_id, sort, view_id, time, page);
    
    $(document).on('click', '#openModal', function(){
        openClose()
        
        var order_id = $(this).parent().parent('#admin_basket').data('orderid');
        
        $('#ChangeModal').attr('data-orderid', order_id);
    });
    
    
    //Закрытие при нажатии на кнопку сохранить
    $('#save').click(function(){
    
        var status_id = $('input[name=status-radio]:checked').val();
        var order_id = $('#ChangeModal').attr('data-orderid');
        
        page = $('.active_page').data('page');
        sort = $('.sort-zag').attr('data-action');
        view_id = $('.view-zag').attr('data-statusid');
        time = $('.time-zag').attr('data-time');
    
        $('#ChangeModal').attr('data-orderid', false);
        clearContent();
        getBasket(status_id, order_id, sort, view_id, time, page);
        openClose();
    });
    
    //Закрытие формы изменения
    $(document).on('click', '.modal_close', function () {
        
        $('#ChangeModal').attr('data-orderid', false);
        openClose();
    });
    
    // Фильтр
    $('.sort-zag').click(function(){
        actionMenu('sort');
    })
    
    $('.view-zag').click(function(){
        actionMenu('view');
    })
    
     $('.time-zag').click(function(){
        actionMenu('time');
    })
    
    $('.sort-item').click(function(){
        
        var sort_select = $(this).html();
        var sort = $(this).data('action');
        
        $('.sort-select').empty();
        $('.sort-select').append(sort_select);
        $('.sort-zag').attr('data-action', sort);
        
        var view_id = $('.view-zag').attr('data-statusid');
        var time = $('.time-zag').attr('data-time');
        
        clearContent();
        
        getBasket(status_id, order_id, sort, view_id, time, page);
        
        actionMenu('sort');
    });
    
    $('.view-item').click(function(){
        
        var status_tilte = $(this).text();
        var view_id = $(this).data('statusid');
        
        if (view_id == false){
            $('#view-zag-title').text('Сортировка по статусу');
            $('.view-zag').attr('data-statusid', view_id);
        } else {
            $('#view-zag-title').text('Статус: ' + status_tilte);
            $('.view-zag').attr('data-statusid', view_id);
        }
        
        var sort = $('.sort-zag').attr('data-action');
        var time = $('.time-zag').attr('data-time');
        page = 1;
        
        clearContent();
        
        getBasket(status_id, order_id, sort, view_id, time, page);
        
        actionMenu('view');
    });
    
    $('.time-item').click(function(){

        var time_select = $(this).html();
        var time = $(this).data('time');
        
        $('.time-select').empty();
        $('.time-select').append(time_select);
        $('.time-zag').attr('data-time', time);
        
        var sort = $('.sort-zag').attr('data-action');
        var view_id = $('.view-zag').attr('data-statusid');
        page = 1;
        
        clearContent();
        
        getBasket(status_id, order_id, sort, view_id, time, page);
        
        actionMenu('time');
    });
    
    $(document).ajaxStop(function(){
        //Смена страниц при клике на страницу
        $('.pag-item').click(function(){
            page = $(this).data('page');
            var sort = $('.sort-zag').attr('data-action');
            var view_id = $('.view-zag').attr('data-statusid');
            var time = $('.time-zag').attr('data-time');
            clearContent();
            getBasket(status_id, order_id, sort, view_id, time, page);
        });
        //Смена страниц при клике на слайдер
        $('.pag_prev, .pag_next').click(function(){
            setTimeout(function() { 
                page = $('.active_page').data('page');
                var sort = $('.sort-zag').attr('data-action');
                var view_id = $('.view-zag').attr('data-statusid');
                var time = $('.time-zag').attr('data-time');
                clearContent();
                getBasket(status_id, order_id, sort, view_id, time, page);
            }, 100);
        });
    });
    
    clickAway('view');
    clickAway('sort');
    clickAway('time');
    
});

function getBasket(status_id, order_id, sort, view_id, time, page){
    
    $.post('../php/admin_get_basket.php', {
        status_id,
        order_id,
        sort,
        view_id,
        time,
        page
    }, function (data) {
        var data = JSON.parse(data);
        
        var arr_basket = data['basket_info'];
        var arr_status = data['status'];
        var pages_info = data['page'];
        
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
                    '<div class="col-4 h5">'+ product['product_summ'] +' руб.</div>' +
                '</div>'
            });
            
            if (basket[0]['all_summ'] < 5000){
                var delivery_html = ' + курьер 500 руб.';
            } else {
                var delivery_html = ' + курьер бесплатно';
            }
            
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
            
            if (user['second_name'] !== 'false'){
                var user_secondName = user['second_name'];
            } else { 
                var user_secondName = '';
            }
            
            if (user['email'] !== 'false'){
                var user_email = user['email'];
            } else { 
                var user_email = '';
            }
            
            if (user['domofon'] !== 'false'){
                var user_domofon = user['domofon'];
            } else { 
                var user_domofon = '';
            }
            
            $('.admin_zakazi').append(
                '<div class="alert '+ status_class +' mb-4" role="alert" id="admin_basket" data-orderId="'+ user['id'] +'">' +
                    '<div class="user-info">' +
                        '<h3 id="order-status">'+ user['status_title'] +'</h3>' +
                        '<h4 class="alert-heading admin_time text-center">'+ user['date_created'] +'</h4>' +
                        '<p class="text-center h4" id="user_name">'+ user['first_name'] +'<span id="user-f"> '+ user_secondName +'</span></p>' +
                        '<p class="h5 admin_basket_row mt-4">Телефон: <span>'+ user['tel'] +'</span></p>' +
                        '<p class="h5 admin_basket_row">E-mail: <span>'+ user_email +'</span></p>' +
                        '<p class="h5 admin_basket_row mt-3">Адресс: <span>'+ user['adress'] +'</span></p>' +
                        '<p class="h5 admin_basket_row">Домофон: <span>'+ user_domofon +'</span></p>' +  
                    '</div>' +
                    '<hr>' +
                    '<div class="row text-center" >' +
                        '<div class="col-4 h5">Товар</div>'+
                        '<div class="col-4 h5">Кол-во</div>' +
                        '<div class="col-4 h5">Цена</div>' +
                    '</div>' +
                    '<div class="basket_box">' + basket_html + '</div>' +
                    '<div class="row text-center" >' +
                        '<div class="h5 container-fluid text-center"> Итог: ' + basket[0]['all_summ'] +' руб. ' + delivery_html + '</div>' +
                    '</div>'+
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
        
        if (pages_info['pages_count'] > 1){
            var pages_html = '';
            var page_html = '';
            for (i = 1; i <= pages_info['pages_count']; i++){
                if (i == pages_info['currect_page']){
                    one_page = '<button class="pag-item active_page" data-page="' + i + '" id="page'+ i +'">' + i + '</button>';
                } else {
                    one_page = '<button class="pag-item" data-page="' + i + '" id="page'+ i +'">' + i + '</button>';
                }
                pages_html = pages_html + one_page;              
            }
            $('.pagination').append(
                '<div class="pagintation_box">' +
                    '<button class="pag_prev"></button>' +
                    pages_html +
                    '<button class="pag_next"></button>' +
                '</div>'
            )
        }
        
        if (arr_basket.length == 0){
            $('.admin_zakazi').append('<h3 class="text-center">Ничего не найдено ...</h3>');
        }
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

function actionMenu(target){
    if ($('.'+ target +'-menu').css('display') == 'none'){
        $('.'+ target +'-menu').css('display', 'block');
    } else {
        $('.'+ target +'-menu').css('display', 'none');
    }
    if ($('.'+ target +'-zag').children('#menu-arrow').hasClass('menu-arrow-active')){
        $('.'+ target +'-zag').children('#menu-arrow').removeClass('menu-arrow-active');
    } else{
        $('.'+ target +'-zag').children('#menu-arrow').addClass('menu-arrow-active');
    }
}

function clickAway(target){
    $(document).mouseup(function (e){ // событие клика по веб-документу
		var div = $('.'+ target); // тут указываем ID элемента
		if (!div.is(e.target) // если клик был не по нашему блоку
		    && div.has(e.target).length === 0) { // и не по его дочерним элементам
			$('.'+ target +'-menu').css('display', 'none');
            $('.'+ target +'-zag').children('#menu-arrow').removeClass('menu-arrow-active');
		}
	});
}

function clearContent(){
    $('.admin_zakazi').empty();
    $('#status-radio-box').empty();
    $('.pagination').empty();
}
