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
            function validatePostTextarea(){
                e = document.getElementById("postTextArea");
                if(e.value.length == 0){
                    alert("You have to type some text in the textbox");
                    return false; 
                }       
                else{
                    return true;
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
                    <li><a class="active" href="userAdminPanel.php">Home</a></li>
                    <li><a href="notices.php">Notices</a></li>
                    <li><a href="editDetails.php">Edit Details</a></li>
                    <li><a href="updateBanner.php">Change Banner</a></li>
                    <li><a href="changePassword.php">Change Password</a></li>
                </ul>

            <div class="container">
                <div class="header-section font-custom">
                    Welcome to FindYourGym.com
                    <a id="logout" href="logout.php">Logout</a>
                </div>
                <div class="main-content font-custom">
                    <h3 style="text-align: center">Give a Notice for Members</h3>
                    <form action="addNotice.php" method="post" style="margin:auto; width:500px">
                        <fieldset>
                            <legend>
                            <?php
                                if (isset($_SESSION["message"])) {
                                        echo $_SESSION["message"];
                                        unset($_SESSION["message"]);
                                } 
                                else {
                                        echo "Please enter a notice";
                                }
                            ?>
                            </legend>
                            <label>Notice</label>
                            <br><br>
                            <textarea rows="6" cols="30" class="textarea-custom" name="notice" placeholder="type your message here.." id="postTextArea"></textarea>
                            <br><br>
                            <input type="submit" onclick="return validatePostTextarea()" name="submit" value="Post" class="submit-custom">
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
