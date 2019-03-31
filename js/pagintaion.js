$(document).ajaxStop(function(){

    var page_count = $('.pag-item').length;
    
    //Если кнопок больше 6, то скрываем все кроме первых 4 и последней
    if(page_count > 6){
        $('.pag-item').each(function(){
            var this_page = $(this).data('page');
            
            //5 кнопку делаем заглушкой
            if (this_page == 5){
                $(this).text('...');
                $(this).addClass('pag-salt');
                $(this).prop('disabled', true);
            }
            
            //Все после 5 и кроме последней скрываем
            if(this_page > 5 && this_page < page_count){
                $(this).css('display', 'none');
            }
            
        });
    }
    
    //Особенность AJAX, блокировка кнопок 
    //(Удалить, если ajax не исп.)
    if($('.active_page').prev().hasClass('pag_prev')){
        setBlock('.pag_prev');
    } else {
        removeBlock('.pag_prev');
    }
    
    if($('.active_page').next().hasClass('pag_next')){
        setBlock('.pag_next');
    } else {
        removeBlock('.pag_next');
    }
    
    
    $('.pag-item').click(function(){
        
        //Делаем кнопку активной
        setActive($(this));
        
        //Если активная первая страница, то блокируем слайд влево
        if ($(this).data('page') !== 1){;
            removeBlock('.pag_prev');
        } else if($('.pag_prev').hasClass('btn-disable')){
        } else {
            setBlock('.pag_prev');
        }

        //Если активная последняя страница, то блокируем слайд вправо
        if ($(this).data('page') == page_count){
            setBlock('.pag_next');
        } else if ($('.pag_next').hasClass('btn-disable')){  
            removeBlock('.pag_next');
        }
        
        ///////Открытие кнопок////////
        
        //Задаем активную кнопку переменной
        var open_btn_triger = $('.active_page').data('page');
        
        //Функция движения вправо
        paginationRight(open_btn_triger, page_count);
        
        //Функция движения влево
        paginationLeft(open_btn_triger, page_count);
        
        //Если выбираем первую или последнюю кнопку
        //Выбираем первую
        if(open_btn_triger == 1){
            
            $('.pag-item').each(function(){
                var this_page = $(this).data('page');
                
                //У всех кнопок убираем заглушки
                if($(this).hasClass('pag-salt')){
                    $(this).text(this_page);
                    $(this).removeClass('pag-salt');
                    $(this).prop('disabled', false);  
                }
                
                //Скрываем все кнопки после 5 и до последней
                if(this_page > 5 && this_page < page_count){
                    $(this).css('display', 'none');  
                //Показываем 4 первые кнопки
                } else if (this_page <= 4){
                    $(this).css('display', 'block');
                }
                
                //5 кнопку делаем заглушкой
                if (this_page == 5){
                    $(this).text('...');
                    $(this).addClass('pag-salt');
                    $(this).prop('disabled', true);
                    $(this).css('display', 'block');  
                }
                
                //Показываем последнюю, если скрыта
                if (this_page == page_count){
                    $(this).css('display', 'block');
                }
            });
        //Если выбираем последнюю
        } else if (open_btn_triger == page_count){
            $('.pag-item').each(function(){
                var this_page = $(this).data('page');
                
                //У всех кнопок убираем заглушки
                if($(this).hasClass('pag-salt')){
                    $(this).text(this_page);
                    $(this).removeClass('pag-salt');
                    $(this).prop('disabled', false);  
                }
                
                //5 кнопку с конца делаем заглушкой
                if (this_page == (page_count - 4)){
                    $(this).text('...');
                    $(this).addClass('pag-salt');
                    $(this).prop('disabled', true);
                    $(this).css('display', 'block');  
                }
                
                //Скрываем все кнопки до 4 последних
                if(this_page < (page_count - 4) && this_page !== 1){
                    $(this).css('display', 'none');  
                //Показываем 4 первые кнопки
                } else {
                    $(this).css('display', 'block');
                }
            });
        }
    });
    
    //Слайд влево
    $('.pag_prev').click(function(){
        //Пока слйд не дошел до первой
        if ($('.active_page').data('page') !== 1){
            var page = $('.active_page').data('page');
            page--;
            
            var target = $('[data-page='+ page +']');
            
            //Делаем кнопку активной
            setActive(target);
            
            //Функция движения влево
            paginationLeft(page, page_count);
            
            //Убираем блоки со слайда вправо
            if(target.data('page') !== page_count){
                removeBlock('.pag_next');
            } else {
                setBlock('.pag_next');
            }
            
            //Если слайд дошел до 1 кнопки, то блокируем слайд влево
            if (target.data('page') == 1){
                setBlock('.pag_prev');
            }
        }
    });
    
    //Слайд вправо
    $('.pag_next').click(function(){
        //Пока слайд не дошел до последней кнопки
        if ($('.active_page').data('page') !== page_count){
            var page = $('.active_page').data('page');
            page++;
            
            var target = $('[data-page='+ page +']');
            
            //Делаем кнопку активной
            setActive(target);
            
            //Функция движения вправо
            paginationRight(page, page_count);
        
            //Убираем блоки со слайда влево
            if(target.data('page') !== 1){
                removeBlock('.pag_prev');
            } else {
                setBlock('.pag_prev');
            }
            
            //Если слайд дошел до последней кнопки, то блокируем слайд вправо
            if (target.data('page') == page_count){
                setBlock('.pag_next')
            }     
        };
    });
});

//Функция движения влево
function paginationLeft(target, page_count){
    //Если слева нет кнопоки
    if($('[data-page='+ (target - 1) +']').hasClass('pag-salt')){

        //Пока слева не останется 3 кнопки
        //Показываем по одной
        if($('[data-page='+ (target - 2) +']').data('page') !== 1){
            $('[data-page='+ (target - 1) +']').text($('[data-page='+ (target - 1) +']').data('page'));
            $('[data-page='+ (target - 1) +']').removeClass('pag-salt');
            $('[data-page='+ (target - 1) +']').prop('disabled', false);

            $('[data-page='+ (target + 2) +']').text('...');
            $('[data-page='+ (target + 2) +']').addClass('pag-salt');
            $('[data-page='+ (target + 2) +']').prop('disabled', true);

            $('[data-page='+ (target - 2) +']').css('display', 'block');
            $('[data-page='+ (target - 2) +']').text('...');
            $('[data-page='+ (target - 2) +']').addClass('pag-salt');
            $('[data-page='+ (target - 2) +']').prop('disabled', true);

        //Иначе показываем все три
        } else {
            $('[data-page='+ (target - 1) +']').text($('[data-page='+ (target - 1) +']').data('page'));
            $('[data-page='+ (target - 1) +']').removeClass('pag-salt');
            $('[data-page='+ (target - 1) +']').prop('disabled', false);

            $('[data-page='+ (target + 2) +']').text('...');
            $('[data-page='+ (target + 2) +']').addClass('pag-salt');
            $('[data-page='+ (target + 2) +']').prop('disabled', true);
        }

        //Если справа больше 4 кнопок, то превращаем заглушку в кнопку и скрываем ее
        if ($('[data-page='+ (target + 3) +']').data('page') !== page_count){
            $('[data-page='+ (target + 3) +']').css('display', 'none');
            $('[data-page='+ (target + 3) +']').text($('[data-page='+ (target + 3) +']').data('page'));
            $('[data-page='+ (target + 3) +']').removeClass('pag-salt');
            $('[data-page='+ (target + 3) +']').prop('disabled', false);
        }       
    }
}

//Функция движения вправо
function paginationRight(target, page_count){
    //Если справа нет кнопоки
    if($('[data-page='+ (target + 1) +']').hasClass('pag-salt')){

        //Показываем одну справа кнопку
        $('[data-page='+ (target + 1) +']').text($('[data-page='+ (target + 1) +']').data('page'));
        $('[data-page='+ (target + 1) +']').removeClass('pag-salt');
        $('[data-page='+ (target + 1) +']').prop('disabled', false);

        //Показываем одну слева
        $('[data-page='+ (target - 2) +']').text('...');
        $('[data-page='+ (target - 2) +']').addClass('pag-salt');
        $('[data-page='+ (target - 2) +']').prop('disabled', true);

        //Пока справа не останется 3 кнопки до конца
        //Показываем по одной
        if ($('[data-page='+ (target + 2) +']').data('page') !== page_count){

            $('[data-page='+ (target + 2) +']').css('display', 'block');
            $('[data-page='+ (target + 2) +']').text('...');
            $('[data-page='+ (target + 2) +']').addClass('pag-salt');
            $('[data-page='+ (target + 2) +']').prop('disabled', true);
        //Иначе показываем все три
        } else {
            $('[data-page='+ (target - 2) +']').text('...');
            $('[data-page='+ (target - 2) +']').addClass('pag-salt');
            $('[data-page='+ (target - 2) +']').prop('disabled', true);
        }

        //Если слева больше 4 кнопок, то превращаем заглушку в кнопку и скрываем ее
        if ($('[data-page='+ (target - 3) +']').data('page') !== 1){
            $('[data-page='+ (target - 3) +']').css('display', 'none');
            $('[data-page='+ (target - 3) +']').text($('[data-page='+ (target - 3) +']').data('page'));
            $('[data-page='+ (target - 3) +']').removeClass('pag-salt');
            $('[data-page='+ (target - 3) +']').prop('disabled', false);
        }
    }
}

//Делаем кнопку активной
function setActive(target){
    $('.active_page').prop('disabled', false);
    $('.active_page').removeClass('active_page');
    target.addClass('active_page');
    target.prop('disabled', true);
}

//Блокирока слайдера
function setBlock(target){
    $(target).addClass('btn-disable');
    $(target).prop('disabled', true);
}
//Удаление блокировки
function removeBlock(target){
    $(target).removeClass('btn-disable');
    $(target).prop('disabled', false);
}