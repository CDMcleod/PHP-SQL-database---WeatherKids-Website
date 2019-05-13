<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Assignment 2</title>
	   <style>
		body {
			Background-color: gainsboro;
		}
		
		#box1{
		width: 50px
		padding: 10px;
		border: 2px solid gray;
		margin: 0;
	   }
	   
	   fieldset {
			Background-color : white;
			Width: 550px;
		}
		
		option{
			color: mediumseagreen;
		}
		
		select{
			color: mediumseagreen;
		}
		
		input.button1{
			Background-color: mediumseagreen;
			color: white;
		}
		
		input.button2{
			Background-color: red;
			color: white;
		}
	   </style>
	   
</head>
<body>
<?      //begin php code

	$page_title = 'Weather Wizards Registration.';
	include ('includes/header.html');

	
?>


<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	echo '<h1>Weather Wizards Registration<br>
			Verification Form</h1><br>';
	
		$name = $_REQUEST['name'];
		$p_name = $_REQUEST['p_name'];
		$email = $_REQUEST['email'];
		$phone = $_REQUEST['phone'];
		
		
		// check name
		if (!empty($_REQUEST['name'])) {
			$name = $_REQUEST['name'];
			echo "<p>Thank you, <b>$name</b>, for the information!</p>";
		} else{
			$name = NULL;
			echo '<p class="error">You forgot to enter your name</p>';
		}
		//check parent name
		if (!empty($_REQUEST['p_name'])) {
			$p_name = $_REQUEST['p_name'];
			echo "<p>Thank you, <b>$p_name</b>, for the information!</p>";
		} else{
			$p_name = NULL;
			echo '<p class="error">You forgot to enter your parent or guardians name.</p>';
		}
		//check email
		if (!empty($_REQUEST['email'])) {
			$email = $_REQUEST['email'];
			echo "<p>The email you entered was: <b>$email</b></p>";
		} else{
			$email = NULL;
			echo '<p class="error">You forgot to enter your parent or guardians email.</p>';
		}
		//check phone
		if (!empty($_REQUEST['phone'])) {
			$phone = $_REQUEST['phone'];
			echo "<p>The phone number you entered was:<b>$phone</b></p>";
		} else{
			$phone = NULL;
			echo '<p class="error">You forgot to enter your parent or guardians phone.</p>';
		}

		
		//full varification check of required
		if ($name && $p_name && $email && $phone) {
			echo '<p>Thank you for the information!</p>';
			
				//checking location
			$location = $_REQUEST['center'];
		
			if ($location == 'Charleston'){
				echo '<p>You are nearest to our Charleston SC location, the Holy City! go River Dogs!</p>';
			} elseif ($location == 'Summerville'){
				echo '<p>You are nearest to our Summerville SC location, the Birthplace of Sweet Tea! Refreshing!</p>';
			} else{
				echo '<p>You are nearest to our Mt. Pleasant, SC location that has a historical and beachy vibe!</p>';
			}
			
				//checking membership
			if (isset($_REQUEST['member'])) {
				$member = $_REQUEST['member'];
			} else{
				$member = NULL;
			}
		
				if ($member == 'yes'){
					echo "<p>Welcome back, $name . Thank you for being a member of Weather Wizards.</p>";
				} elseif ($member == 'no'){
					echo "<p> $name , we hope you'll join Weather Wizards. We have more fun than a jar full of lightning bugs!</p>";
				}elseif ($member == 'Sign') {
					echo "<p> $name , welcome to Weather Wizards where the forecast is always a 99% chance of fun!</p>";
				}else{
					echo "<p> You forgot to enter your membership status!</p>";
				}
				
				//checking workshops
				if(isset($_POST['interests']))
				{
					foreach ($_POST['interests'] as $value)
					{
						$interests[] = $value;
					}  
				} 
			
			if (isset($interests)) 
			{
				echo "<p>You have chosen the following Workshops.</p>";
				foreach ($interests as $value) 
				{
					echo "<p>$value</p>";
				}
			} 
			else 
			{
				echo "<p>You have not chosen any workshops. Make sure to check back, as new workshops are added all the time.</p>";
			}
			
			
		/* 	foreach ($_POST['interests'] as $interests) {
				echo "<p>" .$interests ."</p><br>";
			} */
			
			/* echo "The modules were: ";
			foreach($_REQUEST['interests'] as $selected) {
				echo $interests;
			} */
				
		}//end outer if statement
		else {
			echo "<p><b>Weather Wizard, we need your name and your parent or guardian's name, email, phone <br>
			and your membership status to send information about our workshops. Enter required information and click the<br>
			Register button again.</b></p>";
		}
}
	

?>

<form name="register.php" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<h1>Weather Wizards Workshops</h1>


		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We host weather wizards workshops throughout the year for kids from 6-12.</p><br />
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please note that the following workshops are free to members:</p></n>

<ul>
<li>Make a Rain Gauge</li>
<li>Make a Thermometer</li>
</ul>
	<br />
	
	<!-- <div id="box1"> This text in the box</div> -->
	
	<fieldset>
	<legend>Register Your Interests</legend>
	
	<input type="checkbox" name="interests[]" value="Make a Raingauge"<?php if (!empty($interests) && in_array('Make a Raingauge', $interests)) echo('CHECKED'); ?>>Make a Rain Gauge<br>
	<input type="checkbox" name="interests[]" value="Make a Thermometer" <?php if (!empty($interests) && in_array('Make a Thermometer', $interests)) echo(' CHECKED '); ?>>Make a Thermometer<br>
	<input type="checkbox" name="interests[]" value="Make a Windsock" <?php if (!empty($interests) && in_array('Make a Windsock', $interests)) echo(' CHECKED '); ?>>Make a Windsock<br>
	<input type="checkbox" name="interests[]" value="Make Lightning in your Mouth" <?php if (!empty($interests) && in_array('Make Lightning in your Mouth', $interests)) echo(' CHECKED '); ?>>Make Lightning In Your Mouth<br>
	<input type="checkbox" name="interests[]" value="Make a Hygrometer" <?php if (!empty($interests) && in_array('Make a Hygrometer', $interests)) echo(' CHECKED '); ?>>Make a Hygrometer
	<br />
	
	<p><label>Your Name: <br><input type="text" name="name" size="30" maxlength="40" value = "<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" /></label></p><br>
	<p><label>Your Parent or Guardian's Name: <br><input type="text" name="p_name" size="30" maxlength="40"  value = "<?php if (isset($_POST['p_name'])) echo $_POST['p_name']; ?>" /></label></p><br>
	<p><label>Your Parent or Guardian's email: <br><input type="text" name="email" size="30" maxlength="40"  value = "<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /></label></p><br>
	<p><label>Your Parent or Guardian's phone: <br><input type="text" name="phone" size="30" maxlength="40"  value = "<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>" /></label></p>
	<br />
	
	<p><label>Your closest center: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="center">
		
		<option selected value="Charleston"<?php if (isset($_POST['center']) && ($_POST['center'] == 'Charleston')) echo ' selected="selected"'; ?>>Charleston</option>
		<option value="Summerville"<?php if (isset($_POST['center']) && ($_POST['center'] == 'Summerville')) echo ' selected="selected"'; ?>>Summerville</option>
		<option value="Mt. Pleasent"<?php if (isset($_POST['center']) && ($_POST['center'] == 'Mt. Pleasent')) echo ' selected="selected"'; ?>>Mt. Pleasent</option>
		</select></label></p>
		
	<p><label for="member"> Are you a member: </label>
	<input type="radio" name="member" value="yes" <?php if (isset($_POST['member']) && ($_POST['member'] == 'yes')) echo 'checked="checked" '; ?> /> Yes
	<input type="radio" name="member" value="no" <?php if (isset($_POST['member']) && ($_POST['member'] == 'no')) echo 'checked="checked" '; ?> /> No
	<input type="radio" name="member" value="Sign" <?php if (isset($_POST['member']) && ($_POST['member'] == 'Sign')) echo 'checked="checked" '; ?> /> Sign me up.</p>
	
	<p align="left"> <input type="submit" name="submit" value="Register" class="button1"/>
	<input type="reset" name="reset" value="Reset Page" class="button2"</p>
	</fieldset>

	
</form>	
</body>
</html>