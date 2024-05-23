<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <?php
    if ($page_title =="Request details") {
        echo "<link rel='stylesheet' href='../libs/css/invoice-style.css'>";
    }else{
        echo "<link rel='stylesheet' href='../libs/css/user-style.css'>";
    }
    ?>
    <title><?php echo $page_title; ?></title>
</head>
<body>

<?php
if ($page_title =="Profile") {
    echo "<div class='main_content'>";
        echo "<div class='header_wrapper'>";
            echo "<div class='header_title'>";
                echo "<h2>{$page_title}</h2>";
                echo "<h2>Student ID: {$user->student_id}</h2>";
                echo "";
            echo "</div>";
            echo "<div class='user_info'>";
                echo isset($user->image_profile) ? "<img src='uploads/{$_SESSION['user_id']}/{$user->image_profile}' alt='User Image'>" : "No image found. </br>";
            echo "</div>";
        echo "</div>";
    } else {
    echo "<div class='main_content'>";
        echo "<div class='header_wrapper'>";
            echo "<div class='header_title'>";
                echo "<h2>$page_title</h2>";
            echo "</div>";
            echo "<div class='user_info'>";
                echo isset($user->image_profile) ? "<img src='uploads/{$_SESSION['user_id']}/{$user->image_profile}' alt='User Image'>" : "No image found. </br>";
            echo "</div>";
        echo "</div>";
    }

?>

