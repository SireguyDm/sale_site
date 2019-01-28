<?php 
$title = 'Рюкзаки';
$php_selector = 'Рюкзак';
$php_selector2 = 'Сумка';
?>

<?php include('templates/header.php') ?>


<div class="middle-section">
    <div class="middle-zag">
        <span>Рюкзаки</span>
    </div>
    <div class="catalog-product">
        
        <?php include('php/articles_generation.php') ?>
        
    </div>
</div>
</div>


<?php include('templates/footer.php')?>
