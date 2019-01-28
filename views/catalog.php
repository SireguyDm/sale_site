<?php include('../controllers/header.php') ?>

<div class="middle-section">
    <div class="middle-zag">
        <span>
            <?php 
                echo $category->title; 
            ?>
        </span>
    </div>
    <div class="catalog-product">

    <?php 
            foreach ($products as $product) {
                
                if ($product->old_cost == '0'){
                    $old_cost = '';
                } else {
                    $old_cost = $product->old_cost.' руб.';
                }
                
                echo '
                    <div class="offers-item">
                    <a href="product.php?product_id='.$product->id.'">
                        <img src="../pics/tovar/'.$product->img.'/'.$product->img.'1.jpg">
                        <div class="offers-item-disc">
                            <p>'.$product->title.'</p>
                            
                        </div>
                        <div class="offers-cost">
                            <p class="cost">'.$product->cost.' руб.</p>
                            <p class="old-cost">'.$old_cost.'</p>
                        </div>
                    </a>
                    </div>
                ';
            }
    ?>

    </div>
</div>

<?php include('../templates/footer.php')?>
