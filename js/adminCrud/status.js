$(document).ready(function(){
    
    var status_id = false;
    var status_title = false;
    var action = false;
    
    //Получение всех статусов
    getStatus(status_id, status_title);
    
    //Действие при нажатии на кнопку Изменить
    $(document).on('click', '.change', function () {
        
        openClose('#ChangeModal');
        
        var id = $(this).data('id');
        var title = $(this).parent().parent().prev('#status_title').text();
        
        $('#ChangeTitle').text('Статус: ' + title);
        $('#category_title').val(title);
        $('#ChangeModal').attr('data-statusid', id);
        $('#ChangeModal').attr('data-action', 'change');
    });
    
    //Действие при нажатии на кнопку Удалить
    $(document).on('click', '.delete', function () {
        
        openClose('#DeleteModal');
        
        var id = $(this).data('id');
        var title = $(this).parent().parent().prev('#status_title').text();
        
        $('#DeleteTitle').text('Удалить статус: ' + title);
        $('#DeleteModal').attr('data-statusid', id);
    });
    
    //Действие при нажатии на кнопку Добавить
    $('#Add').click(function(){
        
        openClose('#ChangeModal');
        $('#ChangeTitle').text('Добавить новый статус');
        $('#ChangeModal').attr('data-statusid', 'add');
        $('#ChangeModal').attr('data-action', 'add');
    });
    
    //Закрытие формы удаления
    $(document).on('click', '.del_modal_close', function () {
        
        $('#DeleteTitle').text('Вы уверены?');
        $('#DeleteModal').attr('data-statusid', false);
        openClose('#DeleteModal');
    });
    
    //Закрытие формы изменения и добавления
    $(document).on('click', '.change_modal_close', function () {
        
        $('#ChangeTitle').text('Статус: ');
        $('#category_title').val('');
        $('#ChangeModal').attr('data-statusid', false);
        openClose('#ChangeModal');
    });
    
    //Изменение и добавление
    $('#save').click(function(){
        
        var status_id = $('#ChangeModal').data('statusid');
        var status_title = $('#category_title').val();
        var action = $('#ChangeModal').data('action');
        
        $('.status').empty();
        getStatus(status_id, status_title, action);
        
        $('#ChangeModal').attr('data-statusid', false);
        action = '';
        $('#ChangeTitle').text('Статус: ');
        openClose('#ChangeModal');
    });
    
    //Удаление
    $('#modal_send').click(function(){
        
        var status_id = $('#DeleteModal').data('statusid');
        var status_title = '';
        var action = 'delete';
        
        $('.status').empty();
        getStatus(status_id, status_title, action);
        
        $('#DeleteModal').attr('data-statusid', false);
        action = '';
        $('#DeleteTitle').text('Вы уверены?');
        openClose('#DeleteModal');
    });
});

function getStatus(status_id, status_title, action) {
    $.post('../php/admin_get_status.php', {
        status_id,
        status_title,
        action
    }, function (data) {

        var statuses = JSON.parse(data);
        
        statuses.forEach(function (status) {
            $('.status').append(
            '<div class="status-item d-flex justify-content-center">' +
                '<h3 class="text-center mt-4 mb-4" id="status_title">'+ status['status_title'] +'</h3>'+
                '<div class="btn-group ml-4">'+
                    '<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Действия</button>' +
                    '<div class="dropdown-menu">'+
                        '<button type="button" class="dropdown-item change" data-id="'+ status['id'] +'">Изменить</button>'+
                        '<button type="button" class="dropdown-item delete" data-id="'+ status['id'] +'">Удалить</button>'+
                    '</div>'+
                '</div>'+
            '</div>'
            );
        });
    });
}

function openClose(target){
    var modal = $(target);
    if (modal.css('display') == 'none' && modal.css('opacity') == '0'){
        modal.css('display', 'block');
        modal.css('opacity', '1');
    } else {
        modal.css('display', 'none');
        modal.css('opacity', '0');
    }
}