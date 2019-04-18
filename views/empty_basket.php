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
    
    <hr class="basket-hr">
    <div class="basket-wave">
        <img src="../icon/down-arrow.png">
        <img src="../icon/down-arrow.png" id="basket-2-wave">
        <img src="../icon/down-arrow.png" id="basket-3-wave">
    </div>
    
    <div class="inner-wrapper">
        <div class="offers" id="sale-offers">
            <div class="middle-zag">
                <span>ВОЗМОЖНО ВАС ЗАИНТЕРЕСУЕТ</span>
            </div>
            <div class="sale-slider-box">
                <div class="sale-box">
                    <div class="sale-slider">
                        <?php 
                            foreach ($randomProducts as $product) {
                                
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
                              
                        ?>
                </div>
            </div>
            <button id="slider-next"></button>
            <button id="slider-prev"></button>
            </div>
        </div>
    </div>
</div>


<script src="../js/sale-slider.js"></script>   
<?php include('../templates/footer.php')?>
