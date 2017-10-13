<?php
    session_start();
    require("DBIO.php");
    
    function deletePreviousBanner(){
        $sql = "select image_url from gym_gallery where username = ?";
        $para = array($_SESSION["sid"]);
        $decodedJson = json_decode(getSelectData($sql, $para),true);
        return unlink($decodedJson[0]["image_url"]);
    }
    //echo deletePreviousBanner();
    if(isset($_REQUEST["upload"])){
        $type = explode("/", $_FILES["uploadedimage"]["type"]);
        if(strcmp($type[0], "image")==0){
           // $extension = explode(".", $_FILES["uploadedimage"]["name"]);
            $destPath = "uploads/".$_SESSION["sid"].$_FILES["uploadedimage"]["name"];
            deletePreviousBanner();
            if(move_uploaded_file($_FILES["uploadedimage"]["tmp_name"], $destPath)){
                $sql = "update gym_gallery set image_url = ? where username = ?";
                $para = array($destPath,$_SESSION["sid"]);
                
                if(manipulateData($sql, $para)){
                    $_SESSION["uploadmessage"] = "Successfully uploaded";
                    header("location: updateBanner.php");
                }
                else {
                    $_SESSION["uploadmessage"] = "Upload failed";
                    header("location: updateBanner.php");
                }
            }
            else{
                $_SESSION["uploadmessage"] = "Upload failed";
                header("location: updateBanner.php");
            }
        }
        else{
            $_SESSION["uploadmessage"] = "Please upload an image";
            header("location: updateBanner.php");
        }
    }
    else{
         header("location: signin.php");
    }
?>

