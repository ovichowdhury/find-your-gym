<?php 
    session_start();
    require 'DBIO.php';
    function getBannerURL(){
        $sql = "select img from main";
        $decodedJson = json_decode(getSelectData($sql, null),true);
        return $decodedJson[0]["img"];
    }

    function deletePreviousBanner(){
        $sql = "select img from main";
        $decodedJson = json_decode(getSelectData($sql, null),true);
        return unlink($decodedJson[0]["img"]);
    }
    //echo deletePreviousBanner();
    if(isset($_REQUEST["upload"])){
        $type = explode("/", $_FILES["uploadedimage"]["type"]);
        if(strcmp($type[0], "image")==0){
           // $extension = explode(".", $_FILES["uploadedimage"]["name"]);
            $destPath = "../img/".$_SESSION["admin_sid"].$_FILES["uploadedimage"]["name"];
            deletePreviousBanner();
            if(move_uploaded_file($_FILES["uploadedimage"]["tmp_name"], $destPath)){
                $sql = "update main set img = ? where id = 1";
                $para = array($destPath);
                
                if(manipulateData($sql, $para)){
                    $_SESSION["uploadmessage"] = "Successfully uploaded";
                    header("location: admin_banner.php");
                }
                else {
                    $_SESSION["uploadmessage"] = "Upload failed";
                    header("location: admin_banner.php");
                }
            }
            else{
                $_SESSION["uploadmessage"] = "Upload failed";
                header("location: admin_banner.php");
            }
        }
        else{
            $_SESSION["uploadmessage"] = "Please upload an image";
            header("location: admin_banner.php");
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>FindYourGym Admin Panel</title>
        

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="styleUserAdminPanel.css"/>
        <!--<script>
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
        </script>-->
    </head>
    
    <body>
        <?php
            if(isset($_SESSION["admin_sid"])){
        ?>
        <ul class="font-custom">
                    <li><img src="images/gymicon.jpg" alt="icon" width="200" height="100"></li>
                    <li><a href="adminAdminPanel.php">Home</a></li>
                    <li><a class="active" href="admin_banner.php">Change Banner</a></li>
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
                <?php
                            if(isset($_SESSION["uploadmessage"])){
                                echo $_SESSION["uploadmessage"];
                                unset($_SESSION["uploadmessage"]);
                            }
                            else{
                                echo "Please choose an image for banner";
                            }
                        ?>
                    <h3 style="text-align: center">Change Banner</h3>
                    <form action="#" method="post" enctype="multipart/form-data" style="margin: auto; width: 700px">
                        <img src="../img/<?php echo getBannerURL();?>" alt="banner_iamge" width="700" height="auto" style="border: groove">
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
