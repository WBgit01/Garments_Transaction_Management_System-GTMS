<?php

// blue background color
// get 'action' value in url parameter to display corresponding prompt messages
$action=isset($_GET['action']) ? $_GET['action'] : "";
// tell the user he is not yet logged in
if($action == 'not_yet_logged_in'){
    echo "<div class='message-box-info'>
    <strong>Login Required.</strong>
</div>";
}

// yellow background
// tell the user to login
else if($action=='please_login'){
    echo "<div class='message-box-info'>
        <strong>Please login to access that page.</strong>
    </div>";
}

// red background
// tell the user if access denied
if($access_denied){
    echo "<div class='message-box-failed'>
        Access Denied.<br /><br />
        Your username or password maybe incorrect
    </div>";
}

?>