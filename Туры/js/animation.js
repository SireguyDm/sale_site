$(document).ready(function(){
   
    $('#btn_animation').click(function(){
        $('.animation').css('display', 'block');
        setTimeout(function(){
            document.location.href = "oplata.php";
        }, 2000);
    });
    
});
