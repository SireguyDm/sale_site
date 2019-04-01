<?php include('../controllers/admin_header.php') ?>

<h1 class="text-center mt-4 mb-4">Обратные звонки</h1>

<h3 class="text-center mt-3 mb-3 d-flex justify-content-center">Очистить звонки <button class="btn btn-danger ml-4" id="deleteAll" data-all="all">Удалить</button></h3>

<div class="callback"></div>

<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-prodid="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Вы уверены?</h5>
        <button type="button" class="close modal_close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-success mr-4" id="modal_send">Да</button>
            <button type="button" class="btn btn-danger ml-4 modal_close">Нет</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="pagination"></div>

<script src="../js/adminCrud/callBack.js"></script>
<script src="../js/pagintaion.js"></script>
<?php include('../templates/admin_footer.php') ?>
