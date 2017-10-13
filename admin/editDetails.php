<?php 
    session_start();
    require("DBIO.php");
    $sql = "select * from gym_details where username = ?";
    $para = array($_SESSION["sid"]);
    $decodedJson = json_decode(getSelectData($sql, $para),true);
    if(empty($decodedJson[0]))
    {
        echo "Your gym has been deleted. Please contact admin";
        die();
    }
    $gymName = $decodedJson[0]["gym_name"];
    $location = $decodedJson[0]["location"];
    $contacts = $decodedJson[0]["contacts"];
    $services = $decodedJson[0]["services"];
    $timeTable = $decodedJson[0]["time_table"];
    $about = $decodedJson[0]["about"];
    $addFee = $decodedJson[0]["admission_fee"];
    $monFee = $decodedJson[0]["monthly_fee"];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FindYourGym Admin Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="styleUserAdminPanel.css"/>
        <script>
            function validateText(id){
                e = document.getElementById(id);
                if(e.value.length == 0){
                    alert("Please insert a value for update");
                    return false;
                }
                else
                    return true;
            }
            
            function validateNumText(id){
                e = document.getElementById(id);
                if(e.value.length == 0){
                    alert("Please insert a value for update");
                    return false;
                }
                else{
                    if(Number.isNaN(Number.parseFloat(e.value))){
                        alert("amount can not be character");
                        return false;
                    }
                    else{
                        return true;
                    }
                }
            }
            
        </script>
    </head>
    
    <body>
        <?php
            if(isset($_SESSION["sid"])){
		?>
		<ul class="font-custom">
                    <li><img src="images/gymicon.jpg" alt="icon" width="200" height="100"></li>
                    <li><a class="active" href="userAdminPanel.php">Home</a></li>
                    <li><a href="notices.php">Notices</a></li>
                    <li><a href="editDetails.php">Edit Details</a></li>
                    <li><a href="updateBanner.php">Change Banner</a></li>
                    <li><a href="changePassword.php">Change Password</a></li>
                </ul>

            <div class="container">
                <div class="header-section font-custom">
                    Welcome to FindYourGym.com
                    <a id="logout" href="logout.php">Logout</a>
                </div>
                <div class="main-content font-custom">
                    <h3 style="text-align: center">
                        <?php
                            if(isset($_SESSION["updatemessage"])){
                                echo $_SESSION["updatemessage"];
                                unset($_SESSION["updatemessage"]);
                            }
                            else{
                                echo "Update your desired information";
                            }
                        ?>
                    </h3>
                    <hr>
                    <form action="updatePHP/updateGymName.php" method="post" style="margin:10px auto; width: 500px">
                        <label>Gymnasium Name</label>
                        <br>
                        <input type="text" name="gym_name" placeholder="Enter your gym name" class="inputtext-custom" id ="gymnametext" value="<?php echo $gymName ?>">
                        <input type="submit" name="update" value="Update" class="submit-custom" onclick="return validateText('gymnametext')">
                    </form>
                    
                    <form action="updatePHP/updateAddFee.php" method="post" style="margin:10px auto; width: 500px">
                        <label>Admission Fee(In US Dollar)</label>
                        <br>
                        <input type="text" name="admission_fee" placeholder="Enter amount for admission" class="inputtext-custom" id="addfeetext" value="<?php echo $addFee ?>">
                        <input type="submit" name="update" value="Update" class="submit-custom" onclick="return validateNumText('addfeetext')">
                    </form>
                    
                    <form action="updatePHP/updateMonFee.php" method="post" style="margin:10px auto; width: 500px">
                        <label>Monthly Fee(In US Dollar)</label>
                        <br>
                        <input type="text" name="monthly_fee" placeholder="Enter amount" class="inputtext-custom" id="monfeetext" value="<?php echo $monFee ?>">
                        <input type="submit" name="update" value="Update" class="submit-custom" onclick="return validateNumText('monfeetext')">
                    </form>
                    
                    <form action="updatePHP/updateLocation.php" method="post" style="margin:10px auto; width: 500px">
                        <label>Location</label>
                        <br>
                        <textarea rows="6" cols="30" class="textarea-custom-editdetails" name="location" placeholder="type your location in details." id="locationTextarea"><?php echo $location ?></textarea>
                        <br>
                        <input type="submit" name="update" value="Update" class="submit-custom" onclick="return validateText('locationTextarea')">
                    </form>
                    
                    <form action="updatePHP/updateContacts.php" method="post" style="margin:10px auto; width: 500px">
                        <label>Contacts</label>
                        <br>
                        <textarea rows="6" cols="30" class="textarea-custom-editdetails" name="contacts" placeholder="type your all the contacts info." id="contactsTextarea"><?php echo $contacts ?></textarea>
                        <br>
                        <input type="submit" name="update" value="Update" class="submit-custom" onclick="return validateText('contactsTextarea')">
                    </form>
                    
                    <form action="updatePHP/updateServices.php" method="post" style="margin:10px auto; width: 500px">
                        <label>Services</label>
                        <br>
                        <textarea rows="6" cols="30" class="textarea-custom-editdetails" name="services" placeholder="type al the services provided by your gym." id="servicesTextarea"><?php echo $services ?></textarea>
                        <br>
                        <input type="submit" name="update" value="Update" class="submit-custom" onclick="return validateText('servicesTextarea')">
                    </form>
                    
                    <form action="updatePHP/updateRoutine.php" method="post" style="margin:10px auto; width: 500px">
                        <label>Routine</label>
                        <br>
                        <textarea rows="6" cols="30" class="textarea-custom-editdetails" name="routine" placeholder="type opening,break and closing time of your gym." id="routineTextarea"><?php echo $timeTable ?></textarea>
                        <br>
                        <input type="submit" name="update" value="Update" class="submit-custom"  onclick="return validateText('routineTextarea')">
                    </form>
                    
                    <form action="updatePHP/updateAbout.php" method="post" style="margin:10px auto; width: 500px">
                        <label>About</label>
                        <br>
                        <textarea rows="6" cols="30" class="textarea-custom-editdetails" name="about" placeholder="type something about your gym." id="aboutTextarea"><?php echo $about ?></textarea>
                        <br>
                        <input type="submit" name="update" value="Update" class="submit-custom"  onclick="return validateText('aboutTextarea')">
                    </form>
                </div>
            </div>
            <?php
            }
            else{
                header("location: signin.php");
            }
        ?>
    </body>
</html>


