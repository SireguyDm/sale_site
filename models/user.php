<?php 

require_once '../php/db.php';

class User
{
    
    public $id;
    public $user_name;
    public $login;
    public $pass;
    public $role;
    
    public function __construct($id)
    {
        global $mysqli;
        
        $query = "SELECT * FROM users WHERE user_id=$id";
        $result = $mysqli->query($query);
        
        $user_data = $result->fetch_assoc();
        
        $this->id = $user_data['user_id'];
        $this->user_name = $user_data['name'];
        $this->login = $user_data['login'];
        $this->pass = $user_data['pass'];
        $this->role = $user_data['role'];
    }
    
    public static function getAll()
    {
        global $mysqli;
        
        $query = "SELECT user_id FROM users";
        $result = $mysqli->query($query);
        
        $users = [];
        while ($user_data = $result->fetch_assoc()) {
            $users[] = new self($user_data['user_id']);
        }

        return $users;
    }
    
    public function add($user_name, $login, $pass, $role)
    {
        global $mysqli;

        $query = "INSERT INTO users (name, login, pass, role)
                  VALUES ('$user_name', '$login', '$pass', '$role')";
        $result = $mysqli->query($query);

        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function update($id, $user_name = false, $login = false, $pass = false, $role = false)
    {   
        $condition = [];
        if($user_name != false) {
            $condition[] = "name='$user_name'";
        }
        if($login != false) {
            $condition[] = "login='$login'";
        }
        if($pass != false) {
            $condition[] = "pass='$pass'";
        }
        if($role != false) {
            $condition[] = "role='$role'";
        }

        $condition = implode(",", $condition);

        global $mysqli;

        $query = "UPDATE users SET $condition WHERE user_id=$id";
        
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
        
        $query = "DELETE FROM users WHERE user_id = $id";
        $result = $mysqli->query($query);
        
        if($result){
            return true;
        } else {
            return false;
        }
    }
}

//Получение определнного пользователя
//$user = new User(1);

//Получение всех пользователей
//$user = User::getAll();

//Добавление пользователя
//$user = User::add('Сергей', 'proba', '1234', '1');


//Обновление пользователя
//$user = User::update(1, false, false, '123', false);

//Удаление пользователя
//$user = User::delete(4);

// echo '<pre>';
// var_dump($user);
