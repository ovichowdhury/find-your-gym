<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FindYourGym Admin Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="styleUserAdminPanel.css"/>
        <script>
            function validateText(){
                curPass = document.getElementById("curpass");
                newPass = document.getElementById("newpass");
                conPass = document.getElementById("conpass");
                
                if(curPass.value.length > 0){
                    if(newPass.value.length >= 8){
                        if(newPass.value === conPass.value){
                            return true;
                        }
                        else{
                            alert("passwords do not match with each other");
                            return false;
                        }
                    }
                    else{
                        alert("New password have to be minimum 8 character long");
                        return false;
                    }
                }
                else{
                    alert("Current password can not be empty");
                    return false;
                }
            }
            
            function valiateEquality(){
                p = document.getElementById("errortag");
                newPass = document.getElementById("newpass");
                conPass = document.getElementById("conpass");
                
                if(newPass.value === conPass.value){
                    p.style.display = "none";
                }
                else{
                    p.style.display = "block";
                }
            }
        </script>
    </head>
    
    <body>
        <?php
            if(isset($_SESSION["sid"])){
		?>
		<ul class="font-custom">
                    <li><img src="images/gymicon.jpg" alt="icon" width="200" height="100"></li>
                    <li><a href="userAdminPanel.php">Home</a></li>
                    <li><a href="notices.php">Notices</a></li>
                    <li><a href="editDetails.php">Edit Details</a></li>
                    <li><a href="updateBanner.php">Change Banner</a></li>
                    <li><a hclass="active" ref="changePassword.php">Change Password</a></li>
                </ul>

        <?php
            }
            else if(isset($_SESSION["admin_sid"])){
        ?>
        <ul class="font-custom">
                    <li><img src="images/gymicon.jpg" alt="icon" width="200" height="100"></li>
                    <li><a href="adminAdminPanel.php">Home</a></li>
                    <li><a href="admin_banner.php">Change Banner</a></li>
                    <li><a href="admin_about.php">About</a></li>
                    <li><a href="manage_gym.php">Manage Gyms</a></li>
                    <li><a class="active" href="changePassword.php">Change Password</a></li>
                </ul>

        <?php
            }
            if(isset($_SESSION["sid"]) || isset($_SESSION["admin_sid"])) {
?>

            <div class="container">
                <div class="header-section font-custom">
                    Welcome to FindYourGym.com
                    <a id="logout" href="logout.php">Logout</a>
                </div>
                <div class="main-content font-custom">
                    <h3 style="text-align: center">Please provide required information</h3>
                    <br>
                    <form action="updatePHP/updatePassword.php" method="post" style="margin:auto; width:500px;">
                        <fieldset>
                            <legend>
                                <?php
                                    if(isset($_SESSION["updatemessage"])){
                                    echo $_SESSION["updatemessage"];
                                    unset($_SESSION["updatemessage"]);
                                    }
                                    else{
                                        echo "Password should be minimum 8 character";
                                    }
                                ?>
                            </legend>
                            <label>Current Password</label>
                            <br>
                            <input type="password" name="currentpassword" placeholder="Enter your current password" class="inputtext-custom" id="curpass">
                            <br>
                            <label>New Password</label>
                            <br>
                            <input type="password" name="newpassword" placeholder="Enter your new password" class="inputtext-custom" id="newpass" onkeyup="valiateEquality()">
                            <br>
                            <label>Confirm Password</label>
                            <br>
                            <input type="password" name="confirmpassword" placeholder="Enter your new password again" class="inputtext-custom" id="conpass" onkeyup="valiateEquality()">
                            <span style="display: none; color: red" id="errortag">Passwords do not match</span>
                            <br><br>
                            <input type="submit" name="update" value="Change Password" class="submit-custom" onclick="return validateText()" style="width: 150px">
                        </fieldset>
                    </form>
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


