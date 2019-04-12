<?php 

require_once '../php/db.php';

class Brand
{
    
    public $id;
    public $category_id;
    public $category_title;
    public $brand_title;
    
    public static $limit_brand = 8;
    
    public function __construct($id)
    {
        global $mysqli;
        
        $query = "SELECT 
            b.brand_id,
            b.brand_title,
            b.category_id,
            c.title
        FROM brand b 
        LEFT JOIN categories c
        ON b.category_id = c.category_id
        WHERE brand_id=$id";
        $result = $mysqli->query($query);
        
        $brand_data = $result->fetch_assoc();
        
        $this->id = $brand_data['brand_id'];
        $this->category_id = $brand_data['category_id'];
        $this->category_title = $brand_data['title'];
        $this->brand_title = $brand_data['brand_title'];
    }
    
    public static function getAll($category_id = false, $page = false)
    {
        global $mysqli;
        
        $conditions = "";
        if ($category_id !== false){
            $conditions = "AND category_id = $category_id";
        }
        
        $query = "SELECT COUNT(*) as count FROM `brand` WHERE 1";
        $result = $mysqli->query($query);
        $count_data = $result->fetch_assoc();
            
        if ($page !== false){
            --$page;
            $limit = " LIMIT " . ($page * self::$limit_brand) . ", " . self::$limit_brand;  
        } else {
            $limit = "";
        }
        
        if ($count_data['count'] < ($page * self::$limit_brand)){
            return false;
        }
        
        $query = "SELECT brand_id FROM brand WHERE 1 $conditions $limit";
        $result = $mysqli->query($query);
        
        $brands = [];
        while ($brand_data = $result->fetch_assoc()) {
            $brands[] = new self($brand_data['brand_id']);
        }

        return [
            'brands' => $brands,
            'count' => $count_data['count']
        ];
    }
    
    public function add($brand_title, $category_id)
    {
        global $mysqli;

        $query = "INSERT INTO brand (brand_title, category_id)
                  VALUES ('$brand_title', '$category_id')";
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
        
        $query = "DELETE FROM brand WHERE brand_id = $id";
        $result = $mysqli->query($query);
        
        if($result){
            return true;
        } else {
            return false;
        }
    }
    
    public function update($id, $category_id, $brand_title)
    {
        $condition = [];
        if($brand_title != false) {
            $condition[] = "brand_title='$brand_title'";
        }
        if($category_id != false) {
            $condition[] = "category_id='$category_id'";
        }
        
        $condition = implode(",", $condition);
        
        global $mysqli;
        
        $query = "UPDATE brand SET $condition WHERE brand_id=$id";
        $result = $mysqli->query($query);

        if($result) {
            return true;
        } else {
            return false;
        }
    }
}

//Получение определнного бренда
//$brands = new Brand(1);

//Получение всех брендов
//$brands = Brand::getAll(false, 1);

//Добавление бренда
//$brands = Brand::add('JBL', 3);

//Удаление бренда
//$brands = Brand::delete(2);

//Обновление бренда
//$brands = Brand::update(10, 2, false);

// echo '<pre>';
// var_dump($brands);
