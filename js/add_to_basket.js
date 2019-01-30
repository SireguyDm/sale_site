$(document).ready(function(){
    
    $('#add_article').click(function(){
        var product_id = $('#data-id').attr('data-id');
        
        var cookie_date = new Date;
        cookie_date.setDate(cookie_date.getDate() + 1);
        
        document.cookie = "product_id="+ product_id +"; path=/; expires=" + cookie_date;
        });
    
});