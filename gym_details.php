<?php 
    require 'admin/DBIO.php';
    $g_name=trim($_GET['name']);

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
			<li><a href="about.php">About</a></li>
			<li><a class="active" href="gyms.php">Gyms</a></li>
			<li><a href="admin/signin.php">Sign In</a></li>
		</ul>
	</div>


	<div id=gym_details>
		<div id=gym_details_wrapper>
			<?php
				$sql = "select * from gym_details where gym_name = ?";
				$para = array($g_name);
    			$gym_details = json_decode(getSelectData($sql,$para),true);
				
				$sql = "select * from gym_gallery where username = ?";
    			$para = array($gym_details[0]['username']);
			    $img = json_decode(getSelectData($sql,$para),true);
                 				
            ?>

			<img src="admin/<?php echo $img[0]['image_url'];?>" alt="gym">
			<h1><?php echo $gym_details[0]['gym_name'];?></h1>

			<div id="notice">
				<img src="img/notice.jpg">
				<fieldset>
                	<legend >Notice</legend>
                	<div style="height:215px; overflow:auto">
	                	<?php
							$sql = "select * from gym_posts where username = ? order by post_date desc";
							$para = array($gym_details[0]['username']);
			    			$notices = json_decode(getSelectData($sql,$para),true);
			                foreach($notices as $notice){
			            ?>
						<h4><?php echo $notice['post_date'];?></h4>
						<p><?php echo $notice['post'];?></p>
						<?php } ?>
					</div>
				</fieldset>
			</div>
			<fieldset>
                <legend>Gym Details</legend>
				<h2>Admission Fee(In US Dollar)</h2> 
				<p><?php echo $gym_details[0]['admission_fee'];?></p>
				<h2>Monthly Fee(In US Dollar)</h2> 
				<p><?php echo $gym_details[0]['monthly_fee'];?></p>
				<h2>Location </h2>
				<p><?php echo $gym_details[0]['location'];?></p>
				<h2>Contacts </h2>
				<p><?php echo $gym_details[0]['contacts'];?></p>
				<h2>Services </h2>
				<p><?php echo $gym_details[0]['services'];?></p>
				<h2>Routine</h2>
				<p><?php echo $gym_details[0]['time_table'];?></p>
				<h2>About</h2>
				<p><?php echo $gym_details[0]['about'];?></p>
			</fieldset>
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