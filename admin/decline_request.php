<?php
// check if value was posted
if($_POST){
  
    // include database and object file
    include_once '../config/database.php';
    include_once '../object/order.php';
  
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
  
    // prepare product object
    $order = new Order($db);
      
    // set product id to be deleted
    $order->id = $_POST['object_id'];
    $order->status = "Declined";
      
    // delete the product
    if($order->declineRequest()){
        echo "Request was Decline.";
    }
      
    // if unable to update the product
    else{
        echo "Unable to update request.";
    }
}
?>