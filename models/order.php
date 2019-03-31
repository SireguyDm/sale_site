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
    public $date_created;
    public $status_title;
    public $indificator;
    
    public static $limit_orders = 5;
    
    public function __construct($id)
    {;
        
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
            o.date_created,
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
        $this->date_created = $order_data['date_created'];
        $this->status_id = $order_data['status_id'];
        $this->status_title = $order_data['status_title'];
        
    }
    
    public static function getAll($param = false, $param_dop = false, $status_select = false, $time = false, $page = false, $today = false)
    {
        
        global $mysqli;
        
        $condition = [];
        
        if($param_dop !== false){
            $condition[] = "AND `order_id` IN ($param_dop)";   
        }
        
        if($status_select !== 'false'){
            $condition[] = "AND `status_id` = '$status_select'";
        }
        
        if($time !=='false' && $today !== false){
            if($time == 'today'){
                $condition[] = "AND `date_created`> '$today'";
            }
            if($time == 'yesterday'){
                $yesterday = $today;
                $yesterday = strtotime($yesterday);
                $yesterday = strtotime("-1 day", $yesterday);
                $yesterday = date('Y-m-d', $yesterday);
                $yesterday = date("Y-m-d", microtime(true)-(60*60*24));
                $condition[] = "AND `date_created`>'$yesterday' AND `date_created`< '$today'";
            }
            if($time == '3days'){
                $daysago = $today;
                $daysago = strtotime($daysago);
                $daysago = strtotime("-3 day", $daysago);
                $daysago = date('Y-m-d', $daysago);
                $condition[] = "AND `date_created`> '$daysago' AND `date_created`< '$today'";
            }
        }
        
        if($param !== false){
            if($param == 'desc'){
                $condition[] = "ORDER BY date_created DESC";
            }
            if($param == 'avc'){
                $condition[] = "ORDER BY date_created";
            }
        }
        
        $condition = implode(" ", $condition);
        
        $query = "SELECT COUNT(*) as count FROM `orders` WHERE 1 $condition";
        $result = $mysqli->query($query);
        $count_data = $result->fetch_assoc();
            
        if ($page !== false){
            --$page;

            $limit = " LIMIT " . ($page * self::$limit_orders) . ", " . self::$limit_orders;  
        } else {
            $limit = "";
        }

        if ($count_data['count'] < ($page * self::$limit_orders)){
            return false;
        }
        
        
        $query = "SELECT order_id FROM orders WHERE 1 $condition $limit";
        $result = $mysqli->query($query);
        
        $orders = [];
        while ($order_data = $result->fetch_assoc()) {
            $orders[] = new self($order_data['order_id']);
        }

        return [
            'orders' => $orders,
            'count' => $count_data['count']
        ]; 
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
    
    public function add($status_id = null, $first_name = null, $second_name = null, $tel = null, $email = null, $adress = null, $city = null, $domofon = null, $indificator=null, $date_created=null)
    {
        global $mysqli;

        $query = "INSERT INTO orders (status_id, first_name, second_name, tel, email, adress, city, domofon, indificator, date_created) VALUES ('$status_id', '$first_name', '$second_name', '$tel', '$email', '$adress', '$city', '$domofon', '$indificator', '$date_created')";
        
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
//$order = Order::getAll('avc', '1,2,3,10,11,12,13', 'false', '3days', 1, '2019-03-14');
//$order = Order::getAll(false, false, 'false', false, false, false);

//Обновление заказа
//$order = Order::update(1, 2, false, false, false, false, false, false, false);

//Добавление заказа
//$order = Order::add(1, 'Сергей', 'ПРобный', '891999249129', 'Какой-то', 'МОсква', 'MOscow', '84k9189', 'null');

//Удаление заказа
//$order = Order::delete(3);
//(не удаляет связанные с корзиной)

//Поиск order_id по индификатору
//$order = Order::searchByIndificator(123);

//echo '<pre>';
//var_dump($order);