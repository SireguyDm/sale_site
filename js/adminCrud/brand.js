$(document).ready(function(){
    
    var brand_id = false;
    var brand_title = false;
    var action = false;
    var category_id = false;
    var page = 1;
    
    //Получение всех Брендов
    getBrands(brand_id, brand_title, category_id, action, page);
    
    //Действие при нажатии на кнопку Изменить
    $(document).on('click', '.change', function () {
        
        openClose('#ChangeModal');
        
        var category_title = $(this).attr('data-categorytitle');
        var id = $(this).data('id');
        var title = $(this).parent().parent().prev('#brand_title').text();
        
        $('#CategoryMenu').text(category_title);
        $('#ChangeTitle').text('Статус: ' + title);
        $('#category_title').val(title);
        $('#ChangeModal').attr('data-brandid', id);
        $('#ChangeModal').attr('data-action', 'change');
    });
    
    //Действие при нажатии на кнопку Удалить
    $(document).on('click', '.delete', function () {
        
        openClose('#DeleteModal');
        
        var id = $(this).data('id');
        var title = $(this).parent().parent().prev('#brand_title').text();
        
        $('#DeleteTitle').text('Удалить бренд: ' + title);
        $('#DeleteModal').attr('data-brandid', id);
    });
    
    //Действия при смене категорий
    $('.categoryMenu-item').click(function(){
        
        var category_id = $(this).attr('data-categoryId');
        var category_title = $(this).text();
        
        $('#CategoryMenu').attr('data-categoryId', category_id);
        $('#CategoryMenu').text(category_title);
    });
    
    //Действие при нажатии на кнопку Добавить
    $('#Add').click(function(){
        
        openClose('#ChangeModal');
        $('#CategoryMenu').text('Категория');
        $('#ChangeTitle').text('Добавить новый бренд');
        $('#ChangeModal').attr('data-brandid', 'add');
        $('#ChangeModal').attr('data-action', 'add');
    });
    
    //Закрытие формы удаления
    $(document).on('click', '.del_modal_close', function () {
        
        $('#DeleteTitle').text('Вы уверены?');
        $('#DeleteModal').attr('data-brandid', false);
        openClose('#DeleteModal');
    });
    
    //Закрытие формы изменения и добавления
    $(document).on('click', '.change_modal_close', function () {
        
        $('#CategoryMenu').attr('data-categoryid', false);
        $('#ChangeTitle').text('Бренд: ');
        $('#category_title').val('');
        $('#ChangeModal').attr('data-brandid', false);
        openClose('#ChangeModal');
    });
    
    //Изменение и добавление
    $('#save').click(function(){
        
        var brand_id = $('#ChangeModal').attr('data-brandid');
        var brand_title = $('#category_title').val();
        var action = $('#ChangeModal').attr('data-action');
        var category_id = $('#CategoryMenu').attr('data-categoryid');
        
        clearContent();
        getBrands(brand_id, brand_title, category_id, action, page);
        
        $('#ChangeModal').attr('data-brandid', false);
        action = '';
        $('#ChangeTitle').text('Бренд: ');
        openClose('#ChangeModal');
    });
    
    //Удаление
    $('#modal_send').click(function(){
        
        var brand_id = $('#DeleteModal').data('brandid');
        var brand_title = '';
        var action = 'delete';
        
        clearContent();
        getBrands(brand_id, brand_title, category_id, action, page);
        
        $('#DeleteModal').attr('data-brandid', false);
        action = '';
        $('#DeleteTitle').text('Вы уверены?');
        openClose('#DeleteModal');
    });
    
    //Работы пагинации
    $(document).ajaxStop(function(){
        //Смена страниц при клике на страницу
        $('.pag-item').click(function(){
            page = $(this).data('page');
            clearContent();
            getBrands(brand_id, brand_title, category_id, action, page);
        });
        //Смена страниц при клике на слайдер
        $('.pag_prev, .pag_next').click(function(){
            setTimeout(function() { 
                page = $('.active_page').data('page');
                clearContent();
                getBrands(brand_id, brand_title, category_id, action, page);
            }, 100);
        });
    });
});

function getBrands(brand_id, brand_title, category_id, action, page) {
    $.post('../php/admin_get_brands.php', {
        brand_id,
        brand_title,
        category_id,
        action,
        page
    }, function (data) {

        var data = JSON.parse(data);
        
        var brands = data['brands'];
        var active_page = data['active_page'];
        var page_count = data['page_count'];
        
        if (brands !== null){
            brands.forEach(function (brand) {
                $('.brands').append(
                '<div class="brand-item d-flex justify-content-center">' +
                    '<h3 class="text-center mt-4 mb-4" id="brand_title">'+ brand['brand_title'] +'</h3>'+
                    '<div class="btn-group ml-4">'+
                        '<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Действия</button>' +
                        '<div class="dropdown-menu">'+
                            '<button type="button" class="dropdown-item change" data-id="'+ brand['id'] +'" data-categorytitle="'+ brand['category_title'] +'">Изменить</button>'+
                            '<button type="button" class="dropdown-item delete" data-id="'+ brand['id'] +'">Удалить</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'
                );
            });
        } else {
            $('.brands').append('<h3 class="text-center">Ничего не найдено ...</h3>');
        }
        
        
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
}

function clearContent(){
    $('.brands').empty();
    $('.pagination').empty();
}