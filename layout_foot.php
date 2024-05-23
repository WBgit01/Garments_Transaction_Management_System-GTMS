<?php
    if ($page_title == 'Login' || $page_title == 'Register' || $page_title == 'forgot_pw') {

    } else {
?>
    <!-- FOOTER -->
    <footer>
        <div class="top">
            <div class="logo">
                <img src="IMG/GTMS_logo4.png">
                <a href="index.php">GTMS PORTAL</a>
            </div>
            <ul>
                <li><a href="#main">Home</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact Us</a></li>
                <li><a href="#about">About Us</a></li>
            </ul>
        </div>
        <div class="separator"></div>
        <div class="bottom">
            <p>
                Release: Beta v1.3
            </p>
            <div class="links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Github</a>
            </div>
        </div>
    </footer>
<?php
    }
?>
    <script src="libs/javascript/script.js"></script>
    <script src="libs/javascript/login-script.js"></script>
</body>
</html>