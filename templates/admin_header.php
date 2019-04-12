<!doctype html>
<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin_style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
    
    <script src="../js/jquery-3.3.1.js"></script>
    
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
                    <a class="nav-link mr-3 admin_menu_orders" href="../controllers/admin_main_page.php">Главная / Заказы 
                    <?php 
                        if (isset($_COOKIE['orders_count']) && $order_count != 0){
                            echo '<span class="badge badge-pill badge-success order_counter">'.$order_count.'</span>';
                        }    
                    ?>
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown mr-3">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Просмотреть / изменить
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item admin_menu_orders" href="../controllers/admin_main_page.php">Заказы 
                            <?php 
                                if (isset($_COOKIE['orders_count']) && $order_count != 0){
                                    echo '<span class="badge badge-pill badge-success order_counter">'.$order_count.'</span>';
                                }    
                            ?>
                        </a>
                        <a class="dropdown-item" href="../controllers/admin_products.php">Товары</a>
                        <a class="dropdown-item" href="../controllers/admin_callback.php">Обратные звоноки
                        <?php 
                            if (isset($_COOKIE['cb_count']) && $cookie_cb_html != 0){
                                echo '<span class="badge badge-pill badge-success ml-1 cb_counter">'.$cookie_cb_html.'</span>';
                            }    
                        ?>
                        </a>
                        <a class="dropdown-item" href="../controllers/admin_users.php">Пользователи</a>
                        <a class="dropdown-item" href="../controllers/admin_category.php">Категории</a>
                        <a class="dropdown-item" href="../controllers/admin_status.php">Статусы</a>
                        <a class="dropdown-item" href="../controllers/admin_brand.php">Бренды</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <p class="admin_nav_p">Добро пожаловать, <span id="nav_admin_user"><?php echo $user_name ?></span></p>
                <a class="btn btn-outline-success my-2 my-sm-0" id="unauth" href="../php/unauth.php">Выход</a>
            </form>
        </div>
    </nav>