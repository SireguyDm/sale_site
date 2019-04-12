<?php include('../controllers/admin_header.php') ?>

<h3 class="text-center mt-4 mb-4 d-flex justify-content-center">Добавить бренд<button class="btn btn-success ml-4" id="Add" data-all="all">Добавить</button></h3>

<h1 class="text-center mt-4 mb-4">Бренды</h1>

<div class="brands"></div>

<div class="modal fade" id="ChangeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-brandid="false" data-action="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ChangeTitle">Статус: </h5>
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
            <div class="form-group mt-2 text-center">
                  <label for="inputImg">Категория</label>
                      <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="CategoryMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-categoryId="false">
                            Категория
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                              <?php 
                                    foreach($categories as $category){
                                        echo '<button class="dropdown-item categoryMenu-item" type="button" data-categoryId="'.$category->id.'">'.$category->title.'</button>';
                                    }
                              ?>
                          </div>
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary change_modal_close" data-dismiss="modal">Отменить</button>
        <button type="button" class="btn btn-success" id="save">Сохранить</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-brandid="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="DeleteTitle">Вы уверены?</h5>
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

<div class="pagination"></div>

<script src="../js/pagintaion.js"></script>
<script src="../js/adminCrud/brand.js"></script>
<?php include('../templates/admin_footer.php') ?>
