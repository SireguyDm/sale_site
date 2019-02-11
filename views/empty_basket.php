<?php include('../controllers/header.php') ?>


<div class="basket-zag">
    <h1>Ваша корзина</h1>
    <p>Товары резервируются на ограниченное время</p>
</div>

<div class="basket">
    <div class="basket-header">
        <div class="basket-header-item basket-header-left">
            <p>Фото</p>
            <p>Наименование</p>
        </div>
        <div class="basket-header-item basket-header-right">
            <p>Количество</p>
            <p>Стоимость</p>
            <p>Удалить</p>
        </div>
    </div>
    
    <hr class="basket-hr">
    
    <h2 class="empty_basket">В вашей корзине ничего нет</h2>
</div>
<hr class="basket-hr">
<div class="basket-wave">
    <img src="../icon/down-arrow.png">
    <img src="../icon/down-arrow.png" id="basket-2-wave">
    <img src="../icon/down-arrow.png" id="basket-3-wave">
</div>
<?php include('../templates/footer.php')?>
