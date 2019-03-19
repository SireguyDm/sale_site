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

    <div class="products-list"></div>
    
    <hr class="basket-hr">

</div>

<div class="basket-itog">
    <div>
        <p class="basket-cutom-text">Итого:</p>
        <p class="basket-cutom-text" id="basket-itogsumm">0 руб.</p>
    </div>
</div>

<hr class="basket-hr">
<div class="basket-wave">
    <img src="../icon/down-arrow.png">
    <img src="../icon/down-arrow.png" id="basket-2-wave">
    <img src="../icon/down-arrow.png" id="basket-3-wave">
</div>
<hr class="basket-hr">

<div>
    <div class="basket-zag basket-form-zag" id="form-zag">
        <h1>Адрес доставки</h1>
        <p>Поля, обязательные для заполнения, обозначаются *</p>
    </div>
</div>

<form class="basket-form">
    <div class="basket-form-fio basket-two-in-row">
        <div class="basket-two-in-row-item">
            <p class="form-text required">Имя (обязательно)</p>
            <input type="text" class="basket-form-input" id="order-name">
        </div>
        <div class="basket-two-in-row-item">
            <p class="form-text">Фамилия</p>
            <input type="text" class="basket-form-input" id="order-second-name">
        </div>
    </div>

    <div class="basket-form-adress">
        <p class="form-text required">Адресс (обязательно)</p>
        <input type="text" class="basket-form-input" id="order-adress">
    </div>

    <div class="basket-two-in-row">
        <div class="basket-two-in-row-item">
            <p class="form-text required">Город (обязательно)</p>
            <input type="text" class="basket-form-input" id="order-city">
        </div>
        <div class="basket-two-in-row-item">
            <p class="form-text">Домофон</p>
            <input type="text" class="basket-form-input" id="order-domofon">
        </div>
    </div>
    <div class="basket-two-in-row">
        <div class="basket-two-in-row-item">
            <p class="form-text required">Телефон (обязательно)</p>
            <input type="tel" class="basket-form-input" id="order-tel" placeholder="+7 (___) ___-__-__">
        </div>
        <div class="basket-two-in-row-item">
            <p class="form-text">E-mail</p>
            <input type="text" class="basket-form-input" id="order-email">
        </div>
    </div>
</form>

<hr class="basket-hr">
<div class="basket-wave">
    <img src="../icon/down-arrow.png">
    <img src="../icon/down-arrow.png" id="basket-2-wave">
    <img src="../icon/down-arrow.png" id="basket-3-wave">
</div>
<hr class="basket-hr">

<div class="basket-zag basket-oplata-zag">
    <h1>К ОПЛАТЕ</h1>
</div>
<div class="basket-itog-summ">
    <div class="basket-itog-summ-item">
        <p class="basket-itog-summ-item-left">Стоимость:</p>
        <p class="basket-itog-summ-item-right" id="products_summ" data-summ="false">0 руб.</p>
    </div>
    <div class="basket-itog-summ-item">
        <p class="basket-itog-summ-item-left">Доставка:</p>
        <p class="basket-itog-summ-item-right" data-delivery="500" id="form_delivery">500 руб.</p>
    </div>
    <div class="basket-itog-summ-item">
        <p class="basket-itog-summ-item-left basket-itog-color">Итого:</p>
        <p class="basket-itog-summ-item-right basket-itog-color" id="itog_summ" data-itog="false">500 руб.</p>
    </div>
</div>

<div class="basket-oplata">

    <div class="basket-oplata-btn">
        <button id="order">Заказать</button>
    </div>

</div>


<script src="../js/basket_products.js"></script>
<script src="../js/create_order.js"></script>
<?php include('../templates/footer.php')?>
