<?php

class Academic_year{
    
    private $conn;
    private $table_name = "academic_year";

    public $id;
    public $academic_year;
    public $created;
    public $modified;

    public function __construct($db){
        $this->conn = $db;
    }

    function read(){

        $query = "SELECT 
                    id, academic_year
                FROM
                    " . $this->table_name . "
                ORDER BY
                    id";
        
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    function readName(){

        $query = "SELECT academic_year FROM " . $this->table_name ." WHERE id = ? limit 0,1";

        $stmt= $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $this->academic_year = $row['academic_year'];
    }
}

?>