$(document).ready(function(){
    
    $('.category-change').click(function(){
        var change_input = $(this).prev().children('.category_input');
        var change_btn = $(this).prev().children('.admin_category_change');
        
        if ($(this).css('display') == 'block' & change_input.prop('disabled') == true){
            $(this).css('display', 'none');
            change_input.prop('disabled', false);
            change_btn.css('display', 'block');
        }
    });
    
    $('.admin_category_change').click(function(){
        var change_input = $(this).prev('.category_input');
        
        if ($(this).css('display') == 'block' & change_input.prop('disabled') == false){
            $(this).css('display', 'none');
            change_input.prop('disabled', true);
        }
        
        
    });
    
});
