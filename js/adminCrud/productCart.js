$(document).ready(function(){

    // id
    var product_id = $('#data-id').data('id');
    
    //Product
    var title = false;
    var cost = false;
    var old_cost = false;
    var img = false;
    var category_id = false;
    
    //Description
    var zag = false;
    var p1 = false;
    var p2 = false;
    var color = false;
    var size = false;
    var material = false;
    var country = false;
        
    //Действие
    var action = false;
    
    //Получение товара
    getProduct(product_id, false, false, false, false, false, false, false, false, false, false, false, false, false); 
    
    //Работа изображений
    slider_images();
    
    //Действия при нажатии на кнопку изменить
    $('#change').click(function(){
        
        //Открытие формы
        if ($('#ProductChange').css('display') == 'none'){
            
            $('#ProductChange').css('display', 'block');
            
            var title = $('#data-id').text();
            var zag = $('#zag').text();

            var cost = $('#cost').text();
            var old_cost = $('#old_cost').text();
            var cost = parseInt(cost);
            var old_cost = parseInt(old_cost);

            var img = $('#img').data('img');
            var p1 = $('#p1').text();
            var p2 = $('#p2').text();
            var color = $('#color').text();
            var size = $('#size').text();
            var material = $('#material').text();
            var country = $('#country').text();

            $('#ProductChange').attr('data-productid', product_id);

            $('#inputTitle').val(title);
            $('#inputZag').val(zag);
            $('#inputCost').val(cost);
            $('#inputOldCost').val(old_cost);
            $('#inputImg').val(img);
            $('#inputP1').val(p1);
            $('#inputP2').val(p2);
            $('#inputColor').val(color);
            $('#inputSize').val(size);
            $('#inputMaterial').val(material);
            $('#inputCountry').val(country);
        
        //Закрытие формы
        }else{
            
            $('#ProductChange').css('display', 'none');
        }  
    });
    
    //Действия при смене категорий
    $('.categoryMenu-item').click(function(){
        
        var category_id = $(this).attr('data-categoryId');
        var category_title = $(this).text();
        
        $('#CategoryMenu').attr('data-categoryId', category_id);
        $('#CategoryMenu').text(category_title);
    });
    
    //Действия при нажатии на кнопку сохранить
    $('#save').click(function(){
        
        $('#inputTitle').val() !== '' ? title = $('#inputTitle').val() : title = false;
        $('#inputZag').val() !== '' ? zag = $('#inputZag').val() : zag = false;
        $('#inputCost').val() !== '' ? cost = $('#inputCost').val() : cost = false;
        $('#inputOldCost').val() !== '' ? old_cost = $('#inputOldCost').val() : old_cost = false;
        $('#inputImg').val() !== '' ? img = $('#inputImg').val() : img = false;
        $('#inputP1').val() !== '' ? p1 = $('#inputP1').val() : p1 = false;
        $('#inputP2').val() !== '' ? p2 = $('#inputP2').val() : p2 = false;
        $('#inputColor').val() !== '' ? color = $('#inputColor').val() : color = false;
        $('#inputSize').val() !== '' ? size = $('#inputSize').val() : size = false;
        $('#inputMaterial').val() !== '' ? material = $('#inputMaterial').val() : material = false;
        $('#inputCountry').val() !== '' ? country = $('#inputCountry').val() : country = false;
        category_id = $('#CategoryMenu').attr('data-categoryId');
        
        action = 'change';
        
        clearProduct();
        getProduct(product_id, title, cost, old_cost, img, zag, p1, p2, color, size, material, country, action, category_id)
        
        return false;
    });
    
    //Действия при нажатии на кнопку Удалить
    $('#delete').click(function(){
        
        openClose('#DeleteModal');
    });
    
    //Закрытие формы удаления
    $('.modal_close').click(function(){
        
        openClose('#DeleteModal');
    });
    
    //Действия при нажатии на кнопку Да
    $('#modal_send').click(function(){
        
        action = 'delete';
        
        clearProduct();
        getProduct(product_id, title, cost, old_cost, img, zag, p1, p2, color, size, material, country, action, category_id)
        
        window.location.href = "../controllers/admin_products.php";
    });
    
});

function getProduct(product_id, title, cost, old_cost, img, zag, p1, p2, color, size, material, country, action, category_id){
    
    $.post('../php/admin_get_productcart.php', {
        product_id,
        title,
        cost,
        old_cost,
        img,
        zag,
        p1,
        p2,
        color,
        size,
        material,
        country,
        action,
        category_id
    }, function (data) {
        var data = JSON.parse(data);
        
        var product = data['product_data'];
        var description = data['description_data'];
        
        $('#CategoryMenu').attr('data-categoryId', product['category_id']);
        var category = false;
        $('.categoryMenu-item').each(function(){
            if ($(this).attr('data-categoryId') == product['category_id']){
                category = $(this).text();
            }
        });
        $('#CategoryMenu').text(category);
        
        $('#data-id').text(product['title']);
        $('#data-id').data('target', 'title');
            
        $('.article-photos').append(
            '<div class="article-photo-div" id="img" data-img="'+ product['img'] +'">' +
                '<img src="../pics/tovar/'+ product['img'] +'/'+ product['img'] +'1.jpg" class="article-main-photo">' +
            '</div>' +
            '<img src="../pics/tovar/'+ product['img'] +'/'+ product['img'] +'1.jpg" class="article-btn-active">'+
            '<img src="../pics/tovar/'+ product['img'] +'/'+ product['img'] +'2.jpg" class="article-btn-active">'+
            '<img src="../pics/tovar/'+ product['img'] +'/'+ product['img'] +'3.jpg" class="article-btn-active">'
        );
        $('.article-cost-item').append(
            '<p class="cost" id="cost">'+ product['cost'] +' руб.</p>' +
            '<p class="old-cost" id="old_cost">'+ product['old_cost'] +' руб.</p>'
        );
        
        
        $('.article-text').append(
            '<div class="article-text-description">' +
                '<p class="description-zag" id="zag">'+ description['zag'] +'</p>' +
                '<p id="p1">'+ description['p1'] +'</p>'+
                '<p id="p2">'+ description['p2'] +'</p>' +
            '</div>' +
            '<div class="article-text-property">' +
                '<p>Цвет: <span  id="color">'+ description['color'] +'</span></p>' +
                '<p>Размер: <span id="size">'+ description['size'] +'</span></p>' +
                '<p>Состав: <span id="material">'+ description['material'] +'</span></p>' +
                '<p>Производство: <span id="country">'+ description['country'] +'</span></p>' +
            '</div>'
        )
    });
    // Конец запроса
};

function openClose(target){
    var modal = $(target);
    if (modal.css('display') == 'none' && modal.css('opacity') == '0'){
        modal.css('display', 'block');
        modal.css('opacity', '1');
    } else {
        modal.css('display', 'none');
        modal.css('opacity', '0');
    }
};

function slider_images(){
    var photo = '';
    $(document).on('click', '.article-btn-active', function () {
        photo = $(this).attr('src');
        $('.article-main-photo').attr('src', photo);
    });
}

function clearProduct(){
    $('.article-photos').empty();
    $('.article-cost-item').empty();
    $('.article-text').empty();
}

