<?php 
$id = isset($_GET['oid']) ? $_GET['oid'] : die('Error: ID not Found');
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../object/order.php';
include_once '../object/garment_size.php';

$database = new Database();
$db = $database->getConnection();

$order = new Order($db);
$garment_size = new Garmentsize($db);

// order id property that will be edited
$order->id = $id;

$order->readOne();

$require_login = true;
include_once '../login_checker.php';

$page_title = "Request Update";
include_once 'sidebar.php'; 
include_once 'layout_head.php'; 

if ($_POST) {

    $order->status = "Updated";
    $order->garment_id = $_POST['garment_id'];

    // Update the order details
    if ($order->editRequest()) {
        echo "<div class='message-box-success'>";
            echo "Request details updated.";
        echo "</div>";
    } else {
        echo "<div class='message-box-failed'>";
            echo "ERROR: Update details failed";
        echo "</div>";
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?oid={$id}"; ?>" method="POST">
    <div class="panel_container" id="profile-container">
        <div class="panel_wrapper">

            <?php 
            if ($order->status == "Declined") {
                echo "<div class='status-message-declined'>";
                echo $order->status;
                echo "</div>";
            } elseif ($order->status == "Approved") {
                echo "<div class='status-message-approved'>";
                echo $order->status;
                echo "</div>";
            } elseif ($order->status == "Updated") {
                echo "<div class='status-message-updated'>";
                echo $order->status;
                echo "</div>";
            }
             else {
                echo "<div class='status-message-pending'>";
                echo $order->status;
                echo "</div>";
            }
            ?>
            
            <div class="input_container">
                <label>Reference No.</label>
                <input type="text" value="<?php echo $order->reference_no; ?>" disabled>
            </div>

            <div class="input_container">
                <label>Amount</label>
                <input type="text" value="<?php echo $order->amount; ?>" disabled>
            </div>

            <?php
            // GENDER == MALE - COLLEGE + SHS + PE
            if ($order->gender == "Male") {
                if ($order->garment_type == "Polo" || $order->garment_type == "Pants") {
                    echo "<div class='input_container'>";
                    echo "<label>$order->garment_type</label>";
                    $garment_size->gender = $order->gender;
                    $garment_size->garment_type = $order->garment_type;
                    $stmt = $garment_size->read();
                    echo "<select name='garment_id' required>";
                    echo "<option disabled>Select {$order->garment_type} Size</option>";
                    while ($row_polo_size = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row_polo_size);
                        $selected = ($order->garment_id == $id) ? "selected" : "";
                        echo "<option value='{$id}' $selected>{$size} - {$garment_measure}</option>";
                        }
                    echo "</select>";

                }elseif ($order->garment_type == "SHS Polo" || $order->garment_type == "SHS Pants") {
                    echo "<div class='input_container'>";
                    echo "<label>$order->garment_type</label>";
                    $garment_size->gender = $order->gender;
                    $garment_size->garment_type = $order->garment_type;
                    $stmt = $garment_size->read();
                    echo "<select name='garment_id' required>";
                    echo "<option disabled>Select {$order->garment_type} Size</option>";
                    while ($row_shs_size = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row_shs_size);
                        $selected = ($order->garment_id == $id) ? "selected" : "";
                        echo "<option value='{$id}' $selected>{$size} - {$garment_measure}</option>";
                        }
                    echo "</select>";

                        
                }elseif ($order->garment_type == "PE Polo Shirt") {
                    echo "<div class='input_container'>";
                    echo "<label>$order->garment_type</label>";
                    $garment_size->gender = $order->gender;
                    $garment_size->garment_type = "PE Polo Shirt";
                    $stmt_polo = $garment_size->read();
                    echo "<select name='polo_id' required>";
                    echo "<option disabled>Select Polo Size</option>";
                    while ($row_polo_size = $stmt_polo->fetch(PDO::FETCH_ASSOC)) {
                        extract($row_polo_size);
                        echo "<option value='{$id}'>{$size} - {$garment_measure}</option>";
                        }
                     echo "</select>";
                    
                }elseif ($order->garment_type == "PE Pants") {
                    echo "<div class='input_container'>";
                    echo "<label>$order->garment_type</label>";
                    $garment_size->gender = "Both";
                    $garment_size->garment_type = $order->garment_type;
                    $stmt_pants = $garment_size->read();
                    echo "<select name='garment_id' required>";
                    echo "<option disabled>Select Pants Size</option>";
                    while ($row_pants_size = $stmt_pants->fetch(PDO::FETCH_ASSOC)) {
                        extract($row_pants_size);
                        echo "<option value='{$id}'>{$size} - {$garment_measure}</option>";
                        }
                    echo "</select>";
                }
         
                // GENDER == FEMALE - COLLEGE + SHS + PE
            }elseif ($order->gender == "Female") {
                if ($order->garment_type == "Blouse" || $order->garment_type == "Skirt") {
                    echo "<div class='input_container'>";
                    echo "<label>$order->garment_type</label>";
                    $garment_size->gender = $order->gender;
                    $garment_size->garment_type = $order->garment_type;
                    $stmt = $garment_size->read();
                    echo "<select name='garment_id' required>";
                    echo "<option disabled>Select {$order->garment_type} Size</option>";
                    while ($row_size = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row_size);
                        $selected = ($order->garment_id == $id) ? "selected" : "";
                        echo "<option value='{$id}' $selected>{$size} - {$garment_measure}</option>";
                        }
                    echo "</select>";

                }elseif ($order->garment_type == "SHS Blouse" || $order->garment_type == "SHS Skirt") {
                    echo "<div class='input_container'>";
                    echo "<label>$order->garment_type</label>";
                    $garment_size->gender = $order->gender;
                    $garment_size->garment_type = $order->garment_type;
                    $stmt = $garment_size->read();
                    echo "<select name='garment_id' required>";
                    echo "<option disabled>Select {$order->garment_type} Size</option>";
                    while ($row_shs_size = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row_shs_size);
                        $selected = ($order->garment_id == $id) ? "selected" : "";
                        echo "<option value='{$id}' $selected>{$size} - {$garment_measure}</option>";
                    }
                    echo "</select>";

                }elseif ($order->garment_type == "PE Polo Shirt") {
                    echo "<div class='input_container'>";
                    echo "<label>$order->garment_type</label>";
                    $garment_size->gender = $order->gender;
                    $garment_size->garment_type = "PE Polo Shirt";
                    $stmt_polo = $garment_size->read();
                    echo "<select name='polo_id' required>";
                    echo "<option disabled>Select Polo Size</option>";
                    while ($row_polo_size = $stmt_polo->fetch(PDO::FETCH_ASSOC)) {
                        extract($row_polo_size);
                        echo "<option value='{$id}'>{$size} - {$garment_measure}</option>";
                    }
                    echo "</select>";

                }elseif ($order->garment_type == "PE Pants") {
                    echo "<div class='input_container'>";
                    echo "<label>$order->garment_type</label>";
                    $garment_size->gender = "Both";
                    $garment_size->garment_type = $order->garment_type;
                    $stmt_pants = $garment_size->read();
                    echo "<select name='garment_id' required>";
                    echo "<option disabled>Select Pants Size</option>";
                    while ($row_pants_size = $stmt_pants->fetch(PDO::FETCH_ASSOC)) {
                        extract($row_pants_size);
                        echo "<option value='{$id}'>{$size} - {$garment_measure}</option>";
                    }
                    echo "</select>";
                }
                
                
                }else {
                    $garment_size->gender = "Both";
                    $garment_size->garment_type = ["PE Pants", "PE Polo Shirt"];
                    $stmt = $garment_size->read();
                    echo "<div class='input_container'>";
                    foreach ($garment_size->garment_type as $type) {
                    echo "<label>$type</label>";
                    echo "<select name='garment_id' required>";
                    echo "<option disabled>Select {$type} Size</option>";
                    while ($row_pe_pants_size = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row_pe_pants_size);
                        if ($garment_type === $type) {
                        echo "<option value='{$id}'>{$garment_type}-{$size}-{$garment_measure}</option>";
                        }
                    }
                        echo "</select>";
                    }
                }
            ?>
        </div>
            <div class="btn_container">

            <button class="btn_save">Save</button>
        </div>
    </div>
</form>

<?php include_once 'layout_foot.php'; ?>