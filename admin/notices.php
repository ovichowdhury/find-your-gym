<?php 
    session_start();
    require 'DBIO.php';
    
    $sql = "select * from gym_posts where username = ? order by post_date desc";
    $para = array($_SESSION["sid"]);
    $posts = json_decode(getSelectData($sql, $para),true);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FindYourGym Admin Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="styleUserAdminPanel.css"/>
        <script>
           function confirmation(){
               return confirm("Delete this post?");
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
                    <h3 style="text-align: center">
                        <?php
                            if(isset($_SESSION["updatemessage"])){
                                echo $_SESSION["updatemessage"];
                                unset($_SESSION["updatemessage"]);
                            }
                            else{
                                echo "Older Notices";
                            }
                        ?>
                    </h3>
                    <hr>
                    <?php
                        foreach($posts as $post){
                    ?>
                    <form action="updatePHP/updateDeleteNotice.php" method="post" style="margin:10px auto; width: 500px">
                        <label><?php echo "Date: ".$post["post_date"] ?></label>
                        <br>
                        <textarea rows="6" cols="30" class="textarea-custom-editdetails" name="notice" style=""><?php echo $post["post"] ?></textarea>
                        <br>
                        <input type="submit" name="update" value="Update" class="submit-custom">
                        <input type="submit" name="delete" value="Delete" class="submit-custom" style="background-color: #ff3333" onclick="return confirmation()">
                        <input type="hidden" name="post_id" value="<?php echo $post["post_id"]?>">
                        <br>
                    </form>
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


