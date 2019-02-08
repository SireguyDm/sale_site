<?php 

require_once '../php/db.php';

class Category
{
    
    public $id;
    public $title;
    
    public function __construct($id)
    {
        global $mysqli;
        
        $query = "SELECT category_id, title FROM categories WHERE category_id=$id";
        $result = $mysqli->query($query);
        
        $category_data = $result->fetch_assoc();
        
        $this->id = $category_data['category_id'];
        $this->title = $category_data['title'];
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
    
    public function update($id=false, $title=false)
    {
        global $mysqli;
        
        $query = "UPDATE categories SET title = '$title' WHERE category_id=$id";
        $result = $mysqli->query($query);

        if($result) {
            $categories = new self($id);
            return $categories;
        } else {
            return false;
        }
    }
    
}


//$category = new Category(3);
//$category->update(3, 'привет');
// $category = new Category(2);
// var_dump($category);