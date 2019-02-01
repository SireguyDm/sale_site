<?php 

    if ($products->old_cost == '0'){
        $old_cost = '';
    } else {
        $old_cost = '<p class="old-cost">'.$products->old_cost.' руб.</p>';
    }

    include('../controllers/header.php')
?>

<div class="article-section">
    <div class="middle-zag">
        <span id="data-id" data-id="<?php echo $products->id ?>">
            <?php echo $products->title ?>  
        </span>
    </div>
    <div class="article-section-item">
        <div class="article-photos">
            <div class="article-photo-div">
                <img src="../pics/tovar/<?php echo $products->img ?>/<?php echo $products->img ?>1.jpg" class="article-main-photo">
            </div>
            <img src="../pics/tovar/<?php echo $products->img ?>/<?php echo $products->img ?>1.jpg" class="article-btn-active">
            <img src="../pics/tovar/<?php echo $products->img ?>/<?php echo $products->img ?>2.jpg" class="article-btn-active">
            <img src="../pics/tovar/<?php echo $products->img ?>/<?php echo $products->img ?>3.jpg" class="article-btn-active">
        </div>
        <div class="article-left-panel">
            <div class="aritcle-wrapper">
                <div class="article-cost">
                    <div class="article-cost-item">
                        <p class="cost">
                            <?php echo $products->cost ?> руб.
                        </p>
                        <?php echo $old_cost ?>
                    </div>
                </div>
                <div class="panel-advant">
                    <div class="article-panel-wrapper">
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
                </div>
                <div class="article-buttons">
                    <button id="add_article">
                        <img src="../icon/shopping-basket.png">
                        <span>В корзину</span>
                    </button>
                    <button class="article-btn-answ">
                        <span>Остались вопросы? Ответим!</span>
                    </button>
                </div>

                <div class="article-text">
                    <div class="article-text-description">
                        <p class="description-zag"><?php echo $descriptions->zag ?></p>
                        <p><?php echo $descriptions->p1 ?></p>
                        <p><?php echo $descriptions->p2 ?></p>
                    </div>
                    <div class="article-text-property">
                        <p>Цвет: <span  id="color"><?php echo $descriptions->color ?></span></p>
                        <p>Размер: <span id="size"><?php echo $descriptions->size ?></span></p>
                        <p>Состав: <span id="material"><?php echo $descriptions->material ?></span></p>
                        <p>Производство: <span id="country"><?php echo $descriptions->country ?></span></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="succes-window">
    <img src="../icon/check.png">
    <h1>Товар успешно добавлен в корзину</h1>
</div>

<script src="../js/product.js"></script>
<script src="../js/add_to_basket.js"></script>
<?php include('../templates/footer.php')?>
