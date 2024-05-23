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

$user_id = $_SESSION['user_id'];
$user->getProfileimage($user_id);

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

$require_login = true;
include_once '../login_checker.php';

$page_title = "Request details";
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


<div class = "invoice-wrapper" id = "print-area">
            <div class = "invoice">
                <div class = "invoice-container">
                    <div class = "invoice-head">
                        <div class = "invoice-head-top">
                            <div class = "invoice-head-top-left text-start">
                                <img src = "../IMG/GTMS_logo1.png">
                            </div>
                            <div class = "invoice-head-top-right text-end">
                                <h3>Invoice</h3>
                            </div>
                        </div>
                        <div class = "hr"></div>
                        <div class = "invoice-head-middle">
                            <div class = "invoice-head-middle-left text-start">
                                <p><span class = "text-bold">Date: </span><?php echo $order->created; ?></p> <!-- date time function -->
                            </div>
                            <div class = "invoice-head-middle-right text-end">
                                <p><spanf class = "text-bold">Reference No: </span><?php echo $order->reference_no; ?></p>
                            </div>
                        </div>
                        <div class = "hr"></div>
                        <div class = "invoice-head-bottom">
                            <div class = "invoice-head-bottom-left">
                                <ul>
                                    <li class = 'text-bold'>Invoiced To: </li>
                                    <li>Name: <?php echo "<strong>$user->firstname</strong>"; echo " "; echo "<strong>$user->lastname</strong>"; ?> </li>
                                    <li>Student ID: <?php echo "<strong>{$order->student_id}</strong>"; ?></li> <!-- student id  -->
                                    <li>Address: <?php echo "<strong>{$user->address}</strong>"; ?></li> <!-- Address -->
                                </ul>
                            </div>
                            <div class = "invoice-head-bottom-right">
                                <ul class = "text-end">
                                    <li class = 'text-bold'>Pay To:</li>
                                    <li>Garments Inc.</li>
                                    <li>Marinduque, Philippines</li>
                                    <li>gtms.portal@gmail.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class = "overflow-view">
                        <div class = "invoice-body">
                            <table>
                                <thead>
                                    <tr>
                                        <td class = "text-bold">Product</td>
                                        <td class = "text-bold">Size</td>
                                        <td class = "text-bold">Price</td>
                                        <td class = "text-bold"></td>
                                        <td class = "text-bold"></td>
                                        <td class = "text-bold-bx1">Amount</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $order->garment_type; ?></td>
                                        <td><?php echo $garment_size->size . ' | ' . $garment_size->garment_measure; ?></td>
                                        <td><?php echo "₱". $order->amount; ?></td>
                                        <td></td>
                                        <td></td>
                                    <div class = "info-item-td text-end"></div>
                                        <td class = "text-end"><?php echo "₱". $order->amount; ?></td>
                                    </tr>
                                    <tr>
                                </tbody>
                            </table>
                            <div class = "invoice-body-bottom">
                                <div class = "invoice-body-info-item border-bottom">
                                    <div class = "info-item-td text-end text-bold">Sub Total:</div>
                                    <div class = "info-item-td text-end"><?php echo "₱". $order->amount; ?></div>
                                </div>
                                <div class = "invoice-body-info-item border-bottom">
                                    <div class = "info-item-td text-end text-bold">Tax:</div>
                                    <div class = "info-item-td text-end">
                                        <?php 
                                            $amount = $order->amount;
                                            $tax = $amount * 0.08;
                                            echo  "₱" . $tax . ".00";
                                        ?>
                                    </div>
                                </div>
                                <div class = "invoice-body-info-item">
                                    <div class = "info-item-td text-end text-bold">Total:</div>
                                    <div class = "info-item-td text-end">
                                        <?php
                                            $total = $amount + $tax;
                                            echo  "₱" . $total . ".00";

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "invoice-foot text-center">
                        <p><span class = "text-bold text-center">NOTE:&nbsp;</span>This is computer generated receipt and does not require physical signature.</p>

                        <div class = "invoice-btns">
                            <button type = "button" class = "invoice-btn" onclick="printInvoice()">
                                <span>
                                    <i class="fa-solid fa-print"></i>
                                </span>
                                <span>Print</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include_once 'layout_foot.php'; ?>


