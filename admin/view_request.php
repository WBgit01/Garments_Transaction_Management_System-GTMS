<?php 
$id = isset($_GET['oid']) ? $_GET['oid'] : die('Error: ID not Found');
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../object/order.php';
include_once '../object/garment_size.php';
include_once '../object/user.php';

$database = new Database();
$db = $database->getConnection();


$order = new Order($db);
$garment_size = new Garmentsize($db);
$user = new User($db);

// order id property that will be edited
$order->id = $id;
$order->readOne();

$garment_id = $order->garment_id;

$garment_size->id = $garment_id;
$garment_size->readGarmentmeasure();

$student_id = $order->student_id;

//to get the name of the user base on student id 
$user->student_id = $student_id;
$user->readUser();


$page_title = "Request details";
$require_login = true;
include_once '../login_checker.php';
include_once 'sidebar.php'; 
include_once 'layout_head.php'; ?>

    <?php 
        if ($order->status == "Declined") {
            echo "<div class='status-message-declined'>";
                echo $order->status;
            echo "</div>";
        }elseif($order->status == "Approved"){
            echo "<div class='status-message-approved'>";
                echo $order->status;
            echo "</div>";
        }elseif($order->status == "Updated"){
            echo "<div class='status-message-updated'>";
                echo $order->status;
            echo "</div>";
        }
        else{
            echo "<div class='status-message-pending'>";
                echo $order->status;
            echo "</div>";
        }
    ?>

<div class="panel_container" id="profile-container">
    <div class="panel_wrapper">
        <div class="input_container">
            <label>Reference No.</label>
            <input type="text" value="<?php echo $order->reference_no; ?>" disabled>
        </div>

        <div class="input_container">
            <label>Amount</label>
            <input type="text" value="<?php echo $order->amount; ?>" disabled>
        </div>

        <div class="input_container">
            <label>Garment Type</label>
            <input type="text" value="<?php echo $order->garment_type; ?>" disabled>
        </div>

        <div class="input_container">
            <label>Garment Measure</label>
            <?php
                if ($order->garment_id != "Not set") {
                    $garment_size->id = $order->garment_id;
                    $garment_size->readGarmentmeasure();
                    echo "<input type='text' value='{$garment_size->garment_measure}' disabled>";
                } else {
                    echo "<input type='text' value='Size is not set' disabled>";
                }
                ?>
            </div>
            
            <div class="input_container">
                <label>Size</label>
            <?php
                $garment_size->id = $order->garment_id;
                $garment_size->readGarmentmeasure();
                echo "<input type='text' value='{$garment_size->size}' disabled>";
            ?>
            </div>
        </div>
    </div>
</div>
    
<?php include_once 'layout_foot.php'; ?>


