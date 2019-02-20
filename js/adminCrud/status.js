$(document).ready(function(){
    
    getStatus();
});



function getStatus() {
    $.post('../php/admin_get_status.php', {
    }, function (data) {

        var statuses = JSON.parse(data);
        
        statuses.forEach(function (status) {
            $('.status').append(
            '<div class="status-item d-flex justify-content-center">' +
                '<h3 class="text-center mt-4 mb-4">'+ status['status_title'] +'</h3>'+
                '<div class="btn-group ml-4">'+
                  '<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Действия</button>' +
                  '<div class="dropdown-menu">'+
                     '<button type="button" class="dropdown-item" data-toggle="modal" data-target="#ChangeModal">Изменить</button>'+
                    '<button type="button" class="dropdown-item" data-toggle="modal" data-target="#DeleteModal">Удалить</button>'+
                  '</div>'+
                '</div>'+
            '</div>'
            );
        });
    });
}
