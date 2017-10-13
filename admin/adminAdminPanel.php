<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FindYourGym Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="styleUserAdminPanel.css"/>
    </head>
    
    <body>
        <?php
            if(isset($_SESSION["admin_sid"])){
        ?>
        <ul class="font-custom">
                    <li><img src="images/gymicon.jpg" alt="icon" width="200" height="100"></li>
                    <li><a class="active" href="adminAdminPanel.php">Home</a></li>
                    <li><a href="admin_banner.php">Change Banner</a></li>
                    <li><a href="admin_about.php">About</a></li>
                    <li><a href="manage_gym.php">Manage Gyms</a></li>
                    <li><a href="changePassword.php">Change Password</a></li>
                </ul>

            <div class="container">
                <div class="header-section font-custom">
                    Welcome to FindYourGym.com
                    <a id="logout" href="logout.php">Logout</a>
                </div>
                <div class="main-content font-custom">
                   <h1>Welcome to your main admin panel. From here you can change the contents of the website.</h1>
                    
                </div>
            </div>
            <?php
            }
            else{
                header("location: signin.php");
            }
        ?>
    </body>
</html>
