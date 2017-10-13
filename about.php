<?php 
    require 'admin/DBIO.php';
    
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Gymnasium</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="header">
		<div id="header-logo">
			<img src="img/logo2.png">
		</div>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a class="active" href="about.php">About</a></li>
			<li><a href="gyms.php">Gyms</a></li>
			<li><a href="admin/signin.php">Sign In</a></li>
		</ul>
	</div>


	<div id="slider">
		<?php
			$sql = "select * from main";
			$main = json_decode(getSelectData($sql,null),true);
        ?>
		<img src="img/<?php echo $main[0]['img'];?>">
	</div>

	<div id="about">
		<div id="about_wrapper">
			<h1>About Us</h1>
			<hr>
			<p><?php echo nl2br($main[0]['about']);?></p>	
		
		</div>
	</div>

	<div id="footer">
		<div id="social">
			<ul>
				<a href="#">
					<li><img src="img/fb.png">
						<p>Facebook</p>
					</li>
				</a>
				<a href="#">
					<li>
						<img src="img/twitter.png">
						<p>Twitter</p>
					</li>
				</a>
				<a href="#">
					<li>
						<img src="img/youtube.png">
						<p>Youtube</p>
					</li>
				</a>
				<a href="#">
					<li>
						<img src="img/instagram.png">
						<p>Instagram</p>
					</li>
				</a>
			</ul>
		</div>
		
		<div id="foot">
			<p>Copyright 2017 GYM and Developed By Mushfiq, Nahid & Anis</p>
		</div>
	</div>

</body>
</html>