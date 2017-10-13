<?php 
    session_start();
    require 'DBIO.php';
    
    $sql = "select * from gym_details d inner join gym_gallery g where d.username=g.username";
    $gyms = json_decode(getSelectData($sql, null),true);

    if(isset($_REQUEST["update"])){
        $sql = "update main set about = ? where id = 1";
        $para = array($_REQUEST["about"]);
        if(manipulateData($sql, $para)){
            $_SESSION["updatemessage"] = "Successfully updated";
            header("location: admin_about.php");
        }
        else{
             $_SESSION["updatemessage"] = "Failed to update";
             header("location: admin_about.php");
        }
    }
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
                    <li><a href="adminAdminPanel.php">Home</a></li>
                    <li><a href="admin_banner.php">Change Banner</a></li>
                    <li><a class="active" href="admin_about.php">About</a></li>
                    <li><a href="manage_gym.php">Manage Gyms</a></li>
                    <li><a href="changePassword.php">Change Password</a></li>
                </ul>

            <div class="container">
                <div class="header-section font-custom">
                    Welcome to FindYourGym.com
                    <a id="logout" href="logout.php">Logout</a>
                </div>
                <div class="main-content font-custom">
                    <h3 style="text-align: center">
                        <?php
                            if(isset($_SESSION["updatemessage"])){
                                echo $_SESSION["updatemessage"];
                                unset($_SESSION["updatemessage"]);
                            }
                            else{
                                echo "About";
                            }
                        ?>
                    </h3>
                    <hr>
                    <?php
                        foreach($gyms as $gym){
                    ?>
                    <h1 style="text-transform:capitalize;"><?php echo $gym['gym_name'];?></h1>
                    <img src="<?php echo $gym['image_url'];?>" style="width:230px; height: auto;">
                    <p><?php echo $gym['about'];?></p>
                    <a href="updatePHP/deleteGym.php?gym=<?php echo $gym['gym_name'];?>"><button>Delete Gym</button></a>                    

                    <?php } ?>
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


