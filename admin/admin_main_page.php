<?php include('../controllers/admin_header.php') ?>

    <h1 class="text-center mt-4 mb-4">Заказы</h1>

<div class="admin_zakazi"></div>

<div class="modal fade" id="ChangeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-orderId="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CategoryTitle">Изменение статуса</h5>
        <button type="button" class="close modal_close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <fieldset class="form-group">
                <div class="row">
                  <legend class="col-form-label col-sm-2 pt-0">Статус</legend>
                  <div class="col-sm-10" id="status-radio-box"></div>
                </div>
              </fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary modal_close" data-dismiss="modal">Отменить</button>
        <button type="button" class="btn btn-success" id="save">Сохранить</button>
      </div>
    </div>
  </div>
</div>


<script src="../js/adminCrud/basket.js"></script>
<?php include('../templates/admin_footer.php') ?>