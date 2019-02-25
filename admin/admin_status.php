<?php include('../controllers/admin_header.php') ?>

<h3 class="text-center mt-4 mb-4 d-flex justify-content-center">Добавить статус<button class="btn btn-success ml-4" id="Add" data-all="all">Добавить</button></h3>

<h1 class="text-center mt-4 mb-4">Статусы</h1>

<div class="status"></div>

<div class="modal fade" id="ChangeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-statusid="false" data-action="false">
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

<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-statusid="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Вы уверены?</h5>
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


<script src="../js/adminCrud/status.js"></script>
<?php include('../templates/admin_footer.php') ?>
