<?php include('../controllers/admin_header.php') ?>
<link rel="stylesheet" href="../css/style.css">

<h3 class="text-center mt-3">Действия с товаром: </h3>
<div class="d-flex justify-content-center mt-4">
    <button class="btn btn-success" id="change">Изменить</button>
    <button class="btn btn-danger ml-4" id="delete">Удалить товар</button>
</div>

<form id="ProductChange" class="mt-4" data-productid="false">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputTitle">Название товара</label>
      <input type="text" class="form-control" id="inputTitle" placeholder="">
    </div>
    <div class="form-group col-md-6">
      <label for="inputZag">Заголовок товара</label>
      <input type="text" class="form-control" id="inputZag" placeholder="">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputCost">Цена товара</label>
      <input type="text" class="form-control" id="inputCost" placeholder="">
    </div>
    <div class="form-group col-md-2">
      <label for="inputOldCost">Старая цента товара</label>
      <input type="text" class="form-control" id="inputOldCost" placeholder="">
    </div>
    <div class="form-group col-md-2 text-center">
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
    <div class="form-group col-md-2 text-center">
      <label for="inputImg">Бренд</label>
          <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="BrandMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-brandId="false">
                Бренд
              </button>
              <div class="dropdown-menu brand-menu" aria-labelledby="dropdownMenu2">
                  <?php 
                        foreach($brands as $brand){
                            echo '<button class="dropdown-item brandMenu-item" type="button" data-brandId="'.$brand->id.'">'.$brand->brand_title.'</button>';
                        }
                  ?>
              </div>
        </div>
    </div>
    <div class="form-group col-md-3">
      <label for="inputImg">Название папки c img</label>
      <input type="text" class="form-control" id="inputImg" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="inputP1">Описание (основное)</label>
    <textarea id="inputP1" cols="10" rows="3" type="text" class="form-control" placeholder=""></textarea>
  </div>
  <div class="form-group">
    <label for="inputP2">Описание (доп.)</label>
    <textarea id="inputP2" cols="10" rows="3" type="text" class="form-control" placeholder=""></textarea>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputColor">Цвет: </label>
      <input type="text" class="form-control" id="inputColor" placeholder="">
    </div>
    <div class="form-group col-md-3">
      <label for="inputSize">Размер: </label>
      <input type="text" class="form-control" id="inputSize" placeholder="">
    </div>
    <div class="form-group col-md-3">
      <label for="inputMaterial">Состав: </label>
      <input type="text" class="form-control" id="inputMaterial" placeholder="">
    </div>
    <div class="form-group col-md-3">
      <label for="inputCountry">Производство: </label>
      <input type="text" class="form-control" id="inputCountry" placeholder="">
    </div>
  </div>
  <div class="d-flex justify-content-center mt-2">
      <button class="btn btn-success" id="save">Сохранить</button>
  </div>
</form>

<div class="article-section">
    <div class="middle-zag">
        <span id="data-id" data-id="<?php echo $product ?>" data-target="false" data-productTitle=""></span>
    </div>
    <div class="article-section-item">
        <div class="article-photos"></div>
        <div class="article-left-panel">
            <div class="aritcle-wrapper">
                <div class="article-cost">
                    <div class="article-cost-item"></div>
                </div>
                <div class="article-text" style="margin: 5px auto 35px;"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Вы действительно хотите удалить этот товар?</h5>
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

<script src="../js/adminCrud/productCart.js"></script>
<?php include('../templates/admin_footer.php') ?>
