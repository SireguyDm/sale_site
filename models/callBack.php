<?php 

require_once '../php/db.php';

class CallBack
{
    
    public $id;
    public $user_name;
    public $tel;
    public $date_created;
    
    public function __construct($id)
    {
        global $mysqli;
        
        $query = "SELECT * FROM call_back WHERE call_id=$id";
        $result = $mysqli->query($query);
        
        $callback_data = $result->fetch_assoc();
        
        $this->id = $callback_data['call_id'];
        $this->user_name = $callback_data['user_name'];
        $this->tel = $callback_data['user_tel'];
        $this->date_created = $callback_data['date_created'];
    }
    
    public static function getAll()
    {
        global $mysqli;
        
        $query = "SELECT call_id FROM call_back";
        $result = $mysqli->query($query);
        
        $calls_back = [];
        while ($callback_data = $result->fetch_assoc()) {
            $calls_back[] = new self($callback_data['call_id']);
        }

        return $calls_back;
    }
    
    public function add($user_name, $tel, $date_created)
    {
        global $mysqli;

        $query = "INSERT INTO call_back (user_name, user_tel, date_created)
                  VALUES ('$user_name', '$tel', $date_created)";
        $result = $mysqli->query($query);

        if($result) {
            return true;
        } else {
            return false;
        }
    }
}


//$call_back = CallBack::add('Сергей', '89999999999', '2018-01-19');
//$call_back = CallBack::getAll();
//$call_back = new CallBack(1);
//var_dump($call_back);