<?php include('../controllers/header.php') ?>
       
           
        <div class="slider-box">
            <div class="slider">
                <div class="slider-item-3"></div>
                <div class="slider-item-1"></div>
                <div class="slider-item-2"></div>
                <div class="slider-item-3"></div>
                <div class="slider-item-1"></div>
            </div>
            <button class="next"><img src="../icon/arrow.png"></button>
            <button class="prev"><img src="../icon/arrow.png"></button>
        </div>
        <div class="middle-catalog">
            <div class="middle-zag">
                <span>КАТАЛОГ</span>
            </div>
            <div class="inner-wrapper">
               <div class="catalog-choice">
                   <?php 
                        foreach ($categories as $category){
                            if ($category->status === 'active'){
                            echo
                            '
                                <div class="catalog-choice-item">
                                    <a href="../controllers/catalog.php?category_id='.$category->id.'" style="background: url(../pics/category/'.$category->title.'.jpg);"><div class="catalog-choice-item-back"></div></a>
                                    <p>'.$category->title.'</p>
                                </div>
                            ';
                            }
                        }
                    
                   ?>
<!--
                    <div class="catalog-choice-item">
                        <a href="../controllers/catalog.php?category_id=1" class="watch"><div class="catalog-choice-item-back"></div></a>
                        <p>Часы</p>
                    </div>
                    <div class="catalog-choice-item">
                        <a href="../controllers/catalog.php?category_id=3" class="backpack"><div class="catalog-choice-item-back"></div></a>
                        <p>Рюкзаки / Сумки</p>
                    </div>
                    <div class="catalog-choice-item">
                        <a href="../controllers/catalog.php?category_id=2" class="toys"><div class="catalog-choice-item-back"></div></a>
                        <p>Наушники</p>
                    </div>
-->
                </div>
                
                <div class="offers" id="sale-offers">
                    <div class="middle-zag">
                        <span>ВЕЩИ СО СКИДКОЙ</span>
                    </div>
                    <div class="sale-slider-box">
                        <div class="sale-box">
                            <div class="sale-slider">
                               
<!--
                                <div class="slider-item">
                                    <a >
                                        <img src="../pics/tovar/golo/golo1.jpg">
                                        <div class="slider-i-desc">
                                            <p>Голо рюкзак</p>
                                        </div>
                                        <div class="slider-i-cost">
                                            <p class="s-i-c-new">2000 руб.</p>
                                            <p class="s-i-c-old">2500 руб.</p>
                                        </div>
                                    </a>
                                </div>
-->

                                <?php 
                                foreach ($products as $product) {
                                    if ($product->old_cost !== '0'){
                                        echo 
                                        '
                                        <div class="slider-item">
                                            <a href="../controllers/product.php?product_id='.$product->id.'">
                                                <img src="../pics/tovar/'.$product->img.'/'.$product->img.'1.jpg">
                                                <div class="slider-i-desc">
                                                    <p>'.$product->title.'</p>
                                                </div>
                                                <div class="slider-i-cost">
                                                    <p class="s-i-c-new">'.$product->cost.' руб.</p>
                                                    <p class="s-i-c-old">'.$product->old_cost.' руб.</p>
                                                </div>
                                            </a>
                                        </div>
                                        ';
                                    }
                                }   
                                ?>
                                
                            </div>
                        </div>
                        <button id="slider-next"></button>
                        <button id="slider-prev"></button>
                    </div>
                   
                   
            </div>
                                    
                 <div class="advantages">
                     <div class="advantages-item">
                         <img src="../icon/medal.png">
                         <h3>Высокое качество</h3>
                         <p>Мы тщательно подобрали для Вас лучшие модели, нам доставляют товары исключительно серцифицированные поставщики.</p>
                     </div>
                     <div class="advantages-item">
                        <img src="../icon/valentines-day-date.png">
                         <h3>Дней на возврат</h3>
                         <p>В случае, если вам не понравился товар, вы можете вернуть его в течение 14 дней после заказа, при сохранении товарного вида</p>
                     </div>
                     <div class="advantages-item">
                         <img src="../icon/giftbox.png">
                         <h3>Подарок при заказе</h3>
                         <p>После заказа Вы получите уникальный промокод на скидку до 25%!</p>
                         
                     </div>
                </div>
                <div class="middle-zag">
                    <span id="delivery-target">ДОСТАВКА</span>
                </div>
                <div class="delivery">
                    <div class="delivery-item delivery-item-before">
                        <img src="../icon/d1.jpg">
                        <h3>ОСТАВЬТЕ ЗАЯВКУ</h3>
                        <p>Выберите товар и заполните форму заказа</p>
                    </div>
                    <div class="delivery-item delivery-item-before">
                        <img src="../icon/d2.jpg">
                        <h3>ПОДТВЕРДИТЕ ЗАКАЗ</h3>
                        <p>Наши сотрудники свяжутся с Вами для уточнения заказа</p>
                    </div>
                    <div class="delivery-item delivery-item-before">
                        <img src="../icon/d3.jpg">
                        <h3>ЗАБЕРИТЕ СВОЙ ЗАКАЗ</h3>
                        <p>Мы отправим Ваш заказ курьером в удобное для Вас место</p>
                    </div>
                    <div class="delivery-item">
                        <img src="../icon/d4.jpg">
                        <h3>ОПЛАТИТЕ ПРИ ПОЛУЧЕНИИ</h3>
                        <p>Никаких предоплат! Оплата осуществляется по факту получения заказа</p>
                    </div>
                </div>
                <div class="delivery-more">
                    <img src="../icon/package.png">
                    <div class="delivery-more-text">
                        <p class="delivery-more-text-zag">СТОИМОСТЬ ДОСТАВКИ 300 руб.</p>
                        <p>Доставка осуществляется:
                        <br>В рабочие дни с 10:00 до 19:00 
                        <br>В субботу с 10:00 до 18:00.</p>
                    </div>
                </div>
            </div>
        </div>
    
    
<script src="../js/slider.js"></script>    
<script src="../js/sale-slider.js"></script>    
<?php include('../templates/footer.php')?>
