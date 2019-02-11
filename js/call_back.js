$(document).ready(function(){
    
    $('.form-close').click(function(){
        $('.call-back-window').css('display', 'none');
        
        delError('name', 'name');
        delError('tel', 'tel');
        delError('tel', 'small-tel');
    });
    
    $('#form-tel').bind("change keyup input click", function() {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });
    
    $('#form-submit').click(function(){
        
        var user_name = $('#form-name').val();
        var user_tel = $('#form-tel').val();
        
        if (user_tel && user_tel.length >= 7){
            $.post(
              "../php/tel_create.php",
              {
                user_name: user_name,
                tel: user_tel
              }            
            ).done(function(){
                $('.call-back-form').css('display', 'none');
                $('.form-succes').css('display', 'flex');
                delError('name', 'name');
                delError('tel', 'tel');
                delError('tel', 'small-tel');
                
                setTimeout(function(){
                    $('.call-back-window').css('display', 'none');
                    $('.form-succes').css('display', 'none');
                    $('.call-back-form').css('display', 'block');
                }, 1500);
            });   
        } else {
            if(!user_name){
                addError('name', 'name');
            } else {
                delError('name', 'name');
            }
            if(!user_tel){
                addError('tel', 'tel');
            }
            else if(user_tel.length < 7){
                addError('tel', 'small-tel');
                $('#form-tel').parent('.form-item').removeClass('error-tel');
            }
            else {
                delError('tel', 'tel');
            }
        }
        
        return false;
    });
    
});


function addError(target, error){
    $('#form-'+ target +'').parent('.form-item').addClass('call-back-error');
    $('#form-'+ target +'').parent('.form-item').addClass('error-'+ error +'');
};
function delError(target, error){
    $('#form-'+ target +'').parent('.form-item').removeClass('call-back-error');
    $('#form-'+ target +'').parent('.form-item').removeClass('error-'+ error +'');
};