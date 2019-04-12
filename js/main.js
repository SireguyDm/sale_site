$(document).ready(function() {
    
    var window_height = window.innerHeight;
    
    // затемнение каталога
    $('.catalog-choice-item a').mouseenter(function(){
        $(this).children('.catalog-choice-item-back').css('display', 'block');
    });
    $('.catalog-choice-item a').mouseleave(function(){
        $(this).children('.catalog-choice-item-back').css('display', 'none');
    });
    
    $('#call-back-activator').click(function(){
        $('.call-back-window').css('display', 'block');
    });
    
    goToTarget('#menu-delivery', '#delivery-target');
    goToTarget('#menu-contacts', '#communicate-target');
    
    $(window).scroll(function(){
        var currect_height = $(this).scrollTop();
        
        if(window_height < currect_height){
            $('#move_to_top').fadeIn(250);
        } else {
            $('#move_to_top').fadeOut(250);
        }
    })
    
    $('#move_to_top').click(function(){
        $('html, body').animate({
            scrollTop: 0
        }, 300);
    });
    
    //Живой поиск
    $("#search-input").keyup(function(i){
        switch(i.keyCode) {
            case 27:  // escape
            case 32:  // пробел
            case 123: // F12
            case 38: // стрелка вверх
                if($('.search-item').length > 0){
                    if ($('.search-hover').length > 0){
                        var number = $('.search-hover').data('number');
                        number--;
                        $('.search-hover').removeClass('search-hover');
                        if($('[data-number='+ number +']').length > 0){
                            $('[data-number='+ number +']').addClass('search-hover');
                        } else {
                            $('[data-number='+ (number + 1) +']').addClass('search-hover');
                        }
                    } else {
                        let last = $('.search-item').length;
                        $('[data-number='+last+']').addClass('search-hover');
                    }
                }
                break;
            case 40: // стрелка вниз
                if($('.search-item').length > 0){
                    if ($('.search-hover').length > 0){
                        var number = $('.search-hover').data('number');
                        number++;
                        $('.search-hover').removeClass('search-hover');
                        if($('[data-number='+ number +']').length > 0){
                            $('[data-number='+ number +']').addClass('search-hover');
                        } else {
                            $('[data-number='+ (number - 1) +']').addClass('search-hover');
                        }
                    } else {
                        $('[data-number=1]').addClass('search-hover');
                    }    
                }
                break;
            case 13:
                if ($('.search-hover').length > 0){
                    let id = $('.search-hover').data('id');
                    $(location).attr('href', '../controllers/product.php?product_id='+ id +'');
                }
                break;
            break;
                
            default:
                if ($(this).val().length > 2){ 
                    var search_text = $(this).val().toLowerCase();
                    search_text = search_text.replace(/\s/g, '');
                    
                    $('.search-list').empty();
                    getSearchList(search_text);
                } else if ($(this).val().length === 0){
                    search_text = '';
                    
                    $('.search-list').empty();
                    getSearchList(search_text);
                }
            break;
        }
    });
    
    //Переход на карточку товара
    $(document).on('click', '.search-item', function(){
        let id = $(this).data('id');
        $(location).attr('href', '../controllers/product.php?product_id='+ id +'');
    });
});

function getSearchList(search_text){
    $.post('../php/get_header_search.php', {
        search_text
    }, function (data) {
        
        var data = JSON.parse(data);
        var products = data['products'];
        
        if (products.length > 0){
            $('.search-list').css('display', 'block');
            let i = 1;
            products.forEach(function(item){
                $('.search-list').append('<p class="search-item" data-number="'+ i +'" data-id="'+ item['id'] +'">'+ item['title'] +'</p>');
                i++;
            })
        } else {
            $('.search-list').css('display', 'none');
        }    
    });
}

function goToTarget(start, target){
    $(start).click(function(){
        if ($(target).length > 0){
            var height = $(target).offset().top;
            
            $('html, body').animate({
                scrollTop: height - 50
            }, 500);
        } else {
            $(location).attr('href', '../controllers/main_page.php '+ target +'');
        }
        return false;
    })
}