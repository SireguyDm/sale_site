<?php include('../controllers/admin_header.php') ?>

    <h1 class="text-center mt-4 mb-4">Заказы</h1>

    <div class="admin_zakazi">

        <div class="alert alert-success " role="alert" id="admin_basket">
            <h3 id="order-status">Ожидает</h3>
            <h4 class="alert-heading admin_time text-center">29.01.2019: 22:40</h4>
            <p class="text-center h4" id="user_name">Сергей <span id="user-f">Дмитренко</span></p>
            <p class="h5 admin_basket_row mt-4">Телефон: <span>8(910)44-666-51</span></p>
            <p class="h5 admin_basket_row">E-mail: <span>devilserser@yandex.ru</span></p>
            <p class="h5 admin_basket_row mt-3">Адресс: <span>Ул. рязанский проспект 85к2 кв 47</span></p>
            <p class="h5 admin_basket_row">Домофон: <span>47к8910</span></p>

            <hr>

            <div class="row text-center" >
                <div class="col-4 h5">
                    Товар
                </div>
                <div class="col-4 h5">
                    Доп.
                </div>
                <div class="col-4 h5">
                    Цена
                </div>
            </div>
            
            <div class="row text-center admin_basket_item mt-2 mb-2" >
                <div class="col-4 h5">
                    Голографический рюкзак
                </div>
                <div class="col-4 h5">
                    Синий
                </div>
                <div class="col-4 h5">
                    2050 руб.
                </div>
            </div>
            
            <div class="text-center mt-4 order_status" >
                    <p>Изменить статус: </p>
                    <select name="status" id="">
                        <option value="">Ожидает</option>
                        <option value="">Доставлен</option>
                    </select>
                    <button>Сохранить</button>
            </div>
            
        </div>
    </div>

<?php include('../templates/admin_footer.php') ?>