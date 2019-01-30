$(document).ready(function(){
    
    $.post('admin_get_category.php', {
        
    }, function (data) {
        
        var data = JSON.parse(data);
        var categories = data.categories;
        
        if (categories.length == 0) {
            $('.admin-category').append(
            '<h2 class="text-center"> Извините, товары не найдены...<h2>'
            );
        } else {
            categories.forEach(function (category) {
                $('.admin-category').append(
                    '<div class="col-sm h5 admin-category-item">' +
                    '<img src="../pics/category/'+ category.title +'.jpg" class="img-thumbnail">' +
                    '<form action="">' +
                        '<input type="text" placeholder="'+ category.title +'" disabled>' +
                        '<button>Изменить</button>' +
                    '</form>' +
                    '</div>'
                );
            });
        }
    });
});