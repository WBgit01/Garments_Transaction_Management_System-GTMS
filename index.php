<?php
$page_title = "Index";
include_once 'layout_head.php';
?>

<div class="main" id="main">
        <div class="main_con">
            <img src="IMG/GTMS_logo4.png" class="logo2">
            <h3>Garments Transaction Management System</h3>
            <p>
                Welcome to the GTMS Portal, your go-to platform for managing transactions seamlessly.
                 Garments Transaction Management System empowers students like you to effortlessly track
                  and manage your transaction history with ease.
            </p>
			<a href="register.php">
            <button>Get Started</button>
			</a>
        </div>
    </div>

	<!-- SERVICES  -->
	<?php include_once 'services.php'; ?>

	<!-- CONTACT FORM  -->
	<?php include_once 'contact.php'; ?>

	<!-- ABOUT -->
	<div class="about" id="about">
        <div class="content">
            <div class="text">
                <h3>About Us</h3>
                <p>We provide an advanced platform that enables users to effectively handle their
                     garment transactions. Our system handles every step of the process, including inventory
                      management and order placement. Our goal is to minimize errors and delays in the garment
                       transaction process by making it as smooth as possible.</p>
                <div class="button">
                    <input type="button" value="Learn More" />
                </div>
            </div>
            <div class="logo3">
                <img src="IMG/GTMS_logo4.png">
            </div>
        </div>
    </div>

<?php include_once 'layout_foot.php'; ?>