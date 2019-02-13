<!doctype html>
<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin_style.css">
    
    <script src="../js/jquery-3.3.1.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
    <title><?php echo $admin_title ?></title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand mr-5" href="../controllers/admin_main_page.php">Панель администратора</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link mr-3" href="../controllers/admin_main_page.php">Главная / Заказы <span class="badge badge-pill badge-success">22</span><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown mr-3">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Просмотреть
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../controllers/admin_main_page.php">Заказы <span class="badge badge-pill badge-success">22</span></a>
                        <a class="dropdown-item" href="#">Обратный звонок <span class="badge badge-pill badge-success">2</span></a>
                        <a class="dropdown-item" href="#">Пользователи</a>
                        <a class="dropdown-item" href="#">Заказы ( архив ) <span class="badge badge-pill badge-success">22</span></a>
                        <a class="dropdown-item" href="#">Статистика</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Изменить
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../controllers/admin_category.php">Категории</a>
                        <a class="dropdown-item" href="#">Товар</a>
                        <a class="dropdown-item" href="../controllers/admin_users.php">Пользователи</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <p class="admin_nav_p">Добро пожаловать, <span id="nav_admin_user"><?php echo $user_name ?></span></p>
                <a class="btn btn-outline-success my-2 my-sm-0" id="unauth" href="../php/unauth.php">Выход</a>
            </form>
        </div>
    </nav>