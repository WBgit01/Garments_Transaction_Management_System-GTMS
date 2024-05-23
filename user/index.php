<?php 
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../object/order.php';
include_once '../object/user.php';


$database = new Database();
$db = $database->getConnection();

$order = new Order($db);
$user = new User($db);

$user_id = $_SESSION['user_id'];
$user->getProfileimage($user_id);


$order->student_id = $_SESSION['student_id'];
$stmt = $order->readAll();
$num = $stmt->rowCount();

$require_login = true;
include_once '../login_checker.php';

$page_title = "Dashboard";
include_once 'sidebar.php'; 
include_once 'layout_head.php'; 
?>

<!-- MAIN CONTENT||BODY -->
<div class="main_content">
    <div class="header_wrapper">
        <div class="header_title">
            <span>Welcome Back!</span>
            <h2>
                <?php 
                echo $_SESSION['firstname']; 
                echo " ";
                echo $_SESSION['lastname']; 
                ?>
            </h2>
        </div>
        <div class="user_info">
        </div>
    </div>

    <div class="panel_container">
        <h3 class="main_title">Orders Request</h3>
        <div class="panel_wrapper">
            <?php
            if ($num > 0 ) {
                echo "<div class='table_container'>";
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Reference No</th>";
                echo "<th>Order Created</th>";
                echo "<th>Status</th>";
                echo "<th>Garment Type</th>";
                echo "<th>Note</th>";
                echo "<th>Action</th>";
                echo "</tr>";
                echo "</thead>";

                echo "<tbody>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);

                    echo "<tr>";
                    echo "<td>{$reference_no}</td>";
                    echo "<td>{$created}</td>";
                    echo "<td>";
                    if ($status == "Pending") {
                        echo "<div class='status-message-pending'>";
                            echo "{$status}";
                        echo "</div>";
                    }elseif($status == "Approved"){
                        echo "<div class='status-message-approved'>";
                            echo "{$status}";
                        echo "</div>";
                    }elseif($status == "Updated"){
                        echo "<div class='status-message-updated'>";
                            echo "{$status}";
                        echo "</div>";
                    }
                    else{
                        echo "<div class='status-message-declined'>";
                            echo "{$status}";
                        echo "</div>";
                    }
                    echo "</td>";

                    echo "<td>";
                        echo "{$garment_type}";
                    echo "</td>";

                    echo "<td>";
                        if ($status == "Pending") {
                            echo "<strong>Please set your Size. Update this Order</strong>";
                        }else{
                        
                        }
                        echo "{$notes}";
                    echo "</td>";
                    echo "<td>";
                        if ($status == "Pending") {
                            echo "<a href='update_request.php?oid={$id}' class='action_btn2'>Update</a>";
                            echo "<a delete-id='{$id}' class='action_btn3 delete-object'>Delete</a>";
                        }elseif($status == "Approved"){
                            echo "<a href='{$home_url}user/view_request.php?oid={$id}' class='action_btn1'>View</a>";
                        }elseif($status == "Updated"){
                            echo "<a href='{$home_url}user/view_request.php?oid={$id}' class='action_btn1'>View</a>";
                        }
                        else{
                            echo "<a href='{$home_url}user/view_request.php?oid={$id}' class='action_btn1'>View</a>";
                            echo "<a delete-id='{$id}' class='action_btn3 delete-object'>Delete</a>";                           
                        }
                        
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "<tfoot>";
                echo "<tr>";
                echo "<td colspan='7' class='table_foot'>UNIFORM REQUEST DATA</td>";
                echo "</tr>";
                echo "</tfoot>";
                echo "</table>";
                echo "</div>";
            }else{
                echo "<div class='message-box-failed'>";
                    echo "No uniform request.";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</div>

<?php 
include_once 'layout_foot.php'; 
?>
