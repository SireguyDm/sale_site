$(document).ready(function(){
    
    var category_id = false;
    var category_title = false;
    
    getCategory(category_id, category_title);
    
    $(document).on('click', '#openModal', function(){
        openClose()
        
        var category_id = $(this).data('id');
        $('#ChangeModal').attr('data-categoryid', category_id);
    });
    
    $(document).on('click', '.modal_close', function () {
        
        $('#ChangeModal').attr('data-categoryid', false);
        openClose();
    });

    
    $('#save').click(function(){
        
        var category_title = $('#category_title').val();
        var category_id = $('#ChangeModal').data('categoryid');
        
        getCategory(category_id, category_title);
        
        $('#ChangeModal').attr('data-categoryid', false);
        openClose();
        location.reload();
    });
    
});

function getCategory(category_id, category_title){
    
    $.post('../php/admin_get_category.php', {
        category_id,
        category_title
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
                    '<div class="d-flex justify-content-center">' +
                        '<button type="button" class="btn btn-info" id="openModal" data-id="'+ category['id'] +'">Изменить</button>' +
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
