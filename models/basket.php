<?php 

require_once '../php/db.php';

class Basket
{
    
    public $id;
    public $order_id;
    public $product_id;
    public $product_count;
    public $all_summ;
    public $product_title;
    public $product_cost;
    
    public function __construct($id)
    {
        global $mysqli;
        
        $query = "
        SELECT
            b.basket_id,
            b.order_id,
            b.product_id,
            b.product_count,
            b.all_summ,
            p.title,
            p.cost
        FROM
            basket b,
            products p
        WHERE
            b.product_id = p.product_id
            AND b.basket_id = $id
        ";  
        
        $result = $mysqli->query($query);
        
        $basket_data = $result->fetch_assoc();
        
        $this->id = $basket_data['basket_id'];
        $this->order_id = $basket_data['order_id'];
        $this->product_id = $basket_data['product_id'];
        $this->product_count = $basket_data['product_count'];
        $this->all_summ = $basket_data['all_summ'];
        $this->product_title = $basket_data['title'];
        $this->product_cost = $basket_data['cost'];
        
    }
    
    public static function getAllByOrderId($order_id)
    {
        global $mysqli;
        
        $query = "SELECT basket_id FROM basket WHERE order_id = $order_id";
        $result = $mysqli->query($query);
        
        $basket = [];
        while ($basket_data = $result->fetch_assoc()) {
            $basket[] = new self($basket_data['basket_id']);
        }

        return $basket;
    }
    
    public function add($order_id, $product_id = null, $product_count = null, $all_summ = null)
    {
        global $mysqli;

        $query = "INSERT INTO basket (order_id, product_id, product_count, all_summ) VALUES ('$order_id', '$product_id', '$product_count', '$all_summ')";
        
        $result = $mysqli->query($query);

        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function update($basket_id, $order_id =false, $product_id = false, $product_count = false, $all_summ = false)
    {   
        
        $condition = [];
        if($order_id != false) {
            $condition[] = "order_id='$order_id'";
        }
        if($product_id != false) {
            $condition[] = "product_id='$product_id'";
        }
        if($product_count != false) {
            $condition[] = "product_count='$product_count'";
        }
        if($all_summ != false) {
            $condition[] = "all_summ='$all_summ'";
        }
        
        $condition = implode(",", $condition);

        global $mysqli;

        $query = "UPDATE basket SET $condition WHERE basket_id=$basket_id";
        
        $result = $mysqli->query($query);

        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function delete($basket_id)
    {
        global $mysqli;
        
        $query = "DELETE FROM basket WHERE basket_id = $basket_id";
        $result = $mysqli->query($query);
        
        if($result){
            return true;
        } else {
            return false;
        }
    }
    
    public function delete_all($order_id)
    {
        global $mysqli;
        
        $query = "DELETE FROM basket WHERE order_id = $order_id";
        $result = $mysqli->query($query);
        
        if($result){
            return true;
        } else {
            return false;
        }
    }
    
    public static function getAllproducts()
    {
        global $mysqli;
        
        $query = "SELECT basket_id FROM basket GROUP BY order_id";
        $result = $mysqli->query($query);
        
        $basket = [];
        while ($basket_data = $result->fetch_assoc()) {
            $basket[] = new self($basket_data['basket_id']);
        }
        
        return $basket;
    }
    
}

//Получение определенного товра из корзины по order_id
//$basket = new Basket(3);

//Получение всех товаров из корзины по order_id
//$basket = Basket::getAllByOrderId(1);

//Получение всех товаров из корзины
//$basket = Basket::getAllProducts();

//Добавление товара в корзину
//$basket = Basket::add(3, 6, 2, 12000);

//Обновление одного товара из корзины
//$basket = Basket::update(25, false, false, false, 12050);

//Удаление одного товара
//$basket = Basket::delete(25);

//Удаление всех товаров по order_id
//$basket = Basket::delete_all(3);

// echo '<pre>';
// var_dump($basket);
