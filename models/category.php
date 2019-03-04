<?php 

require_once '../php/db.php';

class Category
{
    
    public $id;
    public $title;
    public $status;
    
    public function __construct($id)
    {
        global $mysqli;
        
        $query = "SELECT category_id, title, status FROM categories WHERE category_id=$id";
        $result = $mysqli->query($query);
        
        $category_data = $result->fetch_assoc();
        
        $this->id = $category_data['category_id'];
        $this->title = $category_data['title'];
        $this->status = $category_data['status'];
    }
    
    public static function getAll()
    {
        global $mysqli;

        $query = "SELECT category_id FROM categories";
        $result = $mysqli->query($query);
        
        $categories = [];
        while ($category_data = $result->fetch_assoc()) {
            $categories[] = new self($category_data['category_id']);
        }

        return $categories;
    }
    
    public function update($id, $title, $status)
    {
        $condition = [];
        if($title != false) {
            $condition[] = "title='$title'";
        }
        if($status != false) {
            $condition[] = "status='$status'";
        }
        
        $condition = implode(",", $condition);
        
        global $mysqli;
        
        $query = "UPDATE categories SET $condition WHERE category_id=$id";
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
        
        $query = "DELETE FROM categories WHERE category_id = $id";
        $result = $mysqli->query($query);
        
        if($result){
            return true;
        } else {
            return false;
        }
    }
    
}

//Получение всех категорий
//$category = Category::getAll();

//Получение определенной категории
//$category = new Category(1);

//Обновление категории
//$category = Category::update(1, 'Часы', 'active');

//Удаление категории
//$category = Category::delete(4);

//echo '<pre>';
//var_dump($category);