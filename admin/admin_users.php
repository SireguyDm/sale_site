<?php include('../controllers/admin_header.php') ?>

<h1 class="text-center mt-4 mb-4">Пользователи</h1>

<div class="admin-users">
    <div class="container admin-users-item">
        <div class="row">
            <div class="col-lg-12 col-xl-2 item">
                <img src="../icon/user.png" class="img-thumbnail">
            </div>
            <div class="col-lg-12 col-xl-3 item" id="name">
                <p class="info-zag">Имя: </p>
                <p class="info">Сергей</p>
            </div>
            <div class="col-lg-12 col-xl-3 item" id="login">
                <p class="info-zag">Логин: </p>
                <p class="info">Admin</p>
            </div>
            <div class="col-lg-12 col-xl-3 item" id="pass">
                <p class="info-zag">Пароль: </p>
                <p class="info">123</p>
            </div>
            <div class="col-lg-12 col-xl-1 item" id="change">
                <button class="btn btn-outline-success my-2 my-sm-0 admin-btn user-change">Изменить</button>
            </div>
        </div>
        
        <div class="row user_change_box">
            <div class="col-lg-12 col-xl-2 item">
                
            </div>
            <div class="col-lg-12 col-xl-3 item" id="name">
                <input type="text" placeholder="Сергей">
                <button>ок</button>
            </div>
            <div class="col-lg-12 col-xl-3 item" id="login">
                <input type="text" placeholder="Admin">
                <button>ок</button>
            </div>
            <div class="col-lg-12 col-xl-3 item" id="pass">
                <input type="text" placeholder="123">
                <button>ок</button>
            </div>
            <div class="col-lg-12 col-xl-1 item" id="change">
                
            </div>
        </div>
        
    </div>
    
    <div class="container admin-users-item">
        <div class="row">
            <div class="col-lg-12 col-xl-2 item">
                <img src="../icon/user.png" class="img-thumbnail">
            </div>
            <div class="col-lg-12 col-xl-3 item" id="name">
                <p class="info-zag">Имя: </p>
                <p class="info">Сергей</p>
            </div>
            <div class="col-lg-12 col-xl-3 item" id="login">
                <p class="info-zag">Логин: </p>
                <p class="info">Admin</p>
            </div>
            <div class="col-lg-12 col-xl-3 item" id="pass">
                <p class="info-zag">Пароль: </p>
                <p class="info">123</p>
            </div>
            <div class="col-lg-12 col-xl-1 item" id="change">
                <button class="btn btn-outline-success my-2 my-sm-0 admin-btn user-change">Изменить</button>
            </div>
        </div>
        
        <div class="row user_change_box">
            <div class="col-lg-12 col-xl-2 item">
                
            </div>
            <div class="col-lg-12 col-xl-3 item" id="name">
                <input type="text" placeholder="Сергей">
                <button>ок</button>
            </div>
            <div class="col-lg-12 col-xl-3 item" id="login">
                <input type="text" placeholder="Admin">
                <button>ок</button>
            </div>
            <div class="col-lg-12 col-xl-3 item" id="pass">
                <input type="text" placeholder="123">
                <button>ок</button>
            </div>
            <div class="col-lg-12 col-xl-1 item" id="change">
                
            </div>
        </div>
        
    </div>
    
    
</div>

<script src="../js/admin_users.js"></script> 
<script src="../js/adminCrud/users.js"></script> 
<?php include('../templates/admin_footer.php') ?>
