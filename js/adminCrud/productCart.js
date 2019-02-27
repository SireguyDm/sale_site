$(document).ready(function(){
    
    //Product
    var product_id = $('#data-id').data('id');
    var title = false;
    var cost = false;
    var old_cost = false;
    var img = false;
    
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
    
    getProduct(product_id, false, false, false, false, false, false, false, false, false, false, false, false);
     
    $(document).on('click', '.btn-change', function () {
        
        openClose('#ChangeModal');
        
        var product_id = $('#data-id').data('id');
        var modal_title = $(this).data('type');
        
        $('#exampleModalLongTitle').text(modal_title);
        $('#ChangeModal').attr('data-productid', id);
        $('#ChangeModal').attr('data-action', 'change');
    });
    
    $(document).on('click', '.delete', function () {
        
        openClose('#DeleteModal');
        
        var del_target = $(this).data('target');
        var modal_title = $(this).data('type');
        
        $('#exampleModalLongTitle').text('Удалить ' + modal_title +'?');
        $('#DeleteModal').attr('target', del_target);
    });
        
    $(document).on('click', '.del_modal_close', function () {
        
        $('#exampleModalLongTitle').text('');
        $('#DeleteModal').attr('target', false);
        openClose('#DeleteModal');
    });
        
    $(document).on('click', '.change_modal_close', function () {
        
        $('#exampleModalLongTitle').text('');
        $('#ChangeModal').attr('data-productid', false);
        $('#ChangeModal').attr('data-action', false);
    });
        
    //Изменение
    $('#save').click(function(){
        
//        var status_id = $('#ChangeModal').data('statusid');
//        var status_title = $('#category_title').val();
//        var action = $('#ChangeModal').data('action');
//        
//        getStatus(status_id, status_title, action);
//        
//        $('#ChangeModal').attr('data-statusid', false);
//        action = '';
//        openClose('#ChangeModal');
//        
//        location.reload();
    });
//    
//    //Удаление
//    $('#modal_send').click(function(){
//        
//        var status_id = $('#DeleteModal').data('statusid');
//        var status_title = '';
//        var action = 'delete';
//        
//        getStatus(status_id, status_title, action);
//        
//        $('#DeleteModal').attr('data-statusid', false);
//        action = '';
//        openClose('#DeleteModal');
//        
//        location.reload();
//    });
});

function getProduct(product_id, title, cost, old_cost, img, zag, p1, p2, color, size, material, country, action){
    
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
        action
    }, function (data) {
        var product_data = JSON.parse(product_data);
        var description_data = JSON.parse(description_data);
        
        var product = product_data.product;
        var description = description_data.description;
        
        product_data.forEach(function(product){
            
            $('#data-id').text(product['title']);
            $('#data-id').data('target', 'title');
            
            $('.article-photos').append(
                '<div class="article-photo-div">' +
                    '<img src="../pics/tovar/'+ product['title'] +'/'+ product['title'] +'1.jpg" class="article-main-photo">' +
                '</div>' +
                '<img src="../pics/tovar/'+ product['title'] +'/'+ product['title'] +'1.jpg" class="article-btn-active">'+
                '<img src="../pics/tovar/'+ product['title'] +'/'+ product['title'] +'2.jpg" class="article-btn-active">'+
                '<img src="../pics/tovar/'+ product['title'] +'/'+ product['title'] +'3.jpg" class="article-btn-active">'
            );
            $('.article-cost-item').append(
                '<p class="cost btn-change btn-delete" data-type="Цена" data-target="cost">'+ product['cost'] +' руб.</p>' +
                '<p class="old-cost btn-change btn-delete" data-type="Старая цена" data-target="old_cost">'+ product['old_cost'] +' руб.</p>'
            );
        }); 
        description_data.forEach(function(description){
            $('.article-text').append(
            '<div class="article-text-description">' +
                '<p class="description-zag btn-change btn-delete" data-type="Загаловок" data-target="zag">'+ description['zag'] +'</p>' +
                '<p class="btn-change btn-delete" data-type="Описание 1" data-target="p1">'+ description['p1'] +'</p>'+
                '<p class="btn-change btn-delete" data-type="Описание 2" data-target="p2">'+ description['p2'] +'</p>' +
            '</div>' +
            '<div class="article-text-property">' +
                '<p>Цвет: <span  id="color" class="btn-change btn-delete" data-type="Цвет" data-target="color">'+ description['color'] +'</span></p>' +
                '<p>Размер: <span id="size" class="btn-change btn-delete" data-type="Размер" data-target="size">'+ description['size'] +'</span></p>' +
                '<p>Состав: <span id="material" class="btn-change btn-delete" data-type="Состав" data-target="material">'+ description['material'] +'</span></p>' +
                '<p>Производство: <span id="country" class="btn-change btn-delete" data-type="Страна" data-target="country">'+ description['country'] +'</span></p>' +
            '</div>'
            ) 
        }); 
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