<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,500,600,700|Exo+2:400,500,600,700,800,900|Yanone+Kaffeesatz:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    
    
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/menu.js"></script>
    
</head>

<body>
    <div class="wrapper <?php echo $custom_wrapper ?>" id="href_top">
        <nav class="<?php echo $nav_custom ?>">
            <a class="icon" href="../index.php"></a>
            <a href="../index.php">Главная</a>
            <a href="../F.A.Q.php">F.A.Q</a>
            <a href="../Photo.php">Галерея</a>  
            <a href="../oplata.php">Заказать тур</a>  
            <a id="etc">Прочее</a> 
            <div class="nav_prochee">
                <a href="">Новости</a>
                <a href="">Отзывы о нас</a>
                <a href="">Акции</a>
                <a href="">Подписка</a>
            </div> 
            <a href="#href_footer" id="contact_scroll">Контакты</a>
        </nav>
        
       