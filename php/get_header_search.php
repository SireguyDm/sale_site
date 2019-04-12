<?php 

$search_text = (((isset($_REQUEST['search_text'])) && $_REQUEST['search_text'] !== "")?$_REQUEST['search_text']:false);

require_once '../models/product.php';

if ($search_text !== false && $search_text !== ''){
        
    $data_products = Product::getAll();
    $data = $data_products['products'];
    
    $product_arr = [];
    foreach ($data as $product){
        if ($product->category_id !== '4'){
            $product_arr[] = $product;
        }
    }
    
    $products = [];
    foreach ($product_arr as $product){
        $target = $product->title;
        $target = mb_strtolower($target);
        preg_replace('/\s/', '', $target);
        
        if (strpos($target, $search_text) !== false){
            $products []= $product;
        }
    }
    
    if (count($products) == 0){
        foreach ($product_arr as $product){
            $target = $product->brand_title;
            $target = mb_strtolower($target);
            preg_replace('/\s/', '', $target);

            if ($search_text == $target){
                $products []= $product;
            }
                
        }
    }
    
} else {
   $products = [];
}

$data = [
    'products' => $products
];
    
echo json_encode($data);