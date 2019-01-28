<?php

include('php/db.php');

$article_id = $_GET['id'];

$query_art = "SELECT * FROM article WHERE article_id=$article_id";
$result_art = mysqli_query($link, $query_art);
$article = mysqli_fetch_assoc($result_art);

$currect_article = $article['article_name'];

$query_dis = "SELECT * FROM descriptions LEFT JOIN article ON descriptions.article_name = article.article_name WHERE article.article_name = '$currect_article'";
$result_dis = mysqli_query($link, $query_dis);
$description = mysqli_fetch_assoc($result_dis);


if ($article['article_old_cost'] == '0'){
        $old_cost = '';
} else {
        $old_cost = '<p class="old-cost">'.$article['article_old_cost'].' руб.</p>';
}

?>


<?php 
$title = $article['article_name'];
?>

<?php include('templates/header.php')?>


<div class="article-section">
    <div class="middle-zag">
        <span>
            <?php echo $article['article_name'] ?>  
        </span>
    </div>
    <div class="article-section-item">
        <div class="article-photos">
            <div class="article-photo-div">
                <img src="pics/tovar/<?php echo $article['article_img_path'] ?>/<?php echo $article['article_img_path'] ?>1.jpg" class="article-main-photo">
            </div>
            <img src="pics/tovar/<?php echo $article['article_img_path'] ?>/<?php echo $article['article_img_path'] ?>1.jpg" class="article-btn-active">
            <img src="pics/tovar/<?php echo $article['article_img_path'] ?>/<?php echo $article['article_img_path'] ?>2.jpg" class="article-btn-active">
            <img src="pics/tovar/<?php echo $article['article_img_path'] ?>/<?php echo $article['article_img_path'] ?>3.jpg" class="article-btn-active">
        </div>
        <div class="article-left-panel">
            <div class="aritcle-wrapper">
                <div class="article-cost">
                    <div class="article-cost-item">
                        <p class="cost">
                            <?php echo $article['article_cost'] ?> руб.
                        </p>
                        <?php echo $old_cost ?>
                    </div>
                </div>
                <div class="panel-advant">
                    <div class="article-panel-wrapper">
                        <div class="panel-advant-item">
                            <img src="icon/delivery-truck.png">
                            <p>
                                БЕСПЛАТНАЯ ДОСТАВКА ОТ 5000 РУБЛЕЙ
                            </p>
                        </div>
                        <div class="panel-advant-item">
                            <img src="icon/discount.png" class="panel-icon-delivery">
                            <p>
                                Введите промокод в окно заказа и получите скидку
                            </p>
                        </div>
                    </div>
                </div>
                <div class="article-buttons">
                    <button id="add_article">
                        <img src="icon/shopping-basket.png">
                        <span>В корзину</span>
                    </button>
                    <button class="article-btn-answ">
                        <span>Остались вопросы? Ответим!</span>
                    </button>
                </div>

                <div class="article-text">
                    <div class="article-text-description">
                        <p class="description-zag"><?php echo $description['description_zag'] ?></p>
                        <p><?php echo $description['description_p1'] ?></p>
                        <p><?php echo $description['description_p2'] ?></p>
                    </div>
                    <div class="article-text-property">
                        <p>Цвет: <span><?php echo $description['color'] ?></span></p>
                        <p>Размер: <span><?php echo $description['size'] ?></span></p>
                        <p>Состав: <span><?php echo $description['material'] ?></span></p>
                        <p>Производство: <span><?php echo $description['country'] ?></span></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="offers">
        <div class="middle-zag article-zag">
            <span>ВАМ МОЖЕТ ПОНРАВИТЬСЯ</span>
        </div>

        <div class="inner-wrapper">
            <a href="">
                <div class="offers-item">
                    <img src="pics/tovar/rabbit.jpg">
                    <div class="offers-item-disc">
                        <p class="offers-before">Кролик</p>
                        <p>Рюкзак</p>
                    </div>
                    <div class="offers-cost">
                        <p class="cost">1650 руб.</p>
                        <p class="old-cost">2100 руб.</p>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="offers-item">
                    <img src="pics/tovar/oonies.jpg">
                    <div class="offers-item-disc">
                        <p class="offers-before">Oonies</p>
                        <p>Игрушки</p>
                    </div>
                    <div class="offers-cost">
                        <p class="cost">1500 руб.</p>
                        <p class="old-cost"></p>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="offers-item">
                    <img src="pics/tovar/koshpo.jpg">
                    <div class="offers-item-disc">
                        <p class="offers-before">Кашпо</p>
                        <p>Игрушки</p>
                    </div>
                    <div class="offers-cost">
                        <p class="cost">1350 руб.</p>
                        <p class="old-cost">1560 руб.</p>
                    </div>
                </div>
            </a>


            <a href="">
                <div class="offers-item unic">
                    <img src="pics/tovar/miband3.jpg">
                    <div class="offers-item-disc">
                        <p class="offers-before">Mi band 3</p>
                        <p>Часы</p>
                    </div>
                    <div class="offers-cost">
                        <p class="cost">2450 руб.</p>
                        <p class="old-cost"></p>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="offers-item">
                    <img src="pics/tovar/golo.jpg">
                    <div class="offers-item-disc">
                        <p class="offers-before">Голо-рюкзак</p>
                        <p>Рюкзак</p>
                    </div>
                    <div class="offers-cost">
                        <p class="cost">1650 руб.</p>
                        <p class="old-cost"></p>
                    </div>
                </div>
            </a>

        </div>
    </div>
</div>

</div>

<script src="js/buttons.js"></script>
<?php include('templates/footer.php')?>
