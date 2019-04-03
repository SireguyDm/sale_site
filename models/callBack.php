<?php 

require_once '../php/db.php';

class CallBack
{
    
    public $id;
    public $user_name;
    public $tel;
    public $date;
    
    public static $limit_cb = 8;
    
    public function __construct($id)
    {
        global $mysqli;
        
        $query = "SELECT * FROM call_back WHERE call_id=$id";
        $result = $mysqli->query($query);
        
        $callback_data = $result->fetch_assoc();
        
        $this->id = $callback_data['call_id'];
        $this->user_name = $callback_data['user_name'];
        $this->tel = $callback_data['user_tel'];
        $this->date = $callback_data['date'];
    }
    
    public static function getAll($page = false)
    {
        global $mysqli;
        
        $query = "SELECT COUNT(*) as count FROM `call_back` WHERE 1";
        $result = $mysqli->query($query);
        $count_data = $result->fetch_assoc();
            
        if ($page !== false){
            --$page;
            $limit = " LIMIT " . ($page * self::$limit_cb) . ", " . self::$limit_cb;  
        } else {
            $limit = "";
        }
        
        if ($count_data['count'] < ($page * self::$limit_cb)){
            return false;
        }
        
        $query = "SELECT call_id FROM call_back $limit";
        $result = $mysqli->query($query);
        
        $calls_back = [];
        while ($callback_data = $result->fetch_assoc()) {
            $calls_back[] = new self($callback_data['call_id']);
        }

        return [
            'calls_back' => $calls_back,
            'count' => $count_data['count']
        ];
    }
    
    public function add($user_name, $tel, $date)
    {
        global $mysqli;

        $query = "INSERT INTO call_back (user_name, user_tel, date)
                  VALUES ('$user_name', '$tel', '$date')";
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
        
        $query = "DELETE FROM call_back WHERE call_id = $id";
        $result = $mysqli->query($query);
        
        if($result){
            return true;
        } else {
            return false;
        }
    }
}

//Получение определнного звонка
//$call_back = new CallBack(1);

//Получение всех звонков
//$call_back = CallBack::getAll(1);

//Добавление звонка
//$call_back = CallBack::add('Сергей', '89999999999', '2018-01-19');

//Удаление звонка
//$call_back = CallBack::delete(5);

// echo '<pre>';
// var_dump($call_back);
