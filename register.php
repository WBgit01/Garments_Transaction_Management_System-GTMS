<?php
include_once "config/database.php";
include_once "config/core.php";
include_once "object/user.php";


$database = new Database;
$db = $database->getConnection();
$user = new User($db);

// page layout
$page_title = "Register";
include_once 'layout_head.php';

$require_login = false;
include_once 'login_checker.php';

if ($_POST) {
    $user->firstname = $_POST['firstname'];
    $user->lastname = $_POST['lastname'];
    $user->email_address = $_POST['email_address'];
    $user->contact_no = $_POST['contact_no'];
    $user->password = $_POST['password'];
    $user->access_level = "Student";
    $confirm_password = $_POST['confirm_password'];



    // check the post Data before saving to database
    if ($user->emailExisted()) {
        echo "<div class='message-box-failed'>";
            echo "<span></span>";
            echo "Email address is already taken.";
        echo "</div>";
    }
    elseif ($user->contactExisted()){
        echo "<div class='message-box-failed'>";
            echo "Contact number is already taken.";
        echo "</div>";
    }
    elseif($confirm_password != $_POST['password']){
        echo "<div class='message-box-failed'>";
            echo "Confirm Password is not matched!";
        echo "</div>";
    }
    else{
        $user->createUser();
        echo "<div class='message-box-success'>";
            echo "Info submitted";
        echo "</div>";
    }

}
?>
<i class="fa-solid fa-xmark form_close"></i>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        
    <h3>Sign Up</h3>
    <div class="input_box">
        <input type="name" name="firstname" placeholder="First Name" required/>
        <i class="fa-regular fa-user name"></i>
    </div>

    <div class="input_box">
        <input type="name" name="lastname" placeholder="Last Name" required/>
            <i class="fa-regular fa-user name"></i>
    </div>

    <div class="input_box">
        <input type="email" name="email_address" placeholder="Email Address" required/>
            <i class="fa-regular fa-envelope email"></i>
    </div>

    <div class="input_box">
        <input type="tel" name="contact_no" placeholder="XXX-XXX-XXXX" required pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" />
            <i class="fa-solid fa-phone email"></i>
    </div>

    <div class="input_box">
        <input type="password" name="password" placeholder="Create password" required/>
        <i class="fa-solid fa-lock password"></i>
        <i class="fa-regular fa-eye-slash pwhide"></i>
    </div>

    <div class="input_box">
        <input type="password" name="confirm_password" placeholder="Confirm password" required/>
        <i class="fa-solid fa-lock password"></i>
        <i class="fa-regular fa-eye-slash pwhide"></i>
    </div>
            
    <button class="btn1" type="submit">Sign Up</button>

    <div class="login_signup">
        Already have an account? <a href="login.php" id="login-link">Sign In Now!</a>
    </div>
</form>

<?php include_once 'layout_foot.php'; ?>
