<?php
	require("findyourgym/DBIO.php");
	
	$sql = "select gym_name from gym_details";
	$decodedJson = json_decode(getSelectData($sql,null),true);
	//print_r($GLOBALS);
	$flag = 0;
	foreach($decodedJson as $name){
		if(strcmp(strtolower($name["gym_name"]),strtolower($_REQUEST["name"])) == 0){
			//echo $name["gym_name"];
			$flag = 1;
		}
	}
	echo $flag;
?>