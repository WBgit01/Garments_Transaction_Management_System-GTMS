<?php 
include_once "config/database.php";
include_once "config/core.php";
include_once "object/inquiry.php";

$database = new Database;
$db = $database->getConnection();
$inquiry = new inquiry($db);


$page_title = "Contact US";
//include_once 'layout_head.php';

if ($_POST) {
    $inquiry->name = $_POST['name'];
    $inquiry->email = $_POST['email'];
    $inquiry->phone = $_POST['phone'];
    $inquiry->message = $_POST['message'];
 
    if ($inquiry->createInquiry()) {
        echo "<div class='message-box-success'>";
            echo "Inquiry submitted";
        echo "</div>";
    }
    else {
        echo "<div class='message-box-failed'>";
            echo "Something went wrong";
        echo "</div>";
    }
}

?>
	    <!-- CONTACT FORM -->
      <div class="contact" id="contact">
        <div class="header">
            <div class="info">
                <h3>Contact Us</h3>
                <p>Have questions or need assistance? Don't hesitate to get in touch with us!
                     Whether you're curious about our products, services, or just want to say hello,
                      our team is here to help. Reach out to us today for prompt and friendly assistance.
                       Your inquiries matter to us!</p>
            </div> 
        </div>
        <div class="content2">
          <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <label>Fullname</label>
                <div class="input-box">
                    <input type="text" name="name" placeholder="Enter your name" required />
                </div>
                <label>Phone no.</label>
                <div class="input-box">
                    <input type="tel" name="phone" placeholder="XXX-XXX-XXXX" required pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" />
                </div>
                <label>Email</label>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Enter your email" required/>
                </div>
                <label>Inquiry</label>   
                <div class="input-box message-box">
                    <textarea name="message" placeholder="Enter your message" required></textarea>
                </div>
                <div class="button">
                    <input type="submit" value="Send Now" class="button"/>
                    </div>
            </form>
        </div>
    </div>
