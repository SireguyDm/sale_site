<?php 
$custom_wrapper = 'page2wrapper';
$nav_custom = 'page2nav';
$title = 'Заказать тур';
?>
      

<?php include('templates/header.php') ?>

        <h2 class="photo-h2">Выбери тур своей мечты</h2>
        
        <div class="slider-box" style="background: green;">
            <div class="slider">
                <img src="img/Slider/Slider_photo_4.jpg" alt="photo" class="slider_photo">
                <img src="img/Slider/Slider_photo_1.jpg" alt="photo" class="slider_photo">
                <img src="img/Slider/Slider_photo_2.jpg" alt="photo" class="slider_photo">
                <img src="img/Slider/Slider_photo_3.jpg" alt="photo" class="slider_photo">
                <img src="img/Slider/Slider_photo_4.jpg" alt="photo" class="slider_photo">
                <img src="img/Slider/Slider_photo_1.jpg" alt="photo" class="slider_photo">
            </div>
            <button class="next"></button>
            <button class="prev"></button>
        </div>
        

        <p class="gorod_p">
            Город вылета:
            <select class="select_gorod" id="gorod_vilet">
                <option value="">Москва</option>
                <option value="">Санкт-Петербург</option>
                <option value="">Екатеринбург</option>
                <option value="">Новосибирск</option>
                <option value="">Нижний Новгород</option>
            </select>
        </p>

        <div class="vibor-block">

            <div class="pokupka-block">
                <img src="icons_img/compass.png" alt="compas">
                <div>
                    <p>Страна:</p>
                    <select name="country" class="select_gorod" id="vibor_strana">
                        <option value="All">Все</option>
                        <option value="Egypt">Египет</option>
                        <option value="Italy">Италия</option>
                        <option value="Spain">Испания</option>
                        <option value="Turkey">Турция</option>
                        <option value="Thailand">Тайланд</option>
                    </select>
                </div>
            </div>
            <div class="pokupka-block">
                <img src="icons_img/calendar.png" alt="calendar">
                <div>
                    <p>Дата Вылета:</p>
                    <input type="date" id="calendar" max="2018-12-31" min="2018-09-01">
                </div>
            </div>
            <div class="pokupka-block">
                <img src="icons_img/compass.png" alt="compas">
                <div class="nochi">
                    <p>Кол-во ночей:</p>
                    <input type="text" maxlength="2" id="day_count" value="1">
                </div>
            </div>
            <div class="pokupka-block">
                <img src="icons_img/compass.png" alt="compas">
                <div class="nochi" style="width: 220px;">
                    <p>Туристы:</p>
                    <span>Взрослых:</span><input type="text" value="2">
                    <span>Детей:</span><input type="text" value="0">
                </div>
            </div>
            <div class="button-block">
               <button id="search-btn">
                   Искать
               </button>
            </div>
        </div>
        
        <div class="tour_search">
            <?php include('php/hotelsGeneration.php') ?>
        </div>
        
<!--
        <div class="tour_search">
            <div class="tour_block">
                <img src="img/Tours/otel_2.jpg" alt="photo" id="hotel">
                <div class="description">
                    <p class="stars">
                        <img src="icons_img/star.png" alt="star">
                        <img src="icons_img/star.png" alt="star">
                        <img src="icons_img/star.png" alt="star">
                        <img src="icons_img/star.png" alt="star">
                        <img src="icons_img/star.png" alt="star">
                    </p>
                    <p class="Name_hotel">BARUT B SUITES (EX. FAMILY LIFE SIDE, SUNWING) 4*</p>
                    <p class="Hotel_country">Эвренсеки, Сиде, Турция</p>
                    <p class="Hotel_description">Хороший отель в своей категории, уютная зеленная территория. Домашняя атмосфера, вежливы персонал. Есть детская пощадка и собственная танцплощадка на берегу.</p>
                </div>
                <p class="rating">3.4</p>
                <p class="tour_stoim">20000 руб.</p>
                <button>Подробнее</button>
            </div>
        </div>
-->
        <div class="tour_bottom">
            <button>Еще результаты</button>
        </div>
        
        

<script src="js/slider.js"></script>
<script src="js/toursCalc.js"></script>
<?php include('templates/footer.php') ?>
