<?php include('../controllers/header.php') ?>

<?php
  
    if ($products->prod_count > 0){
        if ($products->old_cost !== '0'){
            $old_cost = '<p class="old-cost">'.$products->old_cost.' руб.</p>';
        } else {
            $old_cost = '';
        }
        $html_cost = '<p class="cost">'.$products->cost.' руб.</p>'.$old_cost;
    } else {
        $html_cost = '<p class="product-stock">Нет в наличии</p>';
    }
    
?>

<div class="article-section">
    <div class="middle-zag">
        <span id="data-id" data-id="<?php echo $products->id ?>">
            <?php echo $products->brand_title.' / '.$products->title ?>
        </span>
    </div>
    <div class="article-section-item">
        <div class="article-photos">
            <div class="article-photo-div">
                <img src="../pics/tovar/<?php echo $products->img ?>/<?php echo $products->img ?>1.jpg" class="article-main-photo first_img">
            </div>
            <img src="../pics/tovar/<?php echo $products->img ?>/<?php echo $products->img ?>1.jpg" class="article-btn-active first_img">
            <?php
                echo (file_exists('../pics/tovar/'.$products->img.'/'.$products->img.'2.jpg') ? '<img src="../pics/tovar/'.$products->img.'/'.$products->img.'2.jpg" class="article-btn-active">' : false);
            ?>
            <?php
                echo (file_exists('../pics/tovar/'.$products->img.'/'.$products->img.'3.jpg') ? '<img src="../pics/tovar/'.$products->img.'/'.$products->img.'3.jpg" class="article-btn-active">' : false);
            ?>
        </div>
        <div class="article-left-panel">
            <div class="aritcle-wrapper">
                <div class="article-cost">
                    <div class="article-cost-item">
                        <?php 
                            echo $html_cost;
                        ?>
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
                <?php 
                    if ($products->prod_count > 0){
                        echo '
                        <div class="article-buttons">
                            <button id="add_article">
                                <img src="../icon/shopping-basket.png">
                                <span>В корзину</span>
                            </button>
                            <button class="article-btn-answ call-back-activator">
                                <span>Остались вопросы? Ответим!</span>
                            </button>
                        </div>';
                    }
                ?>
                

                <div class="article-text">
                    <div class="article-text-description">
                        <?php 
                            echo ($descriptions->zag !== 'null' && $descriptions->zag !== 'false' ? '<p class="description-zag">'.$descriptions->zag.'</p>' : false); 
                        ?>
                        <?php 
                            echo ($descriptions->p1 !== 'null' && $descriptions->p1 !== 'false' ? '<p>'.$descriptions->p1.'</p>' : false); 
                        ?>
                        <?php 
                            echo ($descriptions->p2 !== 'null' && $descriptions->p2 !== 'false' ? '<p>'.$descriptions->p2.'</p>' : false); 
                        ?>
                    </div>
                    <div class="article-text-property">
                        <?php 
                            echo ($descriptions->color !== 'null' && $descriptions->color !== 'false'? '<p>Цвет: <span  id="color">'.$descriptions->color.'</span></p>' : false); 
                        ?>
                        <?php 
                            echo ($descriptions->size !== 'null' && $descriptions->size !== 'false' ? '<p>Размер: <span id="size">'.$descriptions->size.'</span></p>' : false); 
                        ?>
                        <?php 
                            echo ($descriptions->material !== 'null' && $descriptions->material !== 'false'? '<p>Состав: <span id="material">'.$descriptions->material.'</span></p>' : false); 
                        ?>
                        <?php 
                            echo ($descriptions->country !== 'null' && $descriptions->country !== 'false' ? '<p>Производство: <span id="country">'.$descriptions->country.'</span></p>' : false); 
                        ?>
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
