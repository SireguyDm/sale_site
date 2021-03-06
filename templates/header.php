<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="../css/global.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/jquery.maskedinput.min.js"></script>
    <script src="../js/main.js"></script>

</head>

<body>
   
    <div class="wrapper">
        <nav>
           <div class="hat">
               <div class="hat-item">
                   <p>Доставка осуществляется только по <span>Москве</span></p>
                   <p>После заказа вы получите скидочный промокод</p>
               </div>
           </div>
            <div class="panel">
                <div class="logo">
                    <a href="../controllers/main_page.php"></a>
                    <p>SHOP<span class="another-color">SER</span></p>
                </div>
                <div class="panel-advant">
                    <div class="panel-advant-item">
                        <img src="../icon/delivery-truck.png">
                        <p>
                            БЕСПЛАТНАЯ ДОСТАВКА ОТ 5000 РУБЛЕЙ
                        </p>
                    </div>
                    <div class="panel-advant-item">
                        <img src="../icon/discount.png" class="panel-icon-delivery">
                        <p>
                            Введите промокод в окно заказа и получите скидку
                        </p>
                    </div>
                </div>
                <div class="panel-info">
                    <p>8(495) 372-68-11 </p>
                    <p>8(495) 372-45-95 </p>
                    <p class="panel-info-time">с 9 до 21 без выходных</p>
                </div>

                <a href="../controllers/basket.php" class="bag">
                    <div class="bag-item">
                        <img src="../icon/basket.png">
                        <p>Корзина</p>
                        <?php 
                            if (isset($_COOKIE['basket_count'])){
                                if ($basket_count != 0){
                                    echo '<span id="basket_count">'.$basket_count.'</span>';
                                }
                            }
                        ?>
                    </div>
                </a>
            </div>

            <div class="menu">
                <div class="menu-catalog">
                    <a href="../controllers/main_page.php">Главная</a>
                    <a href="../controllers/catalog.php?category_id=1">Часы</a>
                    <a href="../controllers/catalog.php?category_id=2">Наушники</a>
                    <a href="../controllers/catalog.php?category_id=3">Рюкзаки</a>
                </div>
                <div class="menu-other">
                    <a href id="menu-delivery">Доставка</a>
                    <a href="../controllers/catalog.php?category_id=sale">Скидки</a>
                    <a href id="menu-contacts">Контакты</a>
                </div>
                <div class="menu-search">
                    <input type="text" maxlength="64"  autocomplete="off" placeholder="Поиск" id="search-input">
                    <span class="search-btn"></span>
                    <div class="search-list"></div>
                </div>
            </div>
        </nav>
        