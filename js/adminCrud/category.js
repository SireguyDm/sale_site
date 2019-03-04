$(document).ready(function(){
    
    var category_id = false;
    var category_title = false;
    var status = false;
    
    var status_data = 
    [
        {
            title: 'active'
        },
        {
            title: 'none'
        }
    ];
    
    //Получение категорий
    getCategory(category_id, category_title, status);
    
    //Действия при нажатии на кнопку изменить
    $(document).on('click', '#openModal', function(){
        openClose()
        
        status_data.forEach(function(status){
            $('#StatusList').append(
                '<button class="dropdown-item status-item" type="button">'+ status['title'] +'</button>'
            )
        });
        
        var title = $(this).parent().prev().prev().children().attr('placeholder');
        var category_id = $(this).data('id');
        var status_title = $(this).parent().prev().children('#categoryStatus').text();
        
        $('#category_title').val(title);
        $('#CategoryTitle').val('Изменение категории : ' + title);
        $('#CategoryMenu').text(status_title);
        $('#ChangeModal').attr('data-categoryid', category_id);
    });
    
    //Выбор статуса
    $(document).on('click', '.status-item', function(){
        
        var status_title = $(this).text();
        $('#CategoryMenu').text(status_title);
    });
    
    //Закрытие формы изменения
    $(document).on('click', '.modal_close', function () {
        
        $('#ChangeModal').attr('data-categoryid', false);
        $('#CategoryMenu').text('Статус');
        
        $('#category_title').val('');
        $('#CategoryTitle').val('Изменение категории');
        
        $('#StatusList').empty();
        openClose();
    });

    //Действия при нажатии на кнопку сохранить
    $('#save').click(function(){
        
        var category_title = $('#category_title').val();
        var category_id = $('#ChangeModal').data('categoryid');
        var status = $('#CategoryMenu').text();
        
        getCategory(category_id, category_title, status);
        
        $('#ChangeModal').attr('data-categoryid', false);
        $('#CategoryMenu').text('Статус');
        
        $('#category_title').val('');
        $('#CategoryTitle').val('Изменение категории');
        
        $('#StatusList').empty();
        $('.admin-category').empty();
        openClose();
    }); 
});

function getCategory(category_id, category_title, status){
    
    $.post('../php/admin_get_category.php', {
        category_id,
        category_title,
        status
    }, function (data) {
        var data = JSON.parse(data);
        var products = data.products;
        
        data.forEach(function(category){
            $('.admin-category').append(
            '<div class="col-sm h5 admin-category-item">' + 
                '<img src="../pics/category/'+ category['title'] +'.jpg" class="img-thumbnail">'+
                    '<form>'+
                        '<input type="text" name="title" placeholder="'+ category['title'] +'" disabled class="category_input">' + 
                    '</form>' +
                    '<div class="d-flex justify-content-center mb-1">' +
                       '<p class="mr-2">Статус: </p>'+
                       '<p id="categoryStatus">'+ category['status'] +'</p>'+
                    '</div>'+
                    '<div class="d-flex justify-content-center">' +
                        '<button type="button" class="btn btn-info mt-0" id="openModal" data-id="'+ category['id'] +'">Изменить</button>' +
                    '</div>' +
                '</div>'
            );
        }); 
    });
    
};

function openClose(){
    var modal = $('#ChangeModal');
    if (modal.css('display') == 'none' && modal.css('opacity') == '0'){
        modal.css('display', 'block');
        modal.css('opacity', '1');
    } else {
        modal.css('display', 'none');
        modal.css('opacity', '0');
    }
}
