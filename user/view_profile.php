<?php 
include_once '../config/core.php';

$require_login = true;
include_once '../login_checker.php';
include_once '../config/database.php';
include_once '../object/course.php';
include_once '../object/academic_year.php';
include_once '../object/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$course = new Course($db);
$academic_year = new Academic_year($db);


$user_id = $_SESSION['user_id'];
$user->id = $user_id;

$user->readOne();

$page_title = "Profile";
include_once 'sidebar.php'; 
include_once 'layout_head.php'; 


if ($_POST) {
    $image_profile=!empty($_FILES["image"]["name"])
            ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";
    $user->image_profile = $image_profile;

    $user->firstname = $_POST['firstname'];
    $user->lastname = $_POST['lastname'];
    $user->gender = $_POST['gender'];
    $user->academic_year = $_POST['academic_year'];
    $user->contact_no = $_POST['contact_no'];
    $user->course = $_POST['course'];
    $user->address = $_POST['address'];


    if ($user->updateProfile()) {
        echo $user->uploadPhoto();
        
        echo "<div class='message-box-success'>";
            echo "Profile Updated";
        echo "</div>";
    }else{
        echo "<div class='message-box-failed'>";
            echo "Please try again later.";
        echo "</div>";
    }
}
?>

<div class="panel_container" id="profile-container">
    <div class="panel_wrapper">
        <form class="account" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <div class="account_header">
                <h1 class="account_title">Account Setting</h1>
                <div class="btn_container">
                </div>
            </div>
            <div class="account_edit">
                <div class="input_container">
                    <label>Firstname</label>
                    <input type="text" name="firstname" placeholder="Firstname" value="<?php echo $user->firstname;?>" disabled>
                </div>
                <div class="input_container">
                    <label>Lastname</label>
                    <input type="text" name="lastname" placeholder="Lastname" value="<?php echo $user->lastname;?>" disabled>
                </div>
            </div>
            <div class="account_edit">
                <div class="input_container">
                    <?php
                        if ($user->gender== "") {
                            echo "<label disabled name='gender'>Gender</label>";
                            echo "<select name='gender' required>";
                                echo "<option value='' disabled selected></option>";
                                echo "<option>Male</option>";
                                echo "<option>Female</option>";
                            echo "</select>";
                        }else{
                            echo "<label disabled>Gender</label>";
                            echo "<input type='text' name='' value='{$user->gender}' disabled>";
                        }
                    ?>

                </div>

                <div class="input_container">
                    <label>Email</label>
                    <input type="text" name="email_address" placeholder="Email" value="<?php echo $user->email_address;?>" disabled>
                </div>
            </div>
            <div class="account_edit">

            </div>
            <div class="account_edit">
                <div class="input_container">
                    <label>Address</label>
                    <input type="text" name="address" placeholder="Address" value="<?php echo $user->address;?>" disabled>
                </div>
                <div class="input_container">
                    <label>Contact Number</label>
                    <input type="text" name="contact_no" placeholder="XXX-XXX-XXXX" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo $user->contact_no;?>" disabled>
                </div>
            </div>
            <div class="account_edit">
                <div class="input_container">
                    <label>Year Level</label>
                    <?php
                        $stmt = $academic_year->read();
                        echo "<select name='academic_year' disabled>";
                        echo "<option disabled selected>Select Academic Year</option>";
                        while ($row_academic = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $academic_id = $row_academic['id'];
                            $academic_year_name = $row_academic['academic_year'];

                            if ($user->academic_year==$academic_id) {
                                echo "<option value='$academic_id' selected>";
                            }else{
                                echo "<option value='$academic_id'>";
                            }
                            echo "$academic_year_name</option>";
                        }
                        echo "</select>";
                    ?>
                </div>
                <div class="input_container">
                    <label>Course</label>
                    <?php
                    $stmt = $course->read();
                    echo "<select name='course' disabled>";
                    echo "<option disabled>Select Course</option>";
                    while ($row_course = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $course_id = $row_course['id'];
                        $course_name = $row_course['name'];

                        if ($user->course==$course_id) {
                            echo "<option value='$course_id' selected>";
                        }else{
                            echo "<option value='$course_id'>";
                        }
                        
                        echo "$course_name</option>";
                    }
                    echo "</select>";
                    ?>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once 'layout_foot.php'; ?>