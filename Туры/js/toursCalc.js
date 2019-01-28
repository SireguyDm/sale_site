$(document).ready(function(){

    
console.log();
var all_count = $('.tour_block').length;
console.log(all_count +' блоков');

for (i = 1; i <= all_count; i++) {
    var hotel_daycost[i] = $('#country_span_'+ i).parent().parent().next().next('.tour_stoim').text();
    console.log('privet' + [i] + '' + hotel_daycost[i]);
}

$('#search-btn').click(function(){
  
    var select_country = $('#vibor_strana').val();
    console.log(select_country);
    
    var day_count = $('#day_count').val();
    
    for (i = 1; i <= all_count; i++) {
        if ($('#country_span_'+ i).text() == select_country){
            $('#country_span_'+ i).parent().parent().parent().removeClass("Hide");
        } else if (select_country == 'All') {
                $('#country_span_'+ i).parent().parent().parent().addClass("Show");
                $('#country_span_'+ i).parent().parent().parent().removeClass("Hide");
        } else{
                $('#country_span_'+ i).parent().parent().parent().addClass("Hide");
                $('#country_span_'+ i).parent().parent().parent().removeClass("Show");
        }
        
        
// // // // // // //  //      Рассчет суммы    // // // // // // // // // // // 
    
        
       
        var stoim = $('#country_span_'+ i).parent().parent().next().next('.tour_stoim').text();
        $('#country_span_'+ i).parent().parent().next().next('.tour_stoim').text('');
        var stoim = Number.parseInt(stoim);
        console.log(stoim);
        var day_cost = stoim;
        var hotel_summ = day_cost * day_count;
        $('#country_span_'+ i).parent().parent().next().next('.tour_stoim').text(hotel_summ + ' руб.');
        
        
        
        
            
    }
    
    
 
});
    
// Цвет рейтинга
for (i = 1; i <= all_count; i++) {
    var rating = $('#country_span_'+ i).parent().parent().next('.rating').text();
    var rating_float = Number.parseFloat(rating);
    if (rating_float > 4.5){
       $('#country_span_'+ i).parent().parent().next('.rating').css('color', 'green');
    } else if (rating_float < 3.5){
        $('#country_span_'+ i).parent().parent().next('.rating').css('color', 'red');
    }
}
    

    
});