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
    
}

//$descriptions = Description::getAll();
//$descriptions = new Description(1);
//var_dump($descriptions);
