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
    
    public $title;
    public $cost;
    
    public $product_count;
    public $all_summ;
    
    public function __construct($id)
    {
        global $mysqli;
        
        $query = "
        SELECT 
            o.order_id,
            o.first_name,
            o.second_name,
            o.tel,
            o.email,
            o.city,
            o.domofon,
            p.title,
            p.cost,
            b.product_count,
            b.all_summ,
            s.status_title
        FROM 
            basket b, 
            products p, 
            orders o,
            status s
        WHERE 
            o.order_id = b.order_id AND
            p.product_id = b.product_id AND
            o.status_id = s.status_id AND
            o.order_id = $id
        ";
        $result = $mysqli->query($query);
        
        $order_data = $result->fetch_assoc();
        
        $this->id = $order_data['order_id'];
        $this->first_name = $order_data['first_name'];
        $this->second_name = $order_data['second_name'];
        $this->tel = $order_data['tel'];
        $this->email = $order_data['email'];
        $this->city = $order_data['city'];
        $this->domofon = $order_data['domofon'];
        
        $this->title = $order_data['title'];
        $this->cost = $order_data['cost'];
        
        $this->product_count = $order_data['product_count'];
        $this->all_summ = $order_data['all_summ'];
        
        $this->status = $order_data['status_title'];
        
    }
    
    public static function getAll($id)
    {
        global $mysqli;
        
        $query = "
        SELECT 
            o.order_id,
            o.first_name,
            o.second_name,
            o.tel,
            o.email,
            o.city,
            o.domofon,
            p.title,
            p.cost,
            b.product_count,
            b.all_summ,
            s.status_title
        FROM 
            basket b, 
            products p, 
            orders o,
            status s
        WHERE 
            o.order_id = b.order_id AND
            p.product_id = b.product_id AND
            o.status_id = s.status_id AND
            o.order_id = $id
        ";
        $result = $mysqli->query($query);
        
        $orders = [];
        while ($order_data = $result->fetch_assoc()) {
            $orders[] = new self($order_data['order_id']);
        }

        return $orders;
    }
    
    
}

//Получение определнного заказа
//$order = new Order(1);

//Получение всех заказов
$order = Order::getAll(1);

 echo '<pre>';
 var_dump($order);
