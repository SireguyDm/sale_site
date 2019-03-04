<?php include('../controllers/admin_header.php') ?>

<h1 class="text-center mt-4 mb-5">Категории</h1>

<div class="row text-center admin-category"></div>

<div class="modal fade" id="ChangeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-categoryid="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CategoryTitle">Изменение категории</h5>
        <button type="button" class="close modal_close" data-dismiss="modal" aria-label="Close">
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
            <div class="input-group mt-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Выберите статус</span>
              </div>
              <div class="dropdown ml-4">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="CategoryMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-categoryId="false">
                        Категория
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2" id="StatusList"></div>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary modal_close" data-dismiss="modal">Отменить</button>
        <button type="button" class="btn btn-success" id="save">Сохранить</button>
      </div>
    </div>
  </div>
</div>

<script src="../js/adminCrud/category.js"></script>
<?php include('../templates/admin_footer.php') ?>
