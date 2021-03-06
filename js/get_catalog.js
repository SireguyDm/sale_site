$(document).ready(function(){
    
    var category_id = $('#catalog_id').data('category_id');
    var type = false;
    var action = false;
    var brand = '';
    var stock = false;
    var page = 1;
    getCatalog(category_id, type, action, brand, stock, page);
    
    $('.brand-item').click(function(){
        if ($('.brand-active').length > 0){
            $('.brand-active').removeClass('brand-active');
        }
        $(this).addClass('brand-active');
        
        brand = $(this).attr('data-brand');
        
        $('.catalog-filter-item').each(function(target){
            if ($(this).attr('data-action') !== 'none'){
                action = $(this).attr('data-action');
                type = $(this).attr('data-type');
            }
        });
        
        stock = $('#stock').attr('data-stock');
        page = 1;
        
        getCatalog(category_id, type, action, brand, stock, page);
    });
    
    $('.catalog-filter-item').click(function(){
        var sort_data = $(this).attr('data-action');
        var sort_img = $('.catalog-filter-item').children('.filter-img');
        
        if (sort_img.hasClass('filter-desc')){
            sort_img.removeClass('filter-desc');
            $('.catalog-filter-item').attr('data-action', 'none');
        } else {
            sort_img.removeClass('filter-asc');
            $('.catalog-filter-item').attr('data-action', 'none');
        }
        if (sort_data == 'none' || sort_data == 'asc'){
            $(this).children('.filter-img').addClass('filter-desc');
            
            $(this).attr('data-action', 'desc');
        } else if (sort_data == 'desc') {
            $(this).children('.filter-img').addClass('filter-asc');
            
            $(this).attr('data-action', 'asc');
        }
        if ($('.offers-item').length > 1){
            
            action = $(this).attr('data-action');
            type = $(this).attr('data-type');
            page = $('.active_page').data('page');
            stock = $('#stock').attr('data-stock');
            
            getCatalog(category_id, type, action, brand, stock, page);
        }
    });
    
    //Работы пагинации
    $(document).ajaxStop(function(){
        //Смена страниц при клике на страницу
        $('.pag-item').click(function(){
            page = $(this).data('page');
            
            var target_height = $('.middle-zag').scrollTop();
            
            catalogScroll();
            getCatalog(category_id, type, action, brand, stock, page);
        });
        //Смена страниц при клике на слайдер
        $('.pag_prev, .pag_next').click(function(){
            setTimeout(function() { 
                page = $('.active_page').data('page');
                
                catalogScroll();
                getCatalog(category_id, type, action, brand, stock, page);
            }, 100);
        });
    });
    
    //Только в наличие
    $('#stock').mouseenter(function(){
        $('.stock-img').addClass('stock-hover');
    });
    $('#stock').mouseleave(function(){
        $('.stock-img').removeClass('stock-hover');
    });
    
    $('#stock').click(function(){
        if ($('.stock-img').hasClass('stock-active')){
            $('.stock-img').removeClass('stock-active');
            $('#stock').attr('data-stock', 'false');
        } else {
            $('.stock-img').addClass('stock-active');
            $('#stock').attr('data-stock', 'true');
        }
        stock = $(this).attr('data-stock');
        brand = $('.brand-active').attr('data-brand');
        action = $('.catalog-filter-item').attr('data-action');
        type = $('.catalog-filter-item').attr('data-type');
        page = 1;
        
        getCatalog(category_id, type, action, brand, stock, page)
    });
    
});

function getCatalog(category_id, type, action, brand, stock, page){
    $.post('../php/get_catalog.php', {
        category_id,
        type,
        action,
        brand,
        stock,
        page
    }, function (data) {
        var data = JSON.parse(data);
        
        var catalog = data['catalog'];
        var page_count = data['count'];
        var active_page = data['active_page'];
        
        $(document).ajaxStop(function () {
            $('.catalog-product').empty();
            if (catalog.length > 0){
                catalog.forEach(function(product){
                    if (product['old_cost'] !== '0'){
                        var product_old_cost = product['old_cost'] + ' руб.'
                    } else {
                        var product_old_cost = '';
                    }
                    if (product['prod_count'] !== '0'){
                        var html_cost = '<p class="cost">'+ product['cost'] +' руб.</p>'+'<p class="old-cost">'+ product_old_cost +'</p>';
                    } else {
                        var html_cost = '<p class="sold">Нет в наличии</p>'
                    }
                    $('.catalog-product').append(
                        '<div class="offers-item">' +
                            '<a href="product.php?product_id='+ product['id'] +'">' +
                                '<div class="catalog_img_box">' +
                                    '<img src="../pics/tovar/'+ product['img'] +'/'+ product['img'] +'1.jpg">' +
                                '</div>' +
                                '<div class="offers-item-disc">' +
                                    '<p class="product-title">'+ product['brand_title'] +'</p>'+
                                    '<p>'+ product['title'] +'</p>' +
                                '</div>' +
                                '<div class="offers-cost">'+ html_cost +'</div>' +
                            '</a>' +
                        '</div>'
                    );
                });

            } else {
                $('.catalog-product').append(
                    '<h3>Товар не найден или его временно нет в продаже</h3>'
                );
            }
        });
        
        $('.pagination').empty();
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
};

function catalogScroll(){
    var target_height = $('.middle-zag').scrollTop();        
    $('html, body').animate({
        scrollTop: target_height + 150
    }, 500);
}