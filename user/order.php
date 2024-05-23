<?php 
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../object/order.php';
include_once '../object/user.php';
include_once '../object/academic_year.php';

$database = new Database();
$db = $database->getConnection();

$order = new Order($db);
$user = new User($db);
$academic_year = new Academic_year($db);

// to show profile for each webpage
$user_id = $_SESSION['user_id'];
$user->getProfileimage($user_id);

$require_login = true;
include_once '../login_checker.php';

$page_title = "Order Form";
include_once 'sidebar.php'; 
include_once 'layout_head.php'; 

$order->student_id = $_SESSION['student_id'];
$order_count = $order->countOrder();

if ($_POST) {
    switch ($_POST['uniform']) {

        case 'uniform_men_polo':
            $order->amount = "300.00";
            $order->status = "Pending";
            $order->garment_type = "Polo";
            $order->gender = $_SESSION['gender'];
            $order->garment_id = "Not set";
            $order->student_id = $_SESSION['student_id'];
            
            if ($order->countOrder()) {
                echo "<div class='message-box-failed'>";
                    echo "FAILED! You have pending Uniform Request please wait for the approval before making any Request. Limited (3) Request";
                echo "</div>";
            }else{
                $order->createOrder();
                echo "<div class='message-box-success'>";
                    echo "Uniform Request Submit, please check your Order and the status";
                echo "</div>";
            }
            break;

            case 'uniform_men_pants':
                $order->amount = "350.00";
                $order->status = "Pending";
                $order->garment_type = "Pants";
                $order->gender = $_SESSION['gender'];
                $order->garment_id = "Not set";
                $order->student_id = $_SESSION['student_id'];
                
                if ($order->countOrder()) {
                    echo "<div class='message-box-failed'>";
                        echo "FAILED! You have pending Uniform Request please wait for the approval before making any Request. Limited (3) Request";
                    echo "</div>";
                }else{
                    $order->createOrder();
                    echo "<div class='message-box-success'>";
                        echo "Uniform Request Submit, please check your Order and the status";
                    echo "</div>";
                }
            break;

        case 'uniform_women_blouse':
            $order->amount = "340.00";
            $order->status = "Pending";
            $order->garment_type = "Blouse";
            $order->gender = $_SESSION['gender'];
            $order->garment_id = "Not set";
            $order->student_id = $_SESSION['student_id'];
                
            if ($order->countOrder()) {
                echo "<div class='message-box-failed'>";
                    echo "FAILED! You have pending Uniform Request please wait for the approval before making any Request. Limited (3) Request";
                echo "</div>";
            }else{
                $order->createOrder();
                echo "<div class='message-box-success'>";
                    echo "Uniform Request Submit, please check your Order and the status";
                echo "</div>";
            }
        break;

        case 'uniform_women_skirt':
            $order->amount = "330.00";
            $order->status = "Pending";
            $order->garment_type = "Skirt";
            $order->gender = $_SESSION['gender'];
            $order->garment_id = "Not set";
            $order->student_id = $_SESSION['student_id'];
                
            if ($order->countOrder()) {
                echo "<div class='message-box-failed'>";
                    echo "FAILED! You have pending Uniform Request please wait for the approval before making any Request. Limited (3) Request";
                echo "</div>";
            }else{
                $order->createOrder();
                echo "<div class='message-box-success'>";
                    echo "Uniform Request Submit, please check your Order and the status";
                echo "</div>";
            }
        break;


        case 'pe_attire_polo':
            $order->amount = "355.00";
            $order->status = "Pending";
            $order->garment_type = "PE Polo Shirt";
            $order->gender = $_SESSION['gender'];
            $order->garment_id = "Not set";
            $order->student_id = $_SESSION['student_id'];
                        
            if ($order->countOrder()) {
                echo "<div class='message-box-failed'>";
                    echo "FAILED! You have pending Uniform Request please wait for the approval before making any Request. Limited (3) Request";
                echo "</div>";
            }else{
                $order->createOrder();
                echo "<div class='message-box-success'>";
                    echo "Uniform Request Submit, please check your Order and the status";
                echo "</div>";
            }
        break;

        case 'pe_attire_pants':
            $order->amount = "350.00";
            $order->status = "Pending";
            $order->garment_type = "PE Pants";
            $order->gender = $_SESSION['gender'];
            $order->garment_id = "Not set";
            $order->student_id = $_SESSION['student_id'];

            if ($order->countOrder()) {
                echo "<div class='message-box-failed'>";
                    echo "FAILED! You have pending Uniform Request please wait for the approval before making any Request. Limited (3) Request";
                echo "</div>";
            }else{
                $order->createOrder();
                echo "<div class='message-box-success'>";
                    echo "Uniform Request Submit, please check your Order and the status";
                echo "</div>";
            }
        break;

        case 'shs_polo_men':
            $order->amount = "350.00";
            $order->status = "Pending";
            $order->garment_type = "SHS Polo";
            $order->gender = $_SESSION['gender'];
            $order->garment_id = "Not set";
            $order->student_id = $_SESSION['student_id'];
                        
            if ($order->countOrder()) {
                echo "<div class='message-box-failed'>";
                    echo "FAILED! You have pending Uniform Request please wait for the approval before making any Request. Limited (3) Request";
                echo "</div>";
            }else{
                $order->createOrder();
                echo "<div class='message-box-success'>";
                    echo "Uniform Request Submit, please check your Order and the status";
                echo "</div>";
            }
        break;

        case 'shs_pants_men':
            $order->amount = "345.00";
            $order->status = "Pending";
            $order->garment_type = "SHS Pants";
            $order->gender = $_SESSION['gender'];
            $order->garment_id = "Not set";
            $order->student_id = $_SESSION['student_id'];
                        
            if ($order->countOrder()) {
                echo "<div class='message-box-failed'>";
                    echo "FAILED! You have pending Uniform Request please wait for the approval before making any Request. Limited (3) Request";
                echo "</div>";
            }else{
                $order->createOrder();
                echo "<div class='message-box-success'>";
                    echo "Uniform Request Submit, please check your Order and the status";
                echo "</div>";
            }
        break;

        case 'shs_blouse_women':
            $order->amount = "335.00";
            $order->status = "Pending";
            $order->garment_type = "SHS Blouse";
            $order->gender = $_SESSION['gender'];
            $order->garment_id = "Not set";
            $order->student_id = $_SESSION['student_id'];
                        
            if ($order->countOrder()) {
                echo "<div class='message-box-failed'>";
                    echo "FAILED! You have pending Uniform Request please wait for the approval before making any Request. Limited (3) Request";
                echo "</div>";
            }else{
                $order->createOrder();
                echo "<div class='message-box-success'>";
                    echo "Uniform Request Submit, please check your Order and the status";
                echo "</div>";
            }
        break;

        case 'shs_skirt_women':
            $order->amount = "345.00";
            $order->status = "Pending";
            $order->garment_type = "SHS Skirt";
            $order->gender = $_SESSION['gender'];
            $order->garment_id = "Not set";
            $order->student_id = $_SESSION['student_id'];
                        
            if ($order->countOrder()) {
                echo "<div class='message-box-failed'>";
                    echo "FAILED! You have pending Uniform Request please wait for the approval before making any Request. Limited (3) Request";
                echo "</div>";
            }else{
                $order->createOrder();
                echo "<div class='message-box-success'>";
                    echo "Uniform Request Submit, please check your Order and the status";
                echo "</div>";
            }
        break;
        
        default:
            # code...
            break;
    }
}

?>

<!-- <div class="panel_container"> -->
    <div class="panel_wrapper2">
        <div class="table_detail">
            <h2>School Attire</h2>
        </div>

    <div class="grid">    
        <?php
            /* -------------------------------------
                PANEL 1 - UNIFORM MALE - COLLEGE
            ------------------------------------- */
            $acad_year = explode(', ', '1, 2, 3, 4');
            if (in_array($_SESSION['academic_year'], $acad_year) && $_SESSION['gender']=='Male') {
                echo "<form action='".htmlspecialchars($_SERVER['PHP_SELF'])."' method='POST'>";
                echo "<div class='box bx1'>";
                echo "<img src='../IMG/Uniform-Men/Polo.png' alt='Uniform Image' class='uni-img'>";
                echo "<div class='title_box'>Uniform Men <strong>(Polo)</strong></div>";
                echo "<div class='price_table'>";
                echo "<b>₱300.00</b>";
                echo "</div>";
                echo "<div class='features'>";
                echo "<div>Color: White</div>";
                echo "<div>Quantity: 1</div>";
                echo "</div>";
                echo "<div class='btn2'>";
                echo "<input type='hidden' name='uniform' value='uniform_men_polo'>";
                echo "<button type='submit'>Get This Now</button>";
                echo "</div>";
                echo"</div>";
                echo "</form>";
            }
            $acad_year = explode(', ', '1, 2, 3, 4');
            if (in_array($_SESSION['academic_year'], $acad_year) && $_SESSION['gender']=='Male') {
                echo "<form action='".htmlspecialchars($_SERVER['PHP_SELF'])."' method='POST'>";
                echo "<div class='box bx1'>";
                echo "<img src='../IMG/Uniform-Men/Pants.png' alt='Uniform Image' class='uni-img'>";
                echo "<div class='title_box'>Uniform Men <strong>(Pants)</strong></div>";
                echo "<div class='price_table'>";
                echo "<b>₱350.00</b>";
                echo "</div>";
                echo "<div class='features'>";
                echo "<div>Color: Navy Blue</div>";
                echo "<div>Quantity: 1</div>";
                echo "</div>";
                echo "<div class='btn2'>";
                echo "<input type='hidden' name='uniform' value='uniform_men_pants'>";
                echo "<button type='submit'>Get This Now</button>";
                echo "</div>";
                echo"</div>";
                echo "</form>";
            }

        
            /* -------------------------------------
                PANEL 2 - UNIFORM FEMALE - COLLEGE
            ------------------------------------- */
            if (in_array($_SESSION['academic_year'], $acad_year) && $_SESSION['gender']=='Female') {
                echo "<form action='".htmlspecialchars($_SERVER['PHP_SELF'])."' method='POST'>";
                echo "<div class='box bx1'>";
                echo "<img src='../IMG/Uniform-Woman/Blouse.png' alt='Uniform Image' class='uni-img'>";
                echo "<div class='title_box'>Uniform Women <strong>(Blouse)</strong></div>";
                echo "<div class='price_table'>";
                echo "<b>₱340.00</b>";
                echo "</div>";
                echo "<div class='features'>";
                echo "<div>Color: White</div>";
                echo "<div>Quantity: 1</div>";
                echo "</div>";
                echo "<div class='btn2'>";
                echo "<input type='hidden' name='uniform' value='uniform_women_blouse'>";
                echo "<button type='submit'>Get This Now</button>";
                echo "</div>";
                echo"</div>";
                echo "</form>";
            }

            if (in_array($_SESSION['academic_year'], $acad_year) && $_SESSION['gender']=='Female') {
                echo "<form action='".htmlspecialchars($_SERVER['PHP_SELF'])."' method='POST'>";
                echo "<div class='box bx1'>";
                echo "<img src='../IMG/Uniform-Woman/Skirt.png' alt='Uniform Image' class='uni-img'>";
                echo "<div class='title_box'>Uniform Women <strong>(Skirt)</strong></div>";
                echo "<div class='price_table'>";
                echo "<b>₱330.00</b>";
                echo "</div>";
                echo "<div class='features'>";
                echo "<div>Color: Navy Blue</div>";
                echo "<div>Quantity: 1</div>";
                echo "</div>";
                echo "<div class='btn2'>";
                echo "<input type='hidden' name='uniform' value='uniform_women_skirt'>";
                echo "<button type='submit'>Get This Now</button>";
                echo "</div>";
                echo"</div>";
                echo "</form>";
            }
        
            /* -------------------------------------
                PANEL 3 - UNIFORM MALE - SHS
            ------------------------------------- */
            $acad_Year = explode(', ', '5');
            if (in_array($_SESSION['academic_year'], $acad_Year) && $_SESSION['gender']=='Male') {
                echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
                echo "<div class='box bx1'>";
                echo "<img src='../IMG/SHS-uni-Men/Polo.png' alt='Uniform Image' class='uni-img'>";
                echo "<div class='title_box'>Uniform Men <strong>(Polo)</div>";
                echo "<div class='price_table'>";
                echo "<b>₱350.00</b>";
                echo "</div>";
                echo "<div class='features'>";
                echo "<div>Color: White</div>";
                echo "<div>Quantity: 1</div>";
                echo "</div>";
                echo "<input type='hidden' name='uniform' value='shs_polo_men'>";
                echo "<div class='btn2'>";
                echo "<button type='submit'>Get This Now</button>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
            }

            if (in_array($_SESSION['academic_year'], $acad_Year) && $_SESSION['gender']=='Male') {
                echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
                echo "<div class='box bx1'>";
                echo "<img src='../IMG/SHS-uni-Men/Pants.png' alt='Uniform Image' class='uni-img'>";
                echo "<div class='title_box'>Uniform Men <strong>(Pants)</div>";
                echo "<div class='price_table'>";
                echo "<b>₱345.00</b>";
                echo "</div>";
                echo "<div class='features'>";
                echo "<div>Color: Navy Blue</div>";
                echo "<div>Quantity: 1</div>";
                echo "</div>";
                echo "<input type='hidden' name='uniform' value='shs_pants_men'>";
                echo "<div class='btn2'>";
                echo "<button type='submit'>Get This Now</button>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
            }

            /* -------------------------------------
                PANEL 4 - UNIFORM FEMALE - SHS
            ------------------------------------- */
            if (in_array($_SESSION['academic_year'], $acad_Year) && $_SESSION['gender']=='Female') {
                echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
                echo "<div class='box bx1'>";
                echo "<img src='../IMG/SHS-uni-woman/Blouse.png' alt='Uniform Image' class='uni-img'>";
                echo "<div class='title_box'>Uniform Women <strong>(Blouse)</div>";
                echo "<div class='price_table'>";
                echo "<b>₱335.00</b>";
                echo "</div>";
                echo "<div class='features'>";
                echo "<div>Color: Navy Blue</div>";
                echo "<div>Quantity: 1</div>";
                echo "</div>";
                echo "<input type='hidden' name='uniform' value='shs_blouse_women'>";
                echo "<div class='btn2'>";
                echo "<button type='submit'>Get This Now</button>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
            }

            if (in_array($_SESSION['academic_year'], $acad_Year) && $_SESSION['gender']=='Female') {
                echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
                echo "<div class='box bx1'>";
                echo "<img src='../IMG/SHS-uni-woman/Skirt.png' alt='Uniform Image' class='uni-img'>";
                echo "<div class='title_box'>Uniform Women <strong>(Skirt)</div>";
                echo "<div class='price_table'>";
                echo "<b>₱345.00</b>";
                echo "</div>";
                echo "<div class='features'>";
                echo "<div>Color: Black</div>";
                echo "<div>Quantity: 1</div>";
                echo "</div>";
                echo "<input type='hidden' name='uniform' value='shs_skirt_women'>";
                echo "<div class='btn2'>";
                echo "<button type='submit'>Get This Now</button>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
            }

            /* -------------------------------------
                PANEL 5 - PE UNIFORM - COLLEGE/SHS
            ------------------------------------- */
            $Acad_Year = explode(', ', '1, 2, 3, 4, 5');
            if (in_array($_SESSION['academic_year'], $Acad_Year) && $_SESSION['gender']=='Male' || $_SESSION['gender']=='Female') {
                echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
                echo "<div class='box bx1'>";
                echo "<img src='../IMG/PE-set/Polo.png' alt='Uniform Image' class='uni-img'>";
                echo "<div class='title_box'>PE Attire <strong>(Polo)</div>";
                echo "<div class='price_table'>";
                echo "<b>₱355.00</b>";
                echo "</div>";
                echo "<div class='features'>";
                echo "<div>Color: White</div>";
                echo "<div>Quantity: 1</div>";
                echo "</div>";
                echo "<input type='hidden' name='uniform' value='pe_attire_polo'>";
                echo "<div class='btn2'>";
                echo "<button type='submit'>Get This Now</button>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
            }

            if (in_array($_SESSION['academic_year'], $Acad_Year) && $_SESSION['gender']=='Male' || $_SESSION['gender']=='Female') {
                echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
                echo "<div class='box bx1'>";
                echo "<img src='../IMG/PE-set/Pants.png' alt='Uniform Image' class='uni-img'>";
                echo "<div class='title_box'>PE Attire <strong>(Pants)</div>";
                echo "<div class='price_table'>";
                echo "<b>₱350.00</b>";
                echo "</div>";
                echo "<div class='features'>";
                echo "<div>Color: Navy Blue</div>";
                echo "<div>Quantity: 1</div>";
                echo "</div>";
                echo "<input type='hidden' name='uniform' value='pe_attire_pants'>";
                echo "<div class='btn2'>";
                echo "<button type='submit'>Get This Now</button>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
            }

            ?>
        </div>
    </div>
</div>

<?php include_once 'layout_foot.php'; ?>
