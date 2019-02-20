<?php include('../controllers/admin_header.php') ?>

<h1 class="text-center mt-4 mb-4">Статусы</h1>

<div class="status">
    
<!--
    <div class="status-item d-flex justify-content-center">
        <h3 class="text-center mt-4 mb-4">Ожидает</h3>
        <div class="btn-group ml-4">
          <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Действия
          </button>
          <div class="dropdown-menu">
             <button type="button" class="dropdown-item" data-toggle="modal" data-target="#ChangeModal">
                  Изменить
            </button>
            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#DeleteModal">
                  Удалить
            </button>
            
          </div>
        </div>
    </div>
-->

</div>



<div class="modal fade" id="ChangeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ожидает</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="">Введите название</span>
              </div>
              <input type="text" class="form-control">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
        <button type="button" class="btn btn-primary">Сохранить</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Вы уверены?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-success mr-4">Да</button>
            <button type="button" class="btn btn-danger ml-4">Нет</button>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="../js/adminCrud/status.js"></script>
<?php include('../templates/admin_footer.php') ?>
