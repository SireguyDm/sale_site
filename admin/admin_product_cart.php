<?php include('../controllers/admin_header.php') ?>
<link rel="stylesheet" href="../css/style.css">

<div class="article-section">
    <div class="middle-zag">
        <span id="data-id" data-id="">
            Голографический Рюкзак
        </span>
    </div>
    <div class="article-section-item">
        <div class="article-photos">
            <div class="article-photo-div">
                <img src="../pics/tovar/golo/golo1.jpg" class="article-main-photo">
            </div>
            <img src="../pics/tovar/golo/golo1.jpg" class="article-btn-active">
            <img src="../pics/tovar/golo/golo2.jpg" class="article-btn-active">
            <img src="../pics/tovar/golo/golo3.jpg" class="article-btn-active">
        </div>
        <div class="article-left-panel">
            <div class="aritcle-wrapper">
                <div class="article-cost">
                    <div class="article-cost-item">
                        <p class="cost btn-change btn-delete">
                            1350 руб.
                        </p>
                    </div>
                </div>
                <div class="article-text" style="margin: 5px auto 35px;">
                    <div class="article-text-description">
                        <p class="description-zag btn-change btn-delete">Голографический рюкзак</p>
                        <p class="btn-change btn-delete">Привет1</p>
                        <p class="btn-change btn-delete">привет2</p>
                    </div>
                    <div class="article-text-property">
                        <p>Цвет: <span  id="color" class="btn-change btn-delete">Красный</span></p>
                        <p>Размер: <span id="size" class="btn-change btn-delete">32</span></p>
                        <p>Состав: <span id="material" class="btn-change btn-delete">Как дела</span></p>
                        <p>Производство: <span id="country" class="btn-change btn-delete">Китай</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="ModalChange">
    
</div>
<script src="../js/product.js"></script>
<script src="../js/adminCrud/productCart.js"></script>
<?php include('../templates/admin_footer.php') ?>
