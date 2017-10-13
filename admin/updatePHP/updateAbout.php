<?php
    
    session_start();
    require '../DBIO.php';
    
    if(isset($_REQUEST["update"])){
        $sql = "update gym_details set about = ? where username = ?";
        $para = array($_REQUEST["about"],$_SESSION["sid"]);
        if(manipulateData($sql, $para)){
            $_SESSION["updatemessage"] = "Successfully updated";
            header("location: ../editDetails.php");
        }
        else{
            $_SESSION["updatemessage"] = "Failed to update";
             header("location: ../editDetails.php");
        }
    }
    else{
        header("location: ../signin.php");
    }


?>



