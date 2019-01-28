$(document).ready(function() {
    
    
    // затемнение каталога
    $('.catalog-choice-item a').mouseenter(function(){
        $(this).children('.catalog-choice-item-back').css('display', 'block');
    });
    $('.catalog-choice-item a').mouseleave(function(){
        $(this).children('.catalog-choice-item-back').css('display', 'none');
    });
    
});