<?php

class Garmentsize{


    private $conn;
    private $table_name = "garment_sizes";

    public $id;
    public $size;
    public $gender;
    public $garment_type;
    public $garment_measure;

    public function __construct($db){
        $this->conn = $db;
    }

    
    function read(){

        $query = "SELECT 
                    id, size, garment_type, gender, garment_measure
                FROM 
                ". $this->table_name . "
                WHERE gender = ? && garment_type = ? ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->gender);
        $stmt->bindParam(2, $this->garment_type);
        $stmt->execute();
        return $stmt;
    }

    function readGarmentmeasure(){
        $query = "SELECT garment_measure, size FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
    
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($row) { // Check if $row is not empty
            $this->garment_measure = $row['garment_measure'];
            $this->size = $row['size'];
            return true; // Return true to indicate success
        } else {
            return false; // Return false if no rows were returned
        }
    }
    
}

?>