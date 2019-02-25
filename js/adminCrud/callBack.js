$(document).ready(function(){

    var call_id = false; 
    GetProducts(call_id);
    
    $(document).on('click', '.delete', function () {
        
        openClose();
        
        var id = $(this).parent('.btn-box').parent('#admin_basket').data('id');
        $('#DeleteModal').attr('data-prodid', id);
    });
    
    $('#deleteAll').click(function(){
        
        openClose();
        
        var id = $(this).data('all');
        $('#DeleteModal').attr('data-prodid', id);
    });
    
    $(document).on('click', '#modal_send', function () {
        
        var call_id = $('#DeleteModal').data('prodid');
        GetProducts(call_id);
        
        $('#DeleteModal').attr('data-prodid', false);
        openClose();
        
        location.reload();
    });
    
    $(document).on('click', '.modal_close', function () {
        
        $('#DeleteModal').attr('data-prodid', false);
        openClose();
    });

});

function GetProducts(call_id) {
    $.post('../php/admin_get_callBack.php', {
        call_id
    }, function (data) {

        var callBack = JSON.parse(data);
        
        callBack.forEach(function (call) {
            $('.callback').append(
            '<div class="alert mb-3 alert-success" role="alert" id="admin_basket" data-id="'+ call['id'] +'">' +
                '<h4 class="alert-heading admin_time text-center">'+ call['date'] +'</h4>'+
                '<p class="text-center h4" id="user_name">'+ call['user_name'] +'</p>'+
                '<p class="h5 admin_basket_row mt-3 text-center">Телефон: <span>'+ call['tel'] +'</span></p>' +
                '<div class="d-flex justify-content-center mt-3 btn-box">'+
                    '<button type="button" class="btn btn-danger delete" >Удалить</button>'+
                '</div>'+ 
            '</div>'
            )
        });
    });
}

function openClose(){
    var modal = $('#DeleteModal');
    if (modal.css('display') == 'none' && modal.css('opacity') == '0'){
        modal.css('display', 'block');
        modal.css('opacity', '1');
    } else {
        modal.css('display', 'none');
        modal.css('opacity', '0');
    }
}