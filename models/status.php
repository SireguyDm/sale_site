<?php 

require_once '../php/db.php';

class Status
{
    
    public $id;
    public $status_title;
    
    public function __construct($id)
    {
        global $mysqli;
        
        $query = "SELECT * FROM status WHERE status_id=$id";
        $result = $mysqli->query($query);
        
        $status_data = $result->fetch_assoc();
        
        $this->id = $status_data['status_id'];
        $this->status_title = $status_data['status_title'];
    }
    
    public static function getAll()
    {
        global $mysqli;
        
        $query = "SELECT status_id FROM status";
        $result = $mysqli->query($query);
        
        $statuses = [];
        while ($status_data = $result->fetch_assoc()) {
            $statuses[] = new self($status_data['status_id']);
        }

        return $statuses;
    }
    
    public function add($status_title)
    {
        global $mysqli;

        $query = "INSERT INTO status (status_title)
                  VALUES ('$status_title')";
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
        
        $query = "DELETE FROM status WHERE status_id = $id";
        $result = $mysqli->query($query);
        
        if($result){
            return true;
        } else {
            return false;
        }
    }
    
    public function update($id, $status_title)
    {
        global $mysqli;
        
        $query = "UPDATE status SET status_title = '$status_title' WHERE status_id=$id";
        $result = $mysqli->query($query);

        if($result) {
            return true;
        } else {
            return false;
        }
    }
}

//Получение определнного статуса
//$status = new Status(1);

//Получение всех статусов
//$status = Status::getAll();

//Добавление статуса
//$status = Status::add('Потерян');

//Удаление статуса
//$status = Status::delete(6);

//Обновление статуса
//$status = Status::update(1, 'Ожидает');

// echo '<pre>';
// var_dump($status);
