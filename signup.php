<!DOCTYPE html>
<html>
	<head>
		<title>Sign up</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<style>
			.inputtext-custom {
				border-radius: 2px;
				border-color: #cccccc;
				border-style: solid;
				height: 30px;
				padding: 0 10px;
				width: 95%;
			}
			
			.submit-custom{
				height: 30px;
				width: 70px;
				background-color: black;
				color: white;
				border: none;
			}
			.submit-custom:hover{
				background-color: gray;
				cursor: pointer;
			}
			.font-custom{
				font-family: "Comic Sans MS", cursive, sans-serif;
			}
			.custom-back{
				background-color: #F1F1F1;
			}
		</style>
		<script src="ajaxScript.js">
		</script>
	</head>

	<body>
		<div id="header">
			<div id="header-logo">
				<img src="img/logo2.png">
			</div>
			<ul>
				<li><a class="active" href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="gyms.php">Gyms</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li><a href="findyourgym/signin.php">Login</a></li>
				<li><a href="signup.php">Sign Up</a></li>
			</ul>
		</div>
		<br>
		<div class="font-custom">
			<h3 style="text-align:center;margin-top: 50px">Create your findyourgym.com account</h3>
			<form action="" method="post" style="margin:auto;width:500px" class="custom-back">
				<fieldset>
					<legend>Required information</legend>
					<label>Your Gym Name<label>
					<br>
					<input type="text" name="gym_name" placeholder="Enter your gym name" class="inputtext-custom" onkeyup="validateName(this.value)" oninput="validateName(this.value)">
					<span id="gymname_error" style="color:red; display:none">This Name Exists</span> 
					<br>
					<label>Your Gym Location<label>
					<br>
					<input type="text" name="location" placeholder="Enter your gym location" class="inputtext-custom">
					<br>
					<label>Your Gym Contacts</label>
					<br>
					<input type="text" name="contacts" placeholder="Enter your contacts" class="inputtext-custom">
					<br>
					<label>Give an unique username</label>
					<br>
					<input type="text" name="username" placeholder="Enter username" class="inputtext-custom">
					<span id="username_error" style="color:red; display:none">Username Exists</span>
					<br>
					<label>Enter a password</label>
					<br>
					<input type="text" name="password" placeholder="Password should be 8 character long" class="inputtext-custom">
					<br>
					<label>Confirm Password</label>
					<br>
					<input type="text" name="conpassword" placeholder="Enter your password again" class="inputtext-custom">
					<span id="password_error" style="color:red; display:none">Passwords do not match</span>
					<br><br>
					<input type="submit" name="signup" value="Sign Up" class="submit-custom" style="float: right">
				</fieldset>
			</form>
		</div>
		<br>
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