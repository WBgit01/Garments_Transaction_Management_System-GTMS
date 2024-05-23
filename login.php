<?php
include_once "config/core.php";


$page_title = "Login";
$require_login = false;
include_once "login_checker.php";
$access_denied = false;
include_once 'layout_head.php';

if($_POST){
    include_once "config/database.php";
    include_once "object/user.php";

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);

    $user->email_address=$_POST['email_address'];
    $user->student_id = $_POST['email_address'];

    $email_exists_or_studentid_exist = $user->emailExists();
    
    //validate the login creds
    
    if ($email_exists_or_studentid_exist && password_verify($_POST['password'], $user->password)) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['firstname'] = $user->firstname;
        $_SESSION['lastname'] = $user->lastname;
        $_SESSION['access_level'] = $user->access_level;
        $_SESSION['logged_in'] = true;
        $_SESSION['email_address'] = $user->email_address;
        $_SESSION['profile_image'] = $user->image;
        $_SESSION['student_id'] = $user->student_id;
        $_SESSION['academic_year'] = $user->academic_year;
        $_SESSION['gender'] = $user->gender;
        $_SESSION['profile_status'] = $user->profile_status;

        if ($user->access_level == "Admin") {
            $_SESSION['isAccessible'] = true;
            header("location:{$home_url}admin/index-admin.php?action=login_success");
        }else{
            header("location:{$home_url}user/index.php?action=login_success");
        }
    }else{

        $access_denied = true;
    }
}

// error messages
include_once 'alert-messages.php';
?>

<i class="fa-solid fa-xmark form_close"></i>
    <!-- LOGIN FORM -->
<div class="form login_form">
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
        <h3>Sign In</h3>
            <div class="input_box">
                <input type="text" placeholder="Enter Email or Student ID" name="email_address" required/>
                <i class="fa-regular fa-envelope email"></i>
            </div>

            <div class="input_box">
                <input type="password" name="password" placeholder="Enter your password"  required/>
                <i class="fa-solid fa-lock password"></i>
                <i class="fa-regular fa-eye-slash pwhide"></i>
            </div>

                    
            <div class="option_field">
                <span class="checkbox">
                    <input type="checkbox" id="check"/>
                    <label for="check">Remember me</label>
                </span>

                <a href="forgot_pw.php" class="forgot_pw">Forgot password?</a>
            </div>

            <button class="btn1" id="form-open">Login Now</button>

            <div class="login_signup">
                Don't have an account? <a href="#" class="signup">Sign Up now!</a>
            </div>
    </form>
</div>

<?php include_once 'layout_foot.php'; ?>