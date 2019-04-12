<?php

require_once '../php/db.php';

class Product 
{
    public $id;
    public $title;
    public $cost;
    public $old_cost;
    public $img;
    public $category_id;
    public $brand_id;
    public $brand_title;
    
    public static $limit_products = 12;
    
    public function __construct($id)
    {
        global $mysqli;

        $query = 
        "SELECT
            p.product_id,
            p.title,
            p.brand_id,
            p.cost,
            p.old_cost,
            p.img,
            p.category_id,
            p.brand_id,
            b.brand_title
        FROM products p
        LEFT JOIN brand b ON p.brand_id = b.brand_id
        WHERE p.product_id = $id";
        $result = $mysqli->query($query);

        if ($result->num_rows > 0) {
            $product_data = $result->fetch_assoc();

            $this->id = $product_data['product_id'];
            $this->title = $product_data['title'];
            $this->cost = $product_data['cost'];
            $this->old_cost = $product_data['old_cost'];
            $this->img = $product_data['img'];
            $this->category_id = $product_data['category_id'];
            $this->brand_id = $product_data['brand_id'];
            $this->brand_title = $product_data['brand_title'];
        }
    }

    public static function getAll($category_id = false, $type = false, $action = false, $brand_id = false, $page = false)
    {
        global $mysqli;

        $conditions = "";
        $tables = "products p";
        
        if ($category_id === 'sale'){
            $conditions = "AND p.old_cost > 0";
        }
        if ($category_id !== false && $category_id !== 'sale') {
            $conditions .= " AND p.category_id=$category_id";
        }
        
        if($brand_id !== false) {
            $conditions .= " AND p.brand_id='$brand_id'";
        }
        
        if ($type !== false && $type == 'cost'){
            if ($action !== false && $action == 'desc'){
                $conditions .= " ORDER BY cost DESC";
            } else if ($action !== false && $action == 'asc'){
                $conditions .= " ORDER BY cost";
            }
        } else if ($type !== false && $type == 'name'){
            if ($action !== false && $action == 'desc'){
                $conditions .= " ORDER BY title DESC";
            } else if ($action !== false && $action == 'asc'){
                $conditions .= " ORDER BY title";
            }
        }
        
        $query = "SELECT COUNT(*) as count FROM $tables WHERE 1 $conditions";
        $result = $mysqli->query($query);
        $count_data = $result->fetch_assoc();
        
        if ($page !== false){
            --$page;

            $limit = " LIMIT " . ($page * self::$limit_products) . ", " . self::$limit_products;  
        } else {
            $limit = "";
        }

        if ($count_data['count'] < ($page * self::$limit_products)){
            return false;
        }

        $query = "SELECT p.product_id FROM $tables WHERE 1 $conditions $limit";
        $result = $mysqli->query($query);

        $products = [];
        while ($product_data = $result->fetch_assoc()) {
            $products[] = new self($product_data['product_id']);
        }

        return [
            'products' => $products,
            'count' => $count_data['count']
        ];
    }
    
    public function add($title, $cost, $old_cost, $img, $category_id, $brand_id)
    {
        global $mysqli;

        $query = "INSERT INTO products (title, cost, old_cost, img, category_id, brand_id) VALUES ('$title', '$cost', '$old_cost', '$img', '$category_id', '$brand_id')";
        
        $result = $mysqli->query($query);

        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function update($id, $title=false, $cost=false, $old_cost=false, $img=false, $category_id=false, $brand_id=false)
    {   
        $condition = [];
        if($title != false) {
            $condition[] = "title='$title'";
        }
        if($cost != false) {
            $condition[] = "cost='$cost'";
        }
        if($old_cost != false) {
            $condition[] = "old_cost='$old_cost'";
        }
        if($img != false) {
            $condition[] = "img='$img'";
        }
        if($category_id != false) {
            $condition[] = "category_id='$category_id'";
        }
        if($brand_id != false) {
            $condition[] = "brand_id='$brand_id'";
        }

        $condition = implode(",", $condition);

        global $mysqli;

        $query = "UPDATE products SET $condition WHERE product_id=$id";
        
        $result = $mysqli->query($query);

        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function delete($id)
    {
        global $mysqli;
        
        $query = "DELETE FROM products WHERE product_id = $id";
        $result = $mysqli->query($query);
        
        if($result){
            return true;
        } else {
            return false;
        }
    }
    
}

//Вывести определенный 
// $products = new Product(1);

//Вывести все товары
// $products = Product::getAll(2, 'cost', 'asc', 3, 1);

// Добавление товара
//$products = Product::add('null', 'null', 'null', 'null', '1', '1');

//Обновление товара
//$products = Product::update(60, 'Casion', 1000, 3500, 'avei7', 2, 8);

//Удаление товара
//$products = Product::delete(86);

// echo '<pre>';
// var_dump($products);