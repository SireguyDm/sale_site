<?php

require_once '../php/db.php';

class Order
{
    public $id;
    public $status;
    public $first_name;
    public $second_name;
    public $tel;
    public $email;
    public $city;
    public $domofon;
    
    public function __construct($id)
    {
        global $mysqli;

        $query = "SELECT order_id, status, first_name, second_name, tel, email, city, domofon FROM orders WHERE order_id=$id";
        $result = $mysqli->query($query);

        if ($result->num_rows > 0) {
            $order_data = $result->fetch_assoc();

            $this->id = order_data['order_id'];
            $this->status = order_data['status'];
            $this->first_name = order_data['first_name'];
            $this->secon_name = order_data['second_name'];
            $this->tel = order_data['tel'];
            $this->email = order_data['email'];
            $this->city = order_data['city'];
            $this->domofon = order_data['domofon'];
            
        }
    }

//    public static function getAll($category_id = false)
//    {
//        global $mysqli;
//
//        $conditions = "";
//        $tables = "products p";
//
//        if ($category_id !== false) {
//            $conditions .= " AND p.category_id=$category_id";
//        }
//
//        $query = "SELECT p.product_id FROM $tables WHERE 1 $conditions";
//        $result = $mysqli->query($query);
//
//        $products = [];
//        while ($product_data = $result->fetch_assoc()) {
//            $products[] = new self($product_data['product_id']);
//        }
//
//        return $products;
//    }
//    
//    public function add($title, $cost, $old_cost, $img, $category_id)
//    {
//        global $mysqli;
//
//        $query = "INSERT INTO products (title, cost, old_cost, img, category_id) VALUES ('$title', '$cost', '$old_cost', '$img', '$category_id')";
//        
//        $result = $mysqli->query($query);
//
//        if($result) {
//            return true;
//        } else {
//            return false;
//        }
//    }
//    
//    public function update($id, $title=false, $cost=false, $old_cost=false, $img=false, $category_id=false)
//    {   
//        $condition = [];
//        if($title != false) {
//            $condition[] = "title='$title'";
//        }
//        if($cost != false) {
//            $condition[] = "cost='$cost'";
//        }
//        if($old_cost != false) {
//            $condition[] = "old_cost='$old_cost'";
//        }
//        if($img != false) {
//            $condition[] = "img='$img'";
//        }
//        if($category_id != false) {
//            $condition[] = "category_id='$category_id'";
//        }
//
//        $condition = implode(",", $condition);
//
//        global $mysqli;
//
//        $query = "UPDATE products SET $condition WHERE product_id=$id";
//        
//        $result = $mysqli->query($query);
//
//        if($result) {
//            return true;
//        } else {
//            return false;
//        }
//    }
//    
//    public function delete($id)
//    {
//        global $mysqli;
//        
//        $query = "DELETE FROM products WHERE product_id = $id";
//        $result = $mysqli->query($query);
//        
//        if($result){
//            return true;
//        } else {
//            return false;
//        }
//    }
//    
//}

//Вывести определенный заказ
 $orders = new Order(1);

//Вывести все товары
// $products = Product::getAll();

// Добавление товара
//$products = Product::add('Avei85', '3500', '4500', 'avei7', '1');

//Обновление товара
//$products = Product::update('2', 'avei-0', '1000', '3500', 'avei7', '2');

//Удаление товара
//$products = Product::delete(2);

 echo '<pre>';
 var_dump($orders);


