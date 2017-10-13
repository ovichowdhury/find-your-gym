<?php
    session_start();
    require '../DBIO.php';
    
    if(isset($_REQUEST["update"])){
        $sql = "update gym_posts set post = ? where post_id = ?";
        $para = array($_REQUEST["notice"],$_REQUEST["post_id"]);
        if(manipulateData($sql, $para)){
            $_SESSION["updatemessage"] = "Successfully updated";
            header("location: ../notices.php");
        }
        else{
             $_SESSION["updatemessage"] = "Failed to update";
             header("location: ../notices.php");
        }
    }
    else if(isset ($_REQUEST["delete"])){
        $sql = "delete from gym_posts where post_id = ?";
        $para = array($_REQUEST["post_id"]);
        if(manipulateData($sql, $para)){
            $_SESSION["updatemessage"] = "Successfully deleted";
            header("location: ../notices.php");
        }
        else{
             $_SESSION["updatemessage"] = "Failed to delete";
             header("location: ../notices.php");
        }
    }
    else{
        header("location: ../signin.php");
    }
?>

