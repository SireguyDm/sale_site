$(document).ready(function(){
    
    $('#call-back-activator').click(function(){
        $('.call_back_background').css('display', 'block');
    });
    
    $('#cb_close').click(function(){
        $('.call_back_background').css('display', 'none');
    });
    
    $('#cb_tel').mask("+7 (999) 999-99-99");
    
    $('#cb_send').click(function(){
        
        var cb_name = $('#cb_name').val();
        var cb_tel = $('#cb_tel').val();
        
        if (cb_tel != false){
            cb_tel = cb_tel.replace(/\s+/g, '');
            cb_tel = cb_tel.replace(/-/g, '');
            cb_tel = cb_tel.replace('+', '');
            cb_tel = cb_tel.replace(')', '');
            cb_tel = cb_tel.replace('(', '');
        }
        
        if (cb_name && cb_tel.length > 10){
            $('#cb_name').removeClass('cb_error');
            $('#cb_tel').removeClass('cb_error');
                
            $('#cb_name').addClass('cb_done');
            $('#cb_tel').addClass('cb_done');
            $.post('../php/create_callBack.php', {
                cb_name,
                cb_tel
            });  
            
        } else {
            if (!cb_name && cb_tel.length > 10){
                $('#cb_name').removeClass('cb_done');
                $('#cb_tel').removeClass('cb_error');
                
                $('#cb_name').addClass('cb_error');
                $('#cb_tel').addClass('cb_done');
            } else if (!cb_name && cb_tel.length < 11){
                $('#cb_name').removeClass('cb_done');
                $('#cb_tel').removeClass('cb_done');
                
                $('#cb_name').addClass('cb_error');
                $('#cb_tel').addClass('cb_error');
            } else if (cb_name.length > 0 && cb_tel.length < 11){
                $('#cb_name').removeClass('cb_error');
                $('#cb_tel').removeClass('cb_done');
                
                $('#cb_name').addClass('cb_done');
                $('#cb_tel').addClass('cb_error');
            }
        }
        
        return false;
    }); 
});