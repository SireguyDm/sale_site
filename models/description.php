<?php 

require_once '../php/db.php';

class Description
{
    
    public $id;
    public $zag;
    public $p1;
    public $p2;
    public $color;
    public $size;
    public $material;
    public $country;
    public $product_id;
    
    public function __construct($id)
    {
        global $mysqli;
        
        $query = "SELECT * FROM description WHERE product_id=$id";
        $result = $mysqli->query($query);
        
        $description_data = $result->fetch_assoc();
        
        $this->id = $description_data['description_id'];
        $this->zag = $description_data['description_zag'];
        $this->p1 = $description_data['description_p1'];
        $this->p2 = $description_data['description_p2'];
        $this->color = $description_data['color'];
        $this->size = $description_data['size'];
        $this->material = $description_data['material'];
        $this->country = $description_data['country'];
        $this->product_id = $description_data['product_id'];
    }
    
    public static function getAll()
    {
        global $mysqli;
        
        $query = "SELECT description_id FROM description";
        $result = $mysqli->query($query);
        
        $descriptions = [];
        while ($description_data = $result->fetch_assoc()) {
            $descriptions[] = new self($description_data['description_id']);
        }

        return $descriptions;
    }
    
    public function update($id, $zag=false, $p1=false, $p2=false, $color=false, $size=false, $material=false, $country=false)
    {   
        $condition = [];
        if($zag != false) {
            $condition[] = "zag='$zag'";
        }
        if($p1 != false) {
            $condition[] = "p1='$p1'";
        }
        if($p2 != false) {
            $condition[] = "p2='$p2'";
        }
        if($color != false) {
            $condition[] = "color='$color'";
        }
        if($size != false) {
            $condition[] = "size='$size'";
        }
        if($material != false) {
            $condition[] = "material='$material'";
        }
        if($country != false) {
            $condition[] = "country='$country'";
        }

        $condition = implode(",", $condition);

        global $mysqli;

        $query = "UPDATE description SET $condition WHERE product_id=$id";
        
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
        
        $query = "DELETE FROM description WHERE product_id = $id";
        $result = $mysqli->query($query);
        
        if($result){
            return true;
        } else {
            return false;
        }
    }
    
    public function add($zag=null, $p1=null, $p2=null, $color=null, $size=null, $material=null, $country=null, $product_id)
    {
        global $mysqli;

        $query = "INSERT INTO description (description_zag, description_p1, description_p2, color, size, material, country, product_id) VALUES ('$zag', '$p1', '$p2', '$color', '$size', '$material', '$country', '$product_id')";
        
        $result = $mysqli->query($query);

        if($result) {
            return true;
        } else {
            return false;
        }
    }
}

//Получение определенного описания
//$descriptions = new Description(1);

//Получение всех описаний
//$descriptions = Description::getAll();

//Обновление описания
//$descriptions = Description::update(1, false, false, false, false, false, 'Хлопок', false);

//Удаление описания 
//$descriptions = Description::delete(6);

//Добавление описания
//$descriptions = Description::add('null', 'null', 'null', 'null', 'null', 'null', 'null', 6);

//echo '<pre>';
//var_dump($descriptions);
