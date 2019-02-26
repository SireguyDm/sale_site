<?php include('../controllers/admin_header.php') ?>
<link rel="stylesheet" href="../css/style.css">

<div class="article-section">
    <div class="middle-zag">
        <span id="data-id" data-id="<?php echo $product ?>" data-target="false">
<!--            Голографический рюкзак-->
        </span>
    </div>
    <div class="article-section-item">
        <div class="article-photos">
<!--
            <div class="article-photo-div">
                <img src="../pics/tovar/golo/golo1.jpg" class="article-main-photo">
            </div>
            <img src="../pics/tovar/golo/golo1.jpg" class="article-btn-active">
            <img src="../pics/tovar/golo/golo2.jpg" class="article-btn-active">
            <img src="../pics/tovar/golo/golo3.jpg" class="article-btn-active">
-->
        </div>
        <div class="article-left-panel">
            <div class="aritcle-wrapper">
                <div class="article-cost">
                    <div class="article-cost-item">
<!--
                        <p class="cost btn-change btn-delete">
                            1350 руб.
                        </p>
                        <p class="old-cost">1000 руб.</p>
-->
                    </div>
                </div>
                <div class="article-text" style="margin: 5px auto 35px;">
<!--
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
-->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ChangeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-productid="false" data-action="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ожидает</h5>
        <button type="button" class="close change_modal_close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Введите название</span>
              </div>
              <input type="text" class="form-control" id="category_title" data-id="">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary change_modal_close" data-dismiss="modal">Отменить</button>
        <button type="button" class="btn btn-success" id="save">Сохранить</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-target="false" data-action="delete">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Удалить цвет?</h5>
        <button type="button" class="close del_modal_close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-success mr-4" id="modal_send">Да</button>
            <button type="button" class="btn btn-danger ml-4 del_modal_close">Нет</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="../js/product.js"></script>
<script src="../js/adminCrud/productCart.js"></script>
<?php include('../templates/admin_footer.php') ?>
