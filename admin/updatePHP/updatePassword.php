<?php
    
    session_start();
    require '../DBIO.php';
    
    function isValidated(){
        $sql = "select * from login where username = ?";
        if(isset($_SESSION["sid"]))
            $para = array($_SESSION["sid"]);
        else
            $para = array($_SESSION["admin_sid"]);

        $decodedJson = json_decode(getSelectData($sql, $para),true);
        
        if(strcmp($_REQUEST["currentpassword"],$decodedJson[0]["password"]) == 0){
            if(strlen($_REQUEST["newpassword"]) >= 8){
                return true;
            }               
            else{
                return false;
            }
               
        }
        else{
            return false;
        }
    }
    
    if(isset($_REQUEST["update"])){
        if(isValidated()){
            $sql = "update login set password = ? where username = ?";
            if(isset($_SESSION["sid"]))
                $para = array($_REQUEST["newpassword"],$_SESSION["sid"]);
            else
                $para = array($_REQUEST["newpassword"],$_SESSION["admin_sid"]);

            if(manipulateData($sql, $para)){
                $_SESSION["updatemessage"] = "Password successfully updated";
                header("location: ../changePassword.php");
            }
            else{
                $_SESSION["updatemessage"] = "Failed to update password";
                 header("location: ../changePassword.php");
            }
        }
        else{
            $_SESSION["updatemessage"] = "Invalid current password";
            header("location: ../changePassword.php");
        }
    }
    else{
       header("location: ../signin.php");
    }


?>

