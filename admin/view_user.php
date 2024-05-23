<?php

$id = isset($_GET['uid']) ? $_GET['uid'] : die('Error: ID not Found');

include_once '../config/core.php';
include_once '../config/database.php';
include_once '../object/user.php';
include_once '../object/academic_year.php';
include_once '../object/course.php';


$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$academic_year = new Academic_year($db);
$course = new Course($db);

$user->id = $id;
$user->readOne();

$page_title = "User Details";
include_once 'sidebar.php';
include_once "layout_head.php";
?>

<div class="panel_container" id="profile-container">
    <div class="panel_wrapper">
        <form class="account" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <div class="account_header">
                <h1 class="account_title">Details</h1>
            </div>
            <div class="account_edit">
                <div class="input_container">
                    <label>Firstname</label>
                    <input type="text" name="firstname" placeholder="Firstname" value="<?php echo $user->firstname;?>" disabled>
                </div>
                <div class="input_container">
                    <label>Lastname</label>
                    <input type="text" name="lastname" placeholder="Lastname" value="<?php echo $user->lastname;?>"disabled>
                </div>
            </div>
            <div class="account_edit">
                <div class="input_container">
                <label>Gender</label>
                <input type="text" name="gender" placeholder="Email" value="<?php echo $user->gender;?>" required disabled>
                </div>

                <div class="input_container">
                    <label>Email</label>
                    <input type="text" name="email_address" placeholder="Email" value="<?php echo $user->email_address;?>" required disabled>
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
            <div class="account_edit">
            </div>
        </form>
    </div>
</div>

<?php include_once 'layout_foot.php'; ?>