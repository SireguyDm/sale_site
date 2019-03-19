<?php include('../controllers/admin_header.php') ?>


    <div class="filter">
        <div class="sort">
            <div class="sort-zag" id="date-desc" data-action="false">
                <div class="sort-select" data-select="false">
                    <img src="../icon/sort_down.png">
                    По дате добавления
                </div>
                <img src="../icon/sort-down-arrow.png" id="menu-arrow">
            </div>
            <div class="sort-menu">
                <div class="sort-item" id="date-desc" data-action="desc">
                    <img src="../icon/sort_down.png">
                    По дате добавления
                </div>
                <div class="sort-item" id="date-avc" data-action="avc"> 
                   <img src="../icon/sort_up.png">
                    По дате добавления
                </div>
                <div class="sort-item" id="date-avc" data-action="today">
                   <img src="../icon/clock.png">
                    Сегодня
                </div>
                <div class="sort-item" id="date-avc" data-action="yesterday">
                   <img src="../icon/clock.png">
                    Вчера
                </div>
                <div class="sort-item" id="date-avc" data-action="3days">
                   <img src="../icon/clock.png">
                    За 3 дня
                </div>
            </div>
        </div>
        <div class="view-sort">
           <div class="view-zag" data-statusId="false">
               <span id="view-zag-title">Сортировка по статусу</span>
               <img src="../icon/sort-down-arrow.png" id="menu-arrow">
           </div>
           <div class="view-menu">
                <?php 
                    foreach($statuses as $status){
                        echo '<div class="view-item" data-statusId="'.$status->id.'">'.$status->status_title.'</div>';
                    } 
                ?>
           </div>
        </div>
        <div class="search">
            <label for="search">Поиск</label>
            <input type="text" id="search" placeholder="Введите название">
        </div>
    </div>
   
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
<script src="../js/sort_menu.js"></script>
<?php include('../templates/admin_footer.php') ?>