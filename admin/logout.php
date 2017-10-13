<?php
    session_start();
    if(isset($_SESSION["sid"]) || isset($_SESSION["admin_sid"])){
        session_destroy();
        header("location: signin.php");
    }
    else{
        header("location: signin.php");
    }
?>

