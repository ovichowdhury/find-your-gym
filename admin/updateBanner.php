<?php 
    session_start();
    require("DBIO.php");
    
    function getBannerURL(){
        $sql = "select image_url from gym_gallery where username = ?";
        $para = array($_SESSION["sid"]);
        $decodedJson = json_decode(getSelectData($sql, $para),true);
        return $decodedJson[0]["image_url"];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FindYourGym Admin Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="styleUserAdminPanel.css"/>
        <script>
            function validateImageUploader(){
                var e = document.getElementById("imagefile");
                if(e.value.length == 0){
                    alert("Please choose an image");
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
                    <h3 style="text-align: center">
                        <?php
                            if(isset($_SESSION["uploadmessage"])){
                                echo $_SESSION["uploadmessage"];
                                unset($_SESSION["uploadmessage"]);
                            }
                            else{
                                echo "Please choose an image for banner";
                            }
                        ?>
                    </h3>
                    <form action="uploadBanner.php" method="post" enctype="multipart/form-data" style="margin: auto; width: 700px">
                        <img src="<?php echo getBannerURL() ?>" alt="banner_iamge" width="700" height="300" style="border: groove">
                        <br><br>
                        <input type="file" name="uploadedimage" id="imagefile">
                        <input type="submit" onclick="return validateImageUploader()" name="upload" value="Upload" class="submit-custom" style="float: right">
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


