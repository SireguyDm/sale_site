<?php include('../controllers/admin_header.php') ?>

<h1 class="text-center mt-4 mb-4">Обратные звонки</h1>

<div class="callback">
    
     <div class="alert alert-success " role="alert" id="admin_basket">
            <h4 class="alert-heading admin_time text-center">29.01.2019: 22:40</h4>
            <p class="text-center h4" id="user_name">Сергей <span id="user-f">Дмитренко</span></p>
            <p class="h5 admin_basket_row mt-3 text-center">Телефон: <span>8(910)446-66-51</span></p>
            <div class="d-flex justify-content-center mt-3">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal">Удалить</button>
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



<?php include('../templates/admin_footer.php') ?>
