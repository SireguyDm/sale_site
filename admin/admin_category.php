<?php include('../controllers/admin_header.php') ?>

<h1 class="text-center mt-4 mb-5">Категории</h1>

<div class="row text-center admin-category">
    
    
    <?php 
        
        foreach ($categories as $category){
            echo 
            '
                <div class="col-sm h5 admin-category-item">
                    <img src="../pics/category/'.$category->title.'.jpg" class="img-thumbnail">
                    <form action="../php/category_update.php?category_id='.$category->id.' method="post">
                        <input type="text" name="title" placeholder="'.$category->title.'" disabled class="category_input">
                        <button class="admin_category_change">Принять</button>
                    </form>
                    <button class="btn btn-outline-success my-2 my-sm-0 admin-btn category-change">Изменить</button>
                </div>
            ';
                  
        }
        
    ?>
    
<!--
    <div class="col-sm h5 admin-category-item">
        <img src="../pics/category/%D0%A7%D0%B0%D1%81%D1%8B.jpg" class="img-thumbnail">
        <form action="">
            <input type="text" placeholder="Часы" disabled class="category_input">
            <button class="admin_category_change">Принять</button>
        </form>
        <button class="btn btn-outline-success my-2 my-sm-0 admin-btn category-change">Изменить</button>
    </div>
-->
</div>

<script src="../js/adminCrud/category.js"></script>
<?php include('../templates/admin_footer.php') ?>
