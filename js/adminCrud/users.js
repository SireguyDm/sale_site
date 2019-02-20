$(document).ready(function(){
    
    getUsers();
});



function getUsers() {
    $.post('../php/admin_get_users.php', {
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
                    '<div class="col-lg-12 col-xl-1 item" id="change">'+
                        '<button class="btn btn-outline-success my-2 my-sm-0 admin-btn user-change">Изменить</button>'+
                    '</div>'+
                '</div>'+
                '<div class="row user_change_box">'+
                    '<div class="col-lg-12 col-xl-2 item">'+
                    '</div>'+
                    '<div class="col-lg-12 col-xl-3 item" id="name">'+
                        '<input type="text" placeholder="Сергей">'+
                        '<button>ок</button>'+
                    '</div>'+
                    '<div class="col-lg-12 col-xl-3 item" id="login">'+
                        '<input type="text" placeholder="Admin">'+
                        '<button>ок</button>'+
                    '</div>'+
                    '<div class="col-lg-12 col-xl-3 item" id="pass">'+
                        '<input type="text" placeholder="123">'+
                        '<button>ок</button>'+
                    '</div>'+
                    '<div class="col-lg-12 col-xl-1 item" id="change">'+
                    '</div>'+
                '</div>'+
            '</div>'   
                
            );
        });
    });
}
