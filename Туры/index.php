<?php 
$custom_wrapper = '';
$nav_custom = '';
$title = 'Путешествуй правильно';
?>
      

<?php include('templates/header.php') ?>
       
        <div class="image">
            <div>
                <p>Только красивые путешествия!</p>
                <button id="btn_animation">присоединяйся</button>
            </div>

        </div>
        <h1 id="l2">Путешествуй красиво! Блог в фотографиях</h1>
        <div class="fon">
            <div class="text">
                <div class="textcont">
                    <p>Представьте себе все лучшее, что есть в России: широкие просторы, разнообразная природа, щедрая душа, девушки особой красоты, баня в конце концов. Добавьте к этому все то, чем так привлекательна Москва: гастрономические рестораны, безудержные вечеринки, звезды ТВ и инстаграмма вокруг. Взболтайте, но не смешивайте и получите Розу Хутор 2017 – правильный баланс здорового лайфстайла и роскоши.</p>
                    <p>Красная поляна также радует своей доступностью: перелет занимает 2,5 часа, иметь визу необходимости нет, заказать такси можно через привычное приложение за 1400 руб., а время в пути от аэропорта до отеля составляет менее часа! Ну, где еще такое есть? При этом местная инфраструктура не просто ничуть не уступает Альпам, но и даже предвосхищает ожидания: здесь вкуснее, уютнее и веселее. Я уже не говорю об удивительном контрасте температур – наверху зима, а внизу лето!</p>
                    <p>Более того, несмотря на весну за окном, успеть все это оценить лично совсем не поздно – рекордное количество снега обещает продлить сезон на весь апрель, а курорт тем временем предлагает на этот период очень привлекательные цены!</p>
                    <p>В общем, какое бы время вы ни выбрали, Роза Хутор удивит и подарит желание говорить о России с восторгом!</p>
                </div>
            </div>
        </div>
        <div class="flex1">
            <div class="block1" id="rus">
                <img src="icons_img/moscow.png" alt="moscow" class="imgblock">
                <h2 class="h2block">ПУТЕШЕСТВИЯ ПО РОССИИ</h2>
                <hr class="hrblock">
                <p class="pblock">Самые интересные уголки россии<br> Самые необычные маршруты</p>
            </div>
            <div class="block2" id="eu">
                <img src="icons_img/big-ben.png" alt="big-ben" class="imgblock">
                <h2 class="h2block">ПУТЕШЕСТВИЯ ПО ЕВРОПЕ</h2>
                <hr class="hrblock">
                <p class="pblock">Разные страны, разные культуры, исторические<br>места и все самое интересное в современной<br>Европе!</p>
            </div>
            <div class="block3" id="af">
                <img src="icons_img/pyramids.png" alt="pyramids" class="imgblock">
                <h2 class="h2block">ПУТЕШЕСТВИЯ ПО АФРИКЕ</h2>
                <hr class="hrblock">
                <p class="pblock">Дикая природа, крокодилы, обезьяны, сафари<br>на джипах, гостиницы на деревьях и самые<br>опасные приключения ждут тебя!</p>
            </div>
        </div>
        <div class="flex2">
            <div class="block4" id="na">
                <img src="icons_img/north-america.png" alt="north-america" class="imgblock">
                <h2 class="h2block">ПУТЕШЕСТВИЯ ПО СЕВЕРНОЙ АМЕРИКЕ</h2>
                <hr class="hrblock">
                <p class="pblock">Конечно, мы проедем через всю Америку и<br>побываем как в главных туристических местах<br>так и в уголках, где почти не ступала нога<br>человека.</p>
            </div>
            <div class="block5" id="sa">
                <img src="icons_img/south-america.png" alt="south-america" class="imgblock">
                <h2 class="h2block">ПУТЕШЕСТВИЯ ПО ЮЖНОЙ АМЕРИКЕ</h2>
                <hr class="hrblock">
                <p class="pblock">Южная Америка - место, где хочет побывать<br>каждый. Богатые районы и заброшенные<br>фавелы, опасности и приключения,<br>темпераментные люди и многое другое на<br>страницах наших путешествий.</p>
            </div>
            <div class="block6" id="av">
                <img src="icons_img/kangaroo.png" alt="kangaroo" class="imgblock">
                <h2 class="h2block">ПУТЕШЕСТВИЯ ПО АВСТРАЛИИ</h2>
                <hr class="hrblock">
                <p class="pblock">Мы побываем на отдельном континенте.<br>Почему то думая об Австралии, сразу<br>представляешь кенгуру, хотя это совершенно<br>не символ страны.</p>
            </div>
        </div>
        <div class="animation">
            <div class="animation animation_window">
                <div class="human">
                    <img src="img/Animation/fuego.png" class="fire">
                    <div class="clouds">
                        <img src="img/Animation/nube1.png" id="wave1">
                        <img src="img/Animation/nube2.png" id="wave2">
                        <img src="img/Animation/nube3.png" id="wave3">
                        <img src="img/Animation/nube3.png" id="wave4">
                        <img src="img/Animation/nube1.png" id="wave5">
                    </div>
                </div>
            </div>
        </div>


<script src="js/animation.js"></script>
<?php include('templates/footer.php') ?>