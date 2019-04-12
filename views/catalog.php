<?php include('../controllers/header.php') ?>

<div class="middle-section">
    <div class="middle-zag">
        <span id="catalog_id" data-category_id="<?php echo $category_id ?>">
            <?php 
                echo $title; 
            ?>
        </span>
    </div>
    
    <div class="catalog">
        <div class="brand-box">
            <h2>Бренд</h2>
            <p class="brand-item brand-active" data-brand="">Все</p>
            <?php  
                foreach ($brands as $brand){
                    echo '<p class="brand-item" data-brand="'.$brand->id.'">'.$brand->brand_title.'</p>';
                } 
            ?>
        </div>
        <div class="catalog-section">
            <div class="catalog-filter">
                <p>Сортировать: </p>
                <div class="catalog-filter-item filter-cost" data-action="none" data-type="cost">
                    По цене
                    <div class="filter-img"></div>
                </div>
                <div class="catalog-filter-item filter-name" data-action="none" data-type="name">
                    По имени
                    <div class="filter-img"></div>
                </div>
            </div>
            <div class="catalog-product"></div>
            <div class="pagination"></div>
        </div>
              
    </div>    
</div>




<script src="../js/pagintaion.js"></script>
<script src="../js/get_catalog.js"></script>
<?php include('../templates/footer.php')?>
