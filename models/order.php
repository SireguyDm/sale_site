<?php 

require_once '../php/db.php';

class Order
{
    
    public $id;
    public $status_id;
    public $first_name;
    public $second_name;
    public $tel;
    public $email;
    public $adress;
    public $city;
    public $domofon;
    
    public $status_title;
    
    public $indificator;
    
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
            o.adress,
            o.city,
            o.domofon,
            o.indificator,
            o.status_id,
            s.status_title
        FROM 
            orders o,
            status s
        WHERE 
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
        $this->adress = $order_data['adress'];
        $this->city = $order_data['city'];
        $this->domofon = $order_data['domofon'];
        $this->indificator = $order_data['indificator'];
        $this->status_id = $order_data['status_id'];
        $this->status_title = $order_data['status_title'];
        
    }
    
    public static function getAll()
    {
        global $mysqli;
        
        $query = "SELECT order_id FROM orders";
        $result = $mysqli->query($query);
        
        $orders = [];
        while ($order_data = $result->fetch_assoc()) {
            $orders[] = new self($order_data['order_id']);
        }

        return $orders;
    }
    
    public function update($order_id, $status_id = false, $first_name = false, $second_name = false, $tel = false, $email = false, $adress = false, $city = false, $domofon = false, $indificator = false)
    {   
        
        $condition = [];
        if($status_id != false) {
            $condition[] = "status_id='$status_id'";
        }
        if($first_name != false) {
            $condition[] = "first_name='$first_name'";
        }
        if($second_name != false) {
            $condition[] = "second_name='$second_name'";
        }
        if($tel != false) {
            $condition[] = "tel='$tel'";
        }
        if($email != false) {
            $condition[] = "email='$email'";
        }
        if($adress != false) {
            $condition[] = "adress='$adress'";
        }
        if($city != false) {
            $condition[] = "city='$city'";
        }
        if($domofon != false) {
            $condition[] = "domofon='$domofon'";
        }
        if($indificator != false) {
            $condition[] = "indificator='$indificator'";
        }
        
        
        $condition = implode(",", $condition);

        global $mysqli;

        $query = "UPDATE orders SET $condition WHERE order_id=$order_id";
        
        $result = $mysqli->query($query);

        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function add($status_id = null, $first_name = null, $second_name = null, $tel = null, $email = null, $adress = null, $city = null, $domofon = null, $indificator=null)
    {
        global $mysqli;

        $query = "INSERT INTO orders (status_id, first_name, second_name, tel, email, adress, city, domofon, indificator) VALUES ('$status_id', '$first_name', '$second_name', '$tel', '$email', '$adress', '$city', '$domofon', '$indificator')";
        
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
        
        $query = "DELETE FROM orders WHERE order_id = $id";
        $result = $mysqli->query($query);
        
        if($result){
            return true;
        } else {
            return false;
        }
    }
    
    public function searchByIndificator($indificator)
    {
        global $mysqli;
        
        $query = "
        SELECT 
            order_id
        FROM 
            orders
        WHERE 
            indificator = '$indificator'
        ";  
            
        $result = $mysqli->query($query);
        
        $order_data = $result->fetch_assoc();
        $order_id = $order_data['order_id'];
        
        return $order_id;
    }
    
}

//Получение определнного заказа
//$order = new Order(1);

//Получение всех заказов
//$order = Order::getAll();

//Обновление заказа
//$order = Order::update(1, 2, false, false, false, false, false, false, false);

//Добавление заказа
//$order = Order::add(1, 'Сергей', 'ПРобный', '891999249129', 'Какой-то', 'МОсква', 'MOscow', '84k9189');

//Удаление заказа
//$order = Order::delete(3);
//(не удаляет связанные с корзиной)

//Поиск order_id по индификатору
//$order = Order::searchByIndificator(123);

// echo '<pre>';
// var_dump($order);
