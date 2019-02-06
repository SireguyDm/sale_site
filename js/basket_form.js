$(document).ready(function(){
    
    var summ = 0;
    $('.basket_p_cost').each(function() {
        var cost = parseInt($(this).text());
        summ = summ + cost;
    });
    
    $('#basket-itogsumm').text(summ + ' руб.');
    $('#products_summ').text(summ + ' руб.');
    
    var delivery = $('#form_delivery').data('delivery');
    var itog = delivery + summ;
    $('#itog_summ').text(itog + ' руб.');
});