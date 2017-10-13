<?php
    session_start();
    require '../DBIO.php';
    
    if(isset($_GET["gym"])){
        $gym=$_GET["gym"];
        $sql = "delete from gym_details where gym_name= ?";
        $para = array($gym);
        if(manipulateData($sql, $para)){
            $_SESSION["updatemessage"] = "Successfully deleted";
            header("location: ../manage_gym.php");
        }
        else{
             $_SESSION["updatemessage"] = "Failed to delete";
             header("location: ../manage_gym.php");
        }
    }
    else{
        header("location: ../signin.php");
    }
?>

