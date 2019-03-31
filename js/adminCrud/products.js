$(document).ready(function(){
    
    var action = false;
    var add_count = 1;
    var page = 1;
    var sort = false;
    var view = '';
    var search_text = '';
    var product_id_arr = [];
    
    //Получение списка товаров
    getProduct(action, add_count, view, sort, page, search_text, product_id_arr)
    
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
        
        clearContent();
        getProduct(action, add_count, view, sort, page, search_text, product_id_arr)
        
        openClose('#AddModal');
        action = false;
    });
    
    //Удаление выбранных элементов
    // Показать/Скрыть кнопки
    $('#delete').click(function(){
        if($('#delete-box').css('display') == 'none'){
            $('#delete-box').css('display', 'flex');
            $('#action-box').css('display', 'none');
        } else {
            $('#delete-box').css('display', 'none');
        }
        
        //Добавление кнопоки выбора всем товарам
        $('.product-item').each(function(){
            $(this).append('<button class="add_to_del"></button>');
        });
    })
    
    //Действия при клике на кнопку выбрать
    $(document).on('click', '.add_to_del', function(){
        
        //Убираем галочку
        if ($(this).hasClass('del_active')){
            $(this).removeClass('del_active');
            
            //Удаляем товар из массива
            var product_id = $(this).parent('.product-item').data('productid');
            product_id_arr.splice(product_id_arr.indexOf(product_id),1);
        //Ставим галку
        } else {
            //Добавяем товар в массив
            var product_id = $(this).parent('.product-item').data('productid');
            product_id_arr.push(product_id);
            
            $(this).addClass('del_active');
        }
        console.log(product_id_arr);
    });
    
    //Действия при нажатии на кнопку удалить выбранные
    $('#delete-selected').click(function(){
        if(product_id_arr.length !== 0){
            //Отправляем массив id товаров и значение action
            action = 'delete';

            clearContent();
            getProduct(action, add_count, view, sort, page, search_text, product_id_arr);

            action = false;
        }
        product_id_arr = [];
        $('.product-item').each(function(){
            $('.add_to_del').remove();
        });
        $('#action-box').css('display', 'flex');
        $('#delete-box').css('display', 'none');
    });
    
    //Действия при нажатии на кнопку отменить удаление
    $('#delete-cancel').click(function(){
        
        //Обнуляется массив
        product_id_arr = [];
        $('.product-item').each(function(){
            $('.add_to_del').remove();
        });
        $('#action-box').css('display', 'flex');
        $('#delete-box').css('display', 'none');
    });
    
    //Работы пагинации
    $(document).ajaxStop(function(){
        //Смена страниц при клике на страницу
        $('.pag-item').click(function(){
            page = $(this).data('page');
            clearContent();
            getProduct(action, add_count, view, sort, page, search_text, product_id_arr);
        });
        //Смена страниц при клике на слайдер
        $('.pag_prev, .pag_next').click(function(){
            setTimeout(function() { 
                page = $('.active_page').data('page');
                clearContent();
                getProduct(action, add_count, view, sort, page, search_text, product_id_arr);
            }, 100);
        });
    });
    
    // Фильтр
    //Выпадающие списки
    $('.sort-zag').click(function(){
        actionMenu('sort');
    })
    $('.view-zag').click(function(){
        actionMenu('view');
    })
    clickAway('view');
    clickAway('sort');
    
    $('.sort-item').click(function(){
        
        var sort_select = $(this).html();
        var sort = $(this).data('display');
        
        $('.sort-select').empty();
        $('.sort-select').append(sort_select);
        $('.sort-zag').attr('data-display', sort);
        
        var view = $('.view-zag').attr('data-categoryid');
        search_text = $('#search').val();
    
        clearContent();
        getProduct(action, add_count, view, sort, page, search_text, product_id_arr);
        
        actionMenu('sort');
    });
    
    $('.view-item').click(function(){
        
        var category_tilte = $(this).text();
        var view = $(this).data('categoryid');
        
        if (view == false){
            $('#view-zag-title').text('Категория');
            $('.view-zag').attr('data-categoryid', view);
        } else {
            $('#view-zag-title').text(category_tilte);
            $('.view-zag').attr('data-categoryid', view);
        }
        
        var sort = $('.sort-zag').attr('data-display');
        search_text = $('#search').val();
        page = 1;
        
        clearContent();
        
        getProduct(action, add_count, view, sort, page, search_text, product_id_arr)
        
        actionMenu('view');
    });
    
    //Живой поиск
    $("#search").keyup(function(i){
        switch(i.keyCode) {
            case 27:  // escape
            case 32:  // пробел
            case 123: // F12
            break;
                
            default:
                if ($(this).val().length > 2){
                    
                    var sort = $('.sort-zag').attr('data-display'); 
                    var view = $('.view-zag').attr('data-categoryid');
                    
                    var search_text = $(this).val().toLowerCase();
                    search_text = search_text.replace(/\s/g, '');
                    
                    clearContent();
                    getProduct(action, add_count, view, sort, page, search_text, product_id_arr);
                } else if ($(this).val().length === 0){
                    search_text = '';
                    var sort = $('.sort-zag').attr('data-display'); 
                    var view = $('.view-zag').attr('data-categoryid');
                    
                    clearContent();
                    getProduct(action, add_count, view, sort, page, search_text, product_id_arr);
                }
            break;
        }
    });   
    
    
});

function getProduct(action, add_count, view, sort, page, search_text, product_id_arr){
    $.post('../php/admin_get_productlist.php', {
        action,
        add_count,
        view,
        sort,
        page,
        search_text, 
        product_id_arr
    }, function (data) {
        var data = JSON.parse(data);
        
        var products = data['products'];
        var page_count = data['count'];
        var active_page = data['active_page'];
        var product_count = data['product_count'];
        var id_arr = data['product_id_arr'];
        
        button_del_html = '';
        if($('#delete-box').css('display') == 'flex'){
            var button_del_html = '<button class="add_to_del"></button>'
        }
        
        products.forEach(function(product){
            if (product['old_cost'] == 0){
                var old_cost = '';
            } else {
                var old_cost = '<p class="product-oldcost">'+ product['old_cost'] +' руб.</p>';
            }
            $('.row').append(
            '<div class="col-lg-3 col-md-4 col-6 product-item text-center" data-productId="'+ product['id'] +'">' +
                '<a href="../controllers/admin_product_cart.php?product_id='+ product['id'] +'" class="container">' +
                    '<img src="../pics/tovar/'+ product['img'] +'/'+ product['img'] +'1.jpg" class="img-fluid"></img>' +
                '</a>'+
                '<h3>'+ product['title'] +'</h3>'+
                '<p class="product-cost">'+ product['cost'] +' руб.</p>'+
                ' '+ old_cost +' '+
                ' '+ button_del_html +' ' +
            '</div>'
            );
        });
        
        
        if (page_count > 1){
            var pages_html = '';
            var page_html = '';
            for (i = 1; i <= page_count; i++){
                if (i == active_page){
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
        
        $('#productCount').text(product_count);
        
        if (id_arr.length > 0){
            console.log(id_arr);
            
            id_arr.forEach(function(id){
                $('[data-productid='+ id +']').children('.add_to_del').addClass('del_active');
            })
        }
    });
    
};

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

function clearContent(){
    $('.row').empty();
    $('.pagination').empty();
}