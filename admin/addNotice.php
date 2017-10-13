<?php
    session_start();
    require("DBIO.php");
    date_default_timezone_set('utc');
	
    if(isset($_REQUEST["submit"])){
       $sql = "insert into gym_posts(username,post,post_date) values(?,?,?)";
       $parameter = array($_SESSION["sid"],$_REQUEST["notice"],date("Y-m-d"));
       if(manipulateData($sql,$parameter)){
           $_SESSION["message"] = "Successfully posted";
           header("location: userAdminPanel.php");
       }
       else{
           $_SESSION["message"] = "Can not post the notice";
           header("location: userAdminPanel.php");
       }
    }
    else{
         header("location: signin.php");
    }

?>

