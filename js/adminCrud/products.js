$(document).ready(function(){
    
    getProduct();
    
});

function getProduct(){
    
    $.post('../php/admin_get_category.php', {
    }, function (data) {
        var data = JSON.parse(data);
        var products = data.products;
        
        data.forEach(function(product){
            $('.row').append(
            '<div class="col-lg-3 col-md-4 col-6 product-item">' +
              '<a href="../controllers/admin_product_cart.php?product_id='+ product['id'] +'" class="container">' +
                  '<img src="../pics/tovar/'+ product['title'] +'/'+ product['title'] +'1.jpg" class="img-fluid"+
                  '<h3>'+ product['title'] +'</h3>'+
              '</a>'+
            '</div>'
            );
        }); 
    });
    
};

