$(document).ready(function(){
    
    var user_id = '';
    var user_name = '';
    var user_login = '';
    var user_pass = '';
    var action = '';
        
    getUsers(user_id, user_name, user_login, user_pass, action);
    
    $(document).on('click', '.change', function () {
        
        openClose('#ChangeModal');
        
        var id = $(this).data('id');
        
        $('#ChangeModal').attr('data-userid', id);
        $('#ChangeModal').attr('data-action', 'change');
    });
    
    $(document).on('click', '.delete', function () {
        
        openClose('#DeleteModal');
        
        var id = $(this).data('id');
        $('#DeleteModal').attr('data-userid', id);
    });
    
    $('#Add').click(function(){
        
        openClose('#ChangeModal');
        
        $('#ChangeModal').attr('data-userid', 'add');
        $('#ChangeModal').attr('data-action', 'add');
    });
    
    $(document).on('click', '.del_modal_close', function () {
        
        $('#DeleteModal').attr('data-userid', false);
        openClose('#DeleteModal');
    });
    
    $(document).on('click', '.change_modal_close', function () {
        
        $('#ChangeModal').attr('data-userid', false);
        $('#ChangeModal').attr('data-action', false);
        openClose('#ChangeModal');
    });
    
    //Изменение и добавление
    $('#save').click(function(){
        var user_id = $('#ChangeModal').data('userid');
        var user_name = $('#user_name').val();
        var user_login = $('#user_login').val();
        var user_pass = $('#user_pass').val();
        var action = $('#ChangeModal').data('action');
        
        getUsers(user_id, user_name, user_login, user_pass, action);
        
        $('#ChangeModal').attr('data-userid', false);
        $('#ChangeModal').attr('data-action', false);
        openClose('#ChangeModal');
        
        location.reload();
    });
    
    //Удаление
    $('#modal_send').click(function(){
        
        var user_id = $('#DeleteModal').data('userid');
        
        getUsers(user_id, user_name, user_login, user_pass, action);
        
        $('#DeleteModal').attr('data-userid', false);
        openClose('#DeleteModal');
        
        location.reload();
    });
});

function getUsers(user_id, user_name, user_login, user_pass, action) {
    $.post('../php/admin_get_users.php', {
        user_id,
        user_name,
        user_login,
        user_pass,
        action
    }, function (data) {

        var users = JSON.parse(data);
        
        users.forEach(function (user) {
            $('.admin-users').append(
            '<div class="container admin-users-item">' +
                '<div class="row">' +
                    '<div class="col-lg-12 col-xl-2 item">'+
                        '<img src="../icon/user.png" class="img-thumbnail">'+
                    '</div>'+
                    '<div class="col-lg-12 col-xl-3 item" id="name">'+
                        '<p class="info-zag">Имя: </p>'+
                        '<p class="info">'+ user['user_name'] +'</p>'+
                    '</div>'+
                    '<div class="col-lg-12 col-xl-3 item" id="login">'+
                        '<p class="info-zag">Логин: </p>'+
                        '<p class="info">'+ user['login'] +'</p>'+
                    '</div>'+
                    '<div class="col-lg-12 col-xl-3 item" id="pass">'+
                        '<p class="info-zag">Пароль: </p>'+
                        '<p class="info">'+ user['pass'] +'</p>'+
                    '</div>'+
                    '<div class="btn-group col-lg-12 col-xl-1 item">'+
                      '<button class="btn btn-secondary btn-sm dropdown-toggle admin-btn user-change" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Действия</button>' +
                      '<div class="dropdown-menu">'+
                         '<button type="button" class="dropdown-item change" data-id="'+ user['id'] +'">Изменить</button>'+
                         '<button type="button" class="dropdown-item delete" data-id="'+ user['id'] +'">Удалить</button>'+
                      '</div>'+
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