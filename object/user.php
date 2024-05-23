<?php

class User {

	private $conn;
	private $table_name = "users";

	public $id;
	public $firstname;
	public $lastname;
	public $student_id;
	public $access_level;
	public $email_address;
	public $contact_no;
	public $password;
	public $created;
	public $course;
	public $academic_year;
	public $address;
	public $gender;
	public $image_profile;
	public $profile_status;
	public $modified;


	public function __construct($db) {
		$this->conn = $db;
	}

	function createUser(){

		
		$this->created = date('Y-m-d H:i:s');

		// Password hash
		$password_hash = password_hash($this->password, PASSWORD_BCRYPT);

		$query  = "INSERT INTO 
					" . $this->table_name ."
					SET
					firstname = :firstname,
					lastname = :lastname,
					student_id = :student_id,
					access_level = :access_level,
					email_address = :email_address,
					password = :password, 
					contact_no = :contact_no, 
					created = :created"; 

		$stmt = $this->conn->prepare($query);

		//sanitize
		$this->firstname=htmlspecialchars(strip_tags($this->firstname));
		$this->lastname=htmlspecialchars(strip_tags($this->lastname));
		$this->access_level=htmlspecialchars(strip_tags($this->access_level));
		$this->email_address=htmlspecialchars(strip_tags($this->email_address));
		$this->password=htmlspecialchars(strip_tags($this->password));
		$this->contact_no=htmlspecialchars(strip_tags($this->contact_no));
		// $this->address=htmlspecialchars(strip_tags($this->address));

		//password hash
		$password_hash = password_hash($this->password, PASSWORD_BCRYPT);

		// generate Student ID
		$digits = str_pad(mt_rand(0, 99), 2, '0', STR_PAD_LEFT);
		$randomNumber = str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);
		$generated_student_id = $digits . 'b' . $randomNumber;


		$stmt->bindParam(':firstname', $this->firstname);
		$stmt->bindParam(':lastname', $this->lastname);
		$stmt->bindParam(':student_id', $generated_student_id);
		$stmt->bindParam(':access_level', $this->access_level);
		$stmt->bindParam(':email_address', $this->email_address);
		$stmt->bindParam(':contact_no', $this->contact_no);
		// $stmt->bindParam(':address', $this->address);
		$stmt->bindParam(':password', $password_hash);
		$stmt->bindParam(':created', $this->created);

		if ($stmt->execute()) {
			return true;
		} else {
			$this->showError($stmt);
			return false;
		}
	}

	// Method to display errors
	public function showError($stmt) {
		echo "<pre>";
		print_r($stmt->errorInfo());
		echo "</pre>";
	}

	// check if given email exist in the database
	function emailExists(){
		// query to check if email exists
		$query = "SELECT id, firstname, lastname, student_id, address, contact_no, access_level, profile_status, gender, academic_year, password, image_profile
				FROM " . $this->table_name . "
				WHERE email_address = ? OR student_id = ?
				LIMIT 0,1";
		// prepare the query
		$stmt = $this->conn->prepare( $query );
		// sanitize
		$this->email_address=htmlspecialchars(strip_tags($this->email_address));
		// bind given email value
		$stmt->bindParam(1, $this->email_address);
		$stmt->bindParam(2, $this->student_id);
		$stmt->execute();
		// get number of rows
		$num = $stmt->rowCount();
		// if email exists, assign values to object properties for easy access and use for php sessions
		if($num>0){
			// get record details / values
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			// assign values to object properties
			$this->id = $row['id'];
			$this->firstname = $row['firstname'];
			$this->lastname = $row['lastname'];
			$this->access_level = $row['access_level'];
			$this->password = $row['password'];
			$this->image_profile = $row['image_profile'];
			$this->student_id = $row['student_id'];
			$this->gender = $row['gender'];
			$this->contact_no = $row['contact_no'];
			$this->address = $row['address'];
			$this->academic_year = $row['academic_year'];
			$this->profile_status = $row['profile_status'];
			// return true because email exists in the database
			return true;
		}
		// return false if email does not exist in the database
		return false;
	}

	function emailExisted(){
		// query to check if email exists
		$query = "SELECT id
				FROM " . $this->table_name . "
				WHERE email_address = ?
				LIMIT 0,1";

		// prepare the query
		$stmt = $this->conn->prepare( $query );
		// sanitize
		$this->email_address=htmlspecialchars(strip_tags($this->email_address));

		// bind given email value
		$stmt->bindParam(1, $this->email_address);
		$stmt->execute();
		// get number of rows
		$num = $stmt->rowCount();

		if($num>0){
			// contact or email is existed
			return true;
		}else{
			return false;
		}
	}

	function contactExisted(){
		// query to check if email exists
		$query = "SELECT id
				FROM " . $this->table_name . "
				WHERE contact_no = ?
				LIMIT 0,1";

		// prepare the query
		$stmt = $this->conn->prepare( $query );
		// sanitize
		$this->contact_no=htmlspecialchars(strip_tags($this->contact_no));

		// bind given email value
		$stmt->bindParam(1, $this->contact_no);
		$stmt->execute();
		// get number of rows
		$num = $stmt->rowCount();

		if($num>0){
			// contact or email is existed
			return true;
		}else{
			return false;
		}
	}

	function updateProfile(){

		$this->modified = date('Y-m-d H:i:s');


		$query = "UPDATE
					" . $this->table_name . "
					SET
					firstname = :firstname,
					lastname = :lastname,
					gender = :gender,
					contact_no = :contact_no,
					academic_year = :academic_year,
					course = :course,
					address = :address,
					image_profile = :image_profile,
					modified = :modified,
					profile_status = :profile_status
					WHERE
						id = :id";
		

		$stmt = $this->conn->prepare($query);

		$this->id=htmlspecialchars(strip_tags($this->id));
		$this->firstname=htmlspecialchars(strip_tags($this->firstname));
		$this->lastname=htmlspecialchars(strip_tags($this->lastname));
		$this->image_profile=htmlspecialchars(strip_tags($this->image_profile));
		$this->gender=htmlspecialchars(strip_tags($this->gender));
		$this->contact_no=htmlspecialchars(strip_tags($this->contact_no));
		$this->academic_year=htmlspecialchars(strip_tags($this->academic_year));
		$this->course=htmlspecialchars(strip_tags($this->course));
		$this->address=htmlspecialchars(strip_tags($this->address));
		$this->profile_status=htmlspecialchars(strip_tags($this->profile_status));

		$stmt->bindParam(':id', $this->id);
		$stmt->bindParam(':image_profile', $this->image_profile);
		$stmt->bindParam(':firstname', $this->firstname);
		$stmt->bindParam(':lastname', $this->lastname);
		$stmt->bindParam(':gender', $this->gender);
		$stmt->bindParam(':contact_no', $this->contact_no);
		$stmt->bindParam(':academic_year', $this->academic_year);
		$stmt->bindParam(':course', $this->course);
		$stmt->bindParam(':address', $this->address);
		$stmt->bindParam(':modified', $this->modified);
		$stmt->bindParam(':profile_status', $this->profile_status);

		if ($stmt->execute()) {
			return true;
		}else{
			return false;
		}
	}



	function adminUpdateProfile(){

		$this->modified = date('Y-m-d H:i:s');


		$query = "UPDATE
					" . $this->table_name . "
					SET
					firstname = :firstname,
					lastname = :lastname,
					gender = :gender,
					contact_no = :contact_no,
					academic_year = :academic_year,
					course = :course,
					address = :address,
					modified = :modified
					WHERE
						id = :id";
		

		$stmt = $this->conn->prepare($query);

		$this->id=htmlspecialchars(strip_tags($this->id));
		$this->firstname=htmlspecialchars(strip_tags($this->firstname));
		$this->lastname=htmlspecialchars(strip_tags($this->lastname));
		$this->gender=htmlspecialchars(strip_tags($this->gender));
		$this->contact_no=htmlspecialchars(strip_tags($this->contact_no));
		$this->academic_year=htmlspecialchars(strip_tags($this->academic_year));
		$this->course=htmlspecialchars(strip_tags($this->course));
		$this->address=htmlspecialchars(strip_tags($this->address));

		$stmt->bindParam(':id', $this->id);
		$stmt->bindParam(':firstname', $this->firstname);
		$stmt->bindParam(':lastname', $this->lastname);
		$stmt->bindParam(':gender', $this->gender);
		$stmt->bindParam(':contact_no', $this->contact_no);
		$stmt->bindParam(':academic_year', $this->academic_year);
		$stmt->bindParam(':course', $this->course);
		$stmt->bindParam(':address', $this->address);
		$stmt->bindParam(':modified', $this->modified);


		if ($stmt->execute()) {
			return true;
		}else{
			return false;
		}
	}

	function readOne(){
		
		$query = "SELECT 
					firstname,
					lastname,
					student_id,
					image_profile,
					gender,
					email_address,
					contact_no,
					address,
					course,
					academic_year					
				FROM 
					" . $this->table_name . "
				WHERE 
					id = ?
				LIMIT 0,1";
		
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->firstname = $row['firstname'];
		$this->lastname =  $row['lastname'];
		$this->student_id =  $row['student_id'];
		$this->gender =  $row['gender'];
		$this->email_address =  $row['email_address'];
		$this->contact_no =  $row['contact_no'];
		$this->address =  $row['address'];
		$this->course =  $row['course'];
		$this->academic_year = $row['academic_year'];
		$this->image_profile=$row['image_profile'];

	}

	// will upload image file to server
	function uploadPhoto(){
		$result_message = "";
		
		if ($this->image_profile) {
			// sha1_file() function is used to make a unique file name
			$target_directory = "uploads/{$_SESSION['user_id']}/";
			$target_file = $target_directory . basename($this->image_profile);
			$file_type = pathinfo($target_file, PATHINFO_EXTENSION);
	
			// make sure certain file types are allowed
			$allowed_file_types = array("jpg", "jpeg", "png", "gif");
			if (!in_array($file_type, $allowed_file_types)) {
				$result_message .= "<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
			}
			
			// make sure the 'uploads' folder exists, if not, create it
			if (!is_dir($target_directory)) {
				mkdir($target_directory, 0777, true);
			}
	
			// check if the file already exists
			if (file_exists($target_file)) {
				$result_message .= "<div>Image already exists. Try to change file name.</div>";
			}
	
			// make sure submitted file is not too large, can't be larger than 1 MB
			if ($_FILES['image']['size'] > (1024000)) {
				$result_message .= "<div class='message-box-failed'>Image must be less than 1 MB in size.</div>";
			}
	
			// if there are no errors, try to upload the file
			if (empty($result_message)) {
				if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
					$result_message = "<div class='alert alert-success'>Photo uploaded successfully.</div>";
				} else {
					$result_message = "<div class='alert alert-danger'>Unable to upload photo.</div>";
				}
			}
		}
		return $result_message;
	}

	function countUser(){

		$query = "SELECT COUNT(*) as user_count
					FROM 
					" . $this->table_name . "
					WHERE
					access_level = 'student'";
		
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$user_count = $row['user_count'];
		return $user_count;
	}

	function getProfileimage($user_id){
			$query = "SELECT image_profile
					
		FROM 
			" . $this->table_name . "
		WHERE 
			id = {$user_id}
		LIMIT 0,1";

		$stmt = $this->conn->prepare($query);


		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->image_profile=$row['image_profile'];
	}

	function readUser(){

		$query = "SELECT firstname, lastname, address
				FROM
			" . $this->table_name . "
				WHERE 
					student_id = ?";
		
		$stmt = $this->conn->prepare($query);
		
		$stmt->bindParam(1, $this->student_id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->firstname = $row['firstname']; 
		$this->lastname = $row['lastname'];
		$this->address = $row['address'];
	}

	function delete(){
  
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
          
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
      
        if($result = $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
	
}

?>
