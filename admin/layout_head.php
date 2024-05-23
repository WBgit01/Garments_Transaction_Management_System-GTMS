<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <link rel="stylesheet" href="../libs/css/admin-style.css">
    <title>Admin Dashboard</title>
</head>
<body>
      <!-- MAIN CONTENT||BODY -->
      <div class="main_content">
        <div class="header_wrapper">
            <div class="header_title">
                <?php 
                    if ($page_title == "Dashboard"){
                        echo "<span>Primary</span>";
                        echo "<h2>{$page_title}</h2>";
                    }else{
                        echo "<h2>{$page_title}</h2>";
                    }
                ?>
            </div>

            <div class="user_info">
                <span class="title"><?php 
                echo "<strong>{$_SESSION['firstname']}</strong>"; 
                echo " ";
                echo "<strong>{$_SESSION['lastname']}</strong>"; 
                ?></span>
                <a href="#"><img src="../IMG/Admin2.jpg" alt=""></a> <!-- admin-image -->
            </div>
        </div>

    
