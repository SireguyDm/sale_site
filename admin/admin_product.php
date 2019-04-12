<?php include('../controllers/admin_header.php') ?>

<div id="action-box">
    <button class="btn btn-success" id="Add">Добавить товар</button>
    <button class="btn btn-danger ml-2" id="delete">Удалить товар</button>
</div>

<div id="delete-box">
    <button class="btn btn-danger" id="delete-selected">Удалить выбранные</button>
    <button class="btn btn-success ml-2" id="delete-cancel">Отменить</button>
</div>


<div class="filter product_filter">
        <div class="sort">
            <div class="sort-zag" data-display="false">
                <div class="sort-select">
                    Сортировка
                </div>
                <img src="../icon/sort-down-arrow.png" id="menu-arrow">
            </div>
            <div class="sort-menu">
                <div class="sort-item" id="date-desc" data-display="desc">
                    <img src="../icon/sort_down.png">
                    По цене
                </div>
                <div class="sort-item" id="date-avc" data-display="asc"> 
                   <img src="../icon/sort_up.png">
                    По цене
                </div>
                <div class="sort-item" id="date-desc" data-display="false">
                    Показать все
                </div>
            </div>
        </div>
        <div class="view">
           <div class="view-zag" data-categoryId="">
               <span id="view-zag-title">Категория</span>
               <img src="../icon/sort-down-arrow.png" id="menu-arrow">
           </div>
           <div class="view-menu">
                <div class="view-item" data-categoryId="">Показать все</div>
                <?php 
                    foreach($categories as $category){
                        echo '<div class="view-item" data-categoryId="'.$category->id.'">'.$category->title.'</div>';
                    } 
                ?>
           </div>
        </div>
        <div class="brand">
           <div class="brand-zag" data-brandId="">
               <span id="brand-zag-title">Бренд</span>
               <img src="../icon/sort-down-arrow.png" id="menu-arrow">
           </div>
           <div class="brand-menu">
                <div class="brand-item" data-brandId="">Показать все</div>
                <div class="brand-item-menu">
                    <?php 
                        foreach($brands as $brand){
                            echo '<div class="brand-item" data-brandId="'.$brand->id.'">'.$brand->brand_title.'</div>';
                        } 
                    ?>
                </div>
                
           </div>
        </div>
        <div class="search">
            <label for="search">Поиск</label>
            <input type="text" id="search" placeholder="Введите название">
        </div>
    </div>

<h1 class="text-center mt-4 mb-1">Все товары</h1>
<h2 class="text-center mt-1 mb-4">Найдено: <span id="productCount">0</span></h2>

<div class="product container">
    <div class="row">
    </div>
</div>

<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Добавить новый товар?</h5>
                <button type="button" class="close modal_close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend mr-4">
                        <span class="input-group-text" id="addon-wrapping">Количество</span>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-secondary" id="minus">-</button>
                        <input type="text" class="countInput" placeholder="1" value="1" id="addCount" max="100" min="1" maxlength="2">
                        <button type="button" class="btn btn-secondary" id="plus">+</button>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-success mr-4" id="modal_send">Да</button>
                    <button type="button" class="btn btn-danger ml-4 modal_close">Нет</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pagination"></div>
    
<script src="../js/pagintaion.js"></script>
<script src="../js/adminCrud/products.js"></script>
<?php include('../templates/admin_footer.php') ?>
