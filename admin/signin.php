<?php
    session_start();
    
    function getLegend(){
        if(isset($_SESSION["error"])){
            return $_SESSION["error"];
        }
        else{
            return "Please login to continue"; 
        }
           
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>FindYourGym Sign in</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript">
		function validate(){
			var counter=0;
			if(document.getElementById("uTextBox").value.length == 0){
                               // alert(document.getElementById("uTextBox").style.border);
				document.getElementById("uTextBox").style.border = '2px groove red';
				counter++;
			}
			if(document.getElementById("uPassBox").value.length == 0){
                                //alert("in 2");
				document.getElementById("uPassBox").style.border = '2px groove red';
				counter++;
			}
			if(counter > 0)
				return false;
			else
				return true;
		}
                
                function check(el){
                    if(el.value.length >= 0)
                        el.style.border = '2px solid #ccc';
                    else
                        el.style.border = '2px groove red';
                }
                
	</script>
        <link type="text/css" rel="stylesheet" href="styleSignin.css"/>
</head>
<body class="custom-background font-custom">
    <div class="custom-div">
	<form action="auth.php" method="post" name="sform">
            <fieldset>
                <legend class=""><?php echo getLegend(); session_destroy();?></legend>
		<label class="">Username</label>
		<br><br>
                <input type="text" onkeydown="check(this)" name="username" value="" placeholder="username" class="custom-input" id="uTextBox">
		<br><br>
		<label class="">Password</label>
		<br><br>
                <input type="password" onkeydown="check(this)" name="password" value="" placeholder="password" class="custom-input" id="uPassBox">
                <br><br>
                <input type="submit" onclick="return validate()" name="submit" value="Login" class="custom-submit">
            </fieldset>
	</form>
		
    </div>
</body>
</html>

