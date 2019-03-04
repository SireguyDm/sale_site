<?php include('../controllers/admin_header.php') ?>

<div class="d-flex justify-content-center mt-4">
    <button class="btn btn-success" id="Add">Добавить товар</button>
</div>


<h1 class="text-center mt-4 mb-4">Все товары</h1>

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

<script src="../js/adminCrud/products.js"></script>
<?php include('../templates/admin_footer.php') ?>
