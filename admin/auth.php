<?php
    session_start();
    require("DBIO.php");


    if(isset($_REQUEST["submit"])){
        $sql = "select * from login where username = ?";
        $queryResult = getSelectData($sql, [trim($_REQUEST["username"])]);
        $decodedResult = json_decode($queryResult,true);
        
        if($decodedResult[0]["username"] == trim($_REQUEST["username"]) && $decodedResult[0]["password"] == trim($_REQUEST["password"])){
            if($decodedResult[0]["usertype"] == 'normal'){
                unset($_SESSION["admin_sid"]);
                $_SESSION["sid"] = $_REQUEST["username"];
                header("location: userAdminPanel.php");
            }
            else{
                $_SESSION["admin_sid"] = $_REQUEST["username"];
                unset($_SESSION["sid"]);
                header("location: adminAdminPanel.php");
            }
        }
        else{
            $_SESSION["error"] = "Invalid Username or Password";
            header("location: signin.php");
        }
    }
    
?>

