<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Assignment 1.2</title>
	   <style>
		body {
			Background-color: gainsboro;
		}
		.error {
				font-weight: bold;
				color: #C00;
		}
		
	   </style>
	   
</head>
<body>
	
<? # Script 2.2 - checkform.php #3

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
			echo '<p class="error">Please enter a name in the name field.</p>';
		}
		//check parent name
		if (!empty($_REQUEST['p_name'])) {
			$p_name = $_REQUEST['p_name'];
			echo "<p>Thank you, <b>$p_name</b>, for the information!</p>";
		} else{
			$p_name = NULL;
			echo '<p class="error">Please enter a name in the parent/guardian name field.</p>';
		}
		//check email
		if (!empty($_REQUEST['email'])) {
			$email = $_REQUEST['email'];
			echo "<p>The email you entered was: <b>$email</b></p>";
		} else{
			$email = NULL;
			echo '<p class="error">Please enter a valid email address in the parent/guardian email field.</p>';
		}
		//check phone
		if (!empty($_REQUEST['phone'])) {
			$phone = $_REQUEST['phone'];
			echo "<p>The phone number you entered was:<b>$phone</b></p>";
		} else{
			$phone = NULL;
			echo '<p class="error">Please enter a phone number in the parent/guardian phone field.</p>';
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
					
				}
				
				//checking workshops
			$workshops = array();
			$count = 0;
			if (isset($_REQUEST['interests'][$count])){
				$workshops[$count] = $_REQUEST['interests'][$count];
				$count = $count + 1;
			}
			if (isset($_REQUEST['interests'][$count])){
				$workshops[$count] = $_REQUEST['interests'][$count];
				$count = $count + 1;
			}
			if (isset($_REQUEST['interests'][$count])){
				$workshops[$count] = $_REQUEST['interests'][$count];
				$count = $count + 1;
			}
			if (isset($_REQUEST['interests'][$count])){
				$workshops[$count] = $_REQUEST['interests'][$count];
				$count = $count + 1;
			}
			if (isset($_REQUEST['interests'][$count])){
				$workshops[$count] = $_REQUEST['interests'][$count];
				$count = $count + 1;
			}
			
			if (!empty($_REQUEST['interests'])) {
				echo '<p>You have chosen the following workshops: </p>';
			
			foreach ($workshops as $value){
				echo "<p> $value </p>";
			}
			}else{
				echo "<p>You have not chosen a workshop, but we add new workshops all the time. We'll keep you updated by e-mail.</p>";
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
			and your membership status to send information about our workshops. Hit the back button<br>
			on the browser and try again.</b></p>";
		}
			
		
		
		
?>
</body>
</html>