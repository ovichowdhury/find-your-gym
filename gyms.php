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
			<li><a href="about.php">About</a></li>
			<li><a class="active" href="gyms.php">Gyms</a></li>
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

	<script type="text/javascript">
		function search_validation(){
			if(document.srch.keyword.value.length==0)
			{
				alert("You need to type something on the search bar.");
				return false;
			}

			else if(document.getElementById("name").checked == false && document.getElementById("loc").checked == false)
			{
				alert("Select search by name or search by location");
				return false;
			}
			else
			{
				return true;
			}

			
		}	
	</script>

	<div id="search">
		<div id="search_wrapper">
			<h3> Search for your GYM </h3>
			<br><br>
			
			<form action="gyms.php" method="GET" name="srch">
				<input type="text" name="keyword" Placeholder="Search" class="keyword"><br><br>
				<input type="radio" name="cat" class="rad" id="name" value="name">Name
				<input type="radio" name="cat" class="rad" id="loc" value="loc">Location
				<br><br>
				<input type="submit" onclick="return search_validation();" value="Search GYM" class="searchbtn">
			</form>
		</div>
	</div>

	<div id="gym-slider">
		<div id="wrapper">
			<?php
				if(isset($_GET['cat']) && $_GET['cat']=="name"){
					$n_keyword=$_GET['keyword'];
					$sql = "select * from gym_details where gym_name like '%$n_keyword%'";
					echo "<h1>Gyms with keyword: ".$n_keyword."</h1>";
				}
				else if(isset($_GET['cat']) && $_GET['cat']=="loc"){
					$l_keyword=$_GET['keyword'];
					$sql = "select * from gym_details where location like '%$l_keyword%'";
					echo "<h1>Gyms in: ".$l_keyword."</h1>";
				}

				else{
					$sql = "select * from gym_details order by gym_name asc";
					echo "<h1>All Gyms</h1>";
    			}
			?>
			<hr>
			<br>

			<?php

    			$new_gyms = json_decode(getSelectData($sql,null),true);
                
                foreach($new_gyms as $new_gym){
                	$sql = "select * from gym_gallery where username = ?";
                	$para = array($new_gym['username']);
    				$img = json_decode(getSelectData($sql, $para),true);
    				
            ?>
			<a href="gym_details.php?name=<?php echo urlencode($new_gym['gym_name']);?>">
				<div class="gym">
					<img src="admin/<?php echo $img[0]['image_url'];?>" alt="gym">
					<h2><?php echo $new_gym['gym_name'];?></h2>
					<p><?php echo $new_gym['about'];?></p>
				</div>
			</a>
			<?php
				}
			?>
			
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