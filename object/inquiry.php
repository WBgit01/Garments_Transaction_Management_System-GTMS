<?php
class Inquiry{
    private $conn;
    private $table_name ="inquiries";

    public $id;
    public $name;
    public $email;
    public $phone;
    public $message;
    public $created;

    public function __construct($db){
        $this->conn = $db;
    }

    function createInquiry(){
        $this->created = date("Y-m-d H:i:s");

        $query = "INSERT INTO
        " . $this->table_name ."
        SET
        name = :name,
        email = :email,
        phone = :phone,
        message = :message,
        created = :created";

        $stmt = $this->conn->prepare($query);

        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->message=htmlspecialchars(strip_tags($this->message));

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':message', $this->message);
        $stmt->bindParam(':created', $this->created);

        if($stmt->execute()){
            return true;
        }else {
            $this->showError($stmt);
            return false;
        }
    }
}