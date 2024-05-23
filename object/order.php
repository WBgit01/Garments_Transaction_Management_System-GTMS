<?php

class Order {
    
    private $conn;
    private $table_name = "orders";
    
    public $id;
    public $reference_no;
    public $student_id;
    public $garment_type;
    public $garment_id;
    public $amount;
    public $gender;
    public $notes;
    public $created;
    public $status;
    public $modified;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createOrder() {
        $this->created = date('Y-m-d H:i:s');

        // generate reference no.
        $digits = str_pad(mt_rand(0, 99), 4, '0', STR_PAD_LEFT);
        $randomNumber = str_pad(mt_rand(0, 999), 5, '0', STR_PAD_LEFT);
        $generated_reference_no = 'GTMS' . $digits . $randomNumber;

        $query = "INSERT INTO
                    " . $this->table_name . "
                    SET
                    reference_no = :reference_no,
                    student_id = :student_id,
                    amount = :amount,
                    garment_type = :garment_type,
                    garment_id = :garment_id,
                    gender = :gender,
                    status = :status,
                    created = :created";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':reference_no', $generated_reference_no);
        $stmt->bindParam(':student_id', $this->student_id);
        $stmt->bindParam(':amount', $this->amount);
        $stmt->bindParam(':garment_type', $this->garment_type);
        $stmt->bindParam(':garment_id', $this->garment_id);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':created', $this->created);

        if ($stmt->execute()) {
            return true;
        } else {
            $this->showError($stmt);
            return false;
        }
    }

    public function showError($stmt) {
        echo "<pre>";
        print_r($stmt->errorInfo());
        echo "</pre>";
    }

    public function countOrder() {
        $query = "SELECT COUNT(*) as order_count
                    FROM 
                    " . $this->table_name . "
                    WHERE
                    student_id = :student_id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':student_id', $this->student_id);
        // $stmt->bindParam(':status', $this->status);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $order_count = $row['order_count'];

        if ($order_count >= 3) {
            return true;
        } else {
            return false;
        }
    }

    public function readAll() {
        $query = "SELECT *
                    FROM   
                    " . $this->table_name ." 
                    WHERE student_id = :student_id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":student_id", $this->student_id);
        $stmt->execute();

        return $stmt;
    }

    public function readOne() {
        $query = "SELECT student_id, reference_no, amount, garment_type, garment_id, gender, notes, status, created
                    FROM
                    " . $this->table_name . "
                    WHERE
                    id = ?
                    LIMIT 0,1";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->reference_no = $row['reference_no'];
        $this->student_id = $row['student_id'];
        $this->amount = $row['amount'];
        $this->notes = $row['notes'];
        $this->gender = $row['gender'];
        $this->garment_type = $row['garment_type'];
        $this->garment_id = $row['garment_id'];
        $this->created = $row['created'];
        $this->status = $row['status'];
    }

    public function editRequest() {
        // Prepare the SQL query
        $query = "UPDATE 
                    " . $this->table_name . "
                    SET
                        garment_id = :garment_id,
                        status = :status
                    WHERE
                        id = :id";

        // Prepare the statement
        $stmt = $this->conn->prepare($query);
        $this->garment_id = htmlspecialchars(strip_tags($this->garment_id));
        $this->status = htmlspecialchars(strip_tags($this->status));


        // Bind parameters
        $stmt->bindParam(":garment_id", $this->garment_id);
        $stmt->bindParam(":id", $this->id);
        $stmt->bindparam(":status", $this->status);

        // Execute the statement
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if($result = $stmt->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function readRequest() {
        $query = "SELECT * 
                    FROM   
                    " . $this->table_name ." 
                    WHERE
                        status = 'Pending'";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function readUpdatedOrder() {
        $query = "SELECT * 
                    FROM   
                    " . $this->table_name ." 
                    WHERE
                        status = 'Updated' || status = 'Approved' ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    
    public function searchByReferenceNo($reference_no) {
        $reference_no = $reference_no ?? ''; // Ensure $reference_no is not null
        $query = "SELECT * FROM " . $this->table_name . " WHERE reference_no = :reference_no";
        $stmt = $this->conn->prepare($query);
        $reference_no = htmlspecialchars(strip_tags($reference_no)); // Strip tags from the input
        $stmt->bindParam(":reference_no", $reference_no);
        $stmt->execute();
        return $stmt;
    }
    
    public function readApprovedRequests() {
        $query = "SELECT * FROM orders WHERE status = 'approved'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readDeclinedRequests() {
        $query = "SELECT * FROM orders WHERE status = 'declined'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readUpdatedRequests() {
        $query = "SELECT * FROM orders WHERE status = 'updated'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    public function countUpdatedOrders() {
        $query = "SELECT COUNT(*) as count FROM orders WHERE status = 'updated'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'];
    }

    public function countDeclinedOrders() {
        $query = "SELECT COUNT(*) as count FROM orders WHERE status = 'declined'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'];
    }
    
    public function countOrderRequest() {
        $query = "SELECT COUNT(*) as order_count
                    FROM 
                    " . $this->table_name . "
                    WHERE
                    status = 'Approved'";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $order_count = $row['order_count'];
        return $order_count;
    }

    public function updateRequest() {
        // Prepare the SQL query
        $query = "UPDATE 
                    " . $this->table_name . "
                    SET
                        status = :status
                    WHERE
                        id = :id";

        // Prepare the statement
        $stmt = $this->conn->prepare($query);
        $this->status = htmlspecialchars(strip_tags($this->status));

        // Bind parameters
        $stmt->bindParam(":id", $this->id);
        $stmt->bindparam(":status", $this->status);

        // Execute the statement
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function declineRequest() {
        // Prepare the SQL query
        $query = "UPDATE 
                    " . $this->table_name . "
                    SET
                        status = :status
                    WHERE
                        id = :id";

        // Prepare the statement
        $stmt = $this->conn->prepare($query);
        $this->status = htmlspecialchars(strip_tags($this->status));

        // Bind parameters
        $stmt->bindParam(":id", $this->id);
        $stmt->bindparam(":status", $this->status);

        // Execute the statement
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

?>
