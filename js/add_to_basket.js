$(document).ready(function(){
    
    $('#add_article').click(function(){
        var proba = $('#data-id').attr('data-id');
        
        $.post(
          "../controllers/header.php",
          {
            proba: proba,
          }   
        );
    });
    
});