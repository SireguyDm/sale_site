$(document).ready(function(){
    
    //Кол-во товара в предложке
    var product_count = $('.slider-item').length;
    
    //Размер 1 товара с учетом отступов css
    var width = $('.slider-item').css('width');
    var right_mar = $('.slider-item').css('margin-right');
    var left_mar = $('.slider-item').css('margin-left');
    width = parseInt(width);
    right_mar = parseInt(right_mar);
    left_mar = parseInt(left_mar);
    
    //Размер слайдера
    var all_width = width + right_mar + left_mar; 
    var slider_width = product_count * all_width;
    $('.sale-slider').css('width', slider_width);
    
    //Если товара меньше 5, слайдер не должен работать
    if (product_count === 0){
        $('.offers').css('display', 'none');
    }
    
    //Если товара больше 5, то появл слайдер
    if (product_count > 5){
        $('#slider-next').css('display', 'block');
    }
    
    //Кнопка вправо
    $('#slider-next').click(function(){
        
        // Получение отступ элементов слайдера
        var margin = $(this).prev('.sale-box').children('.sale-slider').css('margin-left');
        
        // Точка, когда скрывается кнопка с учетом того, что видно 5 продукта
        var hide_btn_next = -width * (product_count - 5) + 'px';
        console.log(hide_btn_next);
        
        //Скрывать кнопку вправо, когда там не осталось элементов
        if (margin < hide_btn_next) {
            $('#slider-next').css('display', 'none');
        }
        
        //Отступ
        margin = parseInt(margin);
        margin = margin - all_width;
        
        // Показывать кнопку назад, когда 1 и больше элементов слева
        if (margin !== 0){
            $('#slider-prev').css('display', 'block');
        }
        
        //Скрывать кнопки, пока идет анимация
        lockButton(this, '#slider-prev');
        
        //Анимация отступа
        $(this).prev('.sale-box').children('.sale-slider').animate({
            marginLeft: margin
        }, 200);
        
        
    });
    
    //Кнопка влево
    $('#slider-prev').click(function(){
        
        // Получение отступ элементов слайдера
        var margin = $(this).prev().prev('.sale-box').children('.sale-slider').css('margin-left');
        
        //Отступ
        margin = parseInt(margin);
        margin = margin + all_width;
        
        // Пока слева есть минимум 1 товар
        var hide_btn_prev = -width * (product_count - 4) + 'px';
        
         //Если слева нет товаров, то скрывается кнопка влево
        if (margin == 0) {
            $('#slider-prev').css('display', 'none');
        }
        
        if(margin != 0){
            $('#slider-next').css('display', 'block');
        }
        
        //Скрывать кнопки, пока идет анимация
        lockButton(this, '#slider-next');
        
        //Анимация отступа
        $(this).prev().prev('.sale-box').children('.sale-slider').animate({
            marginLeft: margin
        }, 200);
    });
    
});

//Функция скрывания кнопки, пока идет анимация
function lockButton(object_1, object_2) {
    var lockInterval = setInterval(function () {
        $(object_1).css('pointer-events', 'none');
    });

    setTimeout(function () {
        $(object_1).css('pointer-events', 'painted');
        clearInterval(lockInterval);
    }, 200);
}
