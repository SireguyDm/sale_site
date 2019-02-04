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
    
    public function __construct($id)
    {
        global $mysqli;

        $query = "SELECT product_id, title, cost, old_cost, img, category_id FROM products WHERE product_id=$id";
        $result = $mysqli->query($query);

        if ($result->num_rows > 0) {
            $product_data = $result->fetch_assoc();

            $this->id = $product_data['product_id'];
            $this->title = $product_data['title'];
            $this->cost = $product_data['cost'];
            $this->old_cost = $product_data['old_cost'];
            $this->img = $product_data['img'];
            $this->category_id = $product_data['category_id'];
        }
    }

    public static function getAll($category_id = false)
    {
        global $mysqli;

        $conditions = "";
        $tables = "products p";

        if ($category_id !== false) {
            $conditions .= " AND p.category_id=$category_id";
        }

        $query = "SELECT p.product_id FROM $tables WHERE 1 $conditions";
        $result = $mysqli->query($query);

        $products = [];
        while ($product_data = $result->fetch_assoc()) {
            $products[] = new self($product_data['product_id']);
        }

        return $products;
    }
}

// $products = new Product(1);
// $products = Product::getAll();
// echo '<pre>';
// var_dump($products);



