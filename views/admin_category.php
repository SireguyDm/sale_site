<?php include('../templates/admin_header.php') ?>

<h1 class="text-center mt-4 mb-5">Категории</h1>

<div class="row text-center admin-category">
    
    <div class="col-sm h5 admin-category-item">
        <img src="../pics/category/%D0%9D%D0%B0%D1%83%D1%88%D0%BD%D0%B8%D0%BA%D0%B8.jpg" class="img-thumbnail">
        <form action="">
            <input type="text" placeholder="Наушники" disabled>
            <button>Изменить</button>
        </form>
    </div>
    <div class="col-sm h5 admin-category-item">
        <img src="../pics/category/%D0%A0%D1%8E%D0%BA%D0%B7%D0%B0%D0%BA%D0%B8.jpg" class="img-thumbnail">
        <form action="">
            <input type="text" placeholder="Рюкзаки" disabled>
            <button>Изменить</button>
        </form>    
    </div>
    <div class="col-sm h5 admin-category-item">
        <img src="../pics/category/%D0%A7%D0%B0%D1%81%D1%8B.jpg" class="img-thumbnail">
        <form action="">
            <input type="text" placeholder="Часы" disabled>
            <button>Изменить</button>
        </form>
    </div>
</div>

<script src="../js/admin_get_category.js"></script>
<?php include('../templates/admin_footer.php') ?>
