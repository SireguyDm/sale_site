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
    
    <!--                                 ТОВАР 1-->
    <div class="basket-product">
        <div class="basket-product-item-left">
            <div class="basket-product-img-div">
                <img src="../pics/tovar/golo/golo1.jpg">
            </div>
            <div class="basket-product-description">
                <p class="basket-product-name">Голо рюкзак</p>
                <p class="basket-product-article">арт. 12552</p>
            </div>
        </div>
        <div class="basket-product-item-right">
            <div class="basket-product-count">
                <p class="basket-cutom-text">1</p>
                <div class="basket-product-btns">
                    <button>+</button>
                    <button>-</button>
                </div>
            </div>
            <p class="basket-cutom-text">3800 руб.</p>
            <button class="basket-btn-delete">&#10006;</button>
        </div>
    </div>
    
    
    <hr class="basket-hr">
    
</div>

<div class="basket-itog">
    <div>
        <p class="basket-cutom-text">Итого:</p>
        <p class="basket-cutom-text" id="basket-itogsumm">13500 руб.</p>
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
    <div class="basket-zag basket-form-zag">
        <h1>Адрес доставки</h1>
        <p>Все поля обязательны для заполнения</p>
    </div>
</div>

<form class="basket-form">
    <div class="basket-form-fio basket-two-in-row">
        <div class="basket-two-in-row-item">
            <p class="form-text">Имя</p>
            <input type="text" class="basket-form-input">
        </div>
        <div class="basket-two-in-row-item">
            <p class="form-text">Фамилия</p>
            <input type="text" class="basket-form-input">
        </div>
    </div>

    <div class="basket-form-adress">
        <p class="form-text">Адресс</p>
        <input type="text" class="basket-form-input">
    </div>

    <div class="basket-two-in-row">
        <div class="basket-two-in-row-item">
            <p class="form-text">Город</p>
            <input type="text" class="basket-form-input">
        </div>
        <div class="basket-two-in-row-item">
            <p class="form-text">Домофон</p>
            <input type="text" class="basket-form-input">
        </div>
    </div>

    <div class="basket-two-in-row">
        <div class="basket-two-in-row-item">
            <p class="form-text">Телефон</p>
            <input type="text" class="basket-form-input">
        </div>
        <div class="basket-two-in-row-item">
            <p class="form-text">E-mail</p>
            <input type="text" class="basket-form-input">
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
        <p class="basket-itog-summ-item-right">12500 руб.</p>
    </div>
    <div class="basket-itog-summ-item">
        <p class="basket-itog-summ-item-left">Доставка:</p>
        <p class="basket-itog-summ-item-right">500 руб.</p>
    </div>
    <div class="basket-itog-summ-item">
        <p class="basket-itog-summ-item-left basket-itog-color">Итого:</p>
        <p class="basket-itog-summ-item-right basket-itog-color">13000 руб.</p>
    </div>
</div>

<div class="basket-oplata">

    <div class="basket-oplata-btn">
        <button>Заказать</button>
    </div>

</div>

<?php include('../templates/footer.php')?>
