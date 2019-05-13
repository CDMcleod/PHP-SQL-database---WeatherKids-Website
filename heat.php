<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Assignment 1</title>
	   <style>
			.toprow {
			width: 1000px;
			Height: 35px;
			background-color: green;
			padding: 10px;
			Color: white;
			text-align: center;
				vertical-align: center;
			}
			
			.secondrow {
				Background-color: lightgreen;
				width: 1000px;
				Height: 35px;
				padding: 10px;
				padding-right: 70px;
			}
			
			.thirdrow {
				background-color: green;
				width: 1000px;
				height: 35px;
				padding: 0px;
				padding-left : 120px
				border: none;
				
			}
			.thirdrow td:first-child {
				border-right: 1px solid ghostwhite;
			}
			.thirdrow td:nth-child(2) {
				border-right: 1px solid ghostwhite;
			}
			td {
				font-weight: bold;
			}
		
	   </style>
	   
</head>
<body>
<h1></h1>

<?      //begin php code

	$page_title = 'Heat Index';
	include ('/includes/header.html');

	
?>

<h1>Heat Index</h1>

<p>In the Summer, when people say "its not the heat, its the humidity", what do they mean? There are 2 factors that make a <br>
hot day feel really hot. the first is the air temperature and the second is relative humidity. After taking measurments for<br>
temperature and relative humidity, we can calculate a heat index that is called our "feels like" temperature.<br /><br><br>
Hi means Heat Index (the "Feels Like" Temperature). <br /><br>T means the air Temperature (This formula works when temperatures are in the range of 80 to 112).<br><br>
RH means relative humidity (This  formula works when relative humidity is in the range of 13 to 85).</p><br><br>

<form name="heat.php" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"

<label>Temperature: <input type="number" name="temp" size="5" maxlength="10" value="<?php if (isset($_POST['temp'])) echo $_POST['temp']; ?>"></label><br><br>
<label>Humidity: <input type="number" name="humidity" size="5" maxlength="10" value="<?php if (isset($_POST['humidity'])) echo $_POST['humidity']; ?>"></label><br><br>

<input type="submit" value="Gimme the Heat Index."><br><br><br>
</form>


<?php //verify form
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//temp
	if (!empty($_POST['temp'])) 
	{
		if (($_POST['temp']) < 80 || ($_POST['temp']) > 112)
		{
			$temp = Null;
			//echo '<p>The temperature needs to be within 80-112 degrees!</p>';
		}else
		{
			$temp = $_POST['temp'];
			//echo "<p>the temperature you entered was: $temp</p>";
		}
		
	} 
	else 
	{
		$temp = NULL;
	}
	
	//humidity
	if (!empty($_POST['humidity'])) 
	{
		if (($_POST['humidity']) < 13 || ($_POST['humidity']) > 85)
		{
			$humidity = NULL;
			//echo '<p>The Humidity needs to be within 13-85!</p>';
		}else
		{
			$humidity = $_POST['humidity'];
			//echo "<p>the humidity you entered was: $humidity</p>";
		}

	} 
	else 
	{
		$humidity = NULL;
	}
	
	if ($temp != NULL && $humidity != NULL)
	{
		$index = -42.379 + 2.04901523*$temp + 10.14333127*$humidity - .22475541*$temp*$humidity - .00683783*$temp*$temp
	- .05481717*$humidity*$humidity + .00122874*$temp*$temp*$humidity + .00085282*$temp*$humidity*$humidity - .00000199*$temp*$temp*$humidity*$humidity;
	
		echo "<p>The Heat Index is: <b> $index </b></p>";
		
		echo "<p>Feel free to calculate the Heat Index again if you would like!</p>";
	}
	else
	{
		echo '<p>The temperature should be a number between 80 and 112.</p>';
		echo '<p>The humidity should be a number between 13 and 85.</p>';
		echo '<p>Please try again.</p>';
		$index = NULL;
	}
}
?>
<br>
<p>If you need to take the temperature, but dont have a thermometer, then see our <a href="workshops.php"><b>Weather Workshops</b></a> to find a workshop on how to make a thermometer.</p>

<p>IF you need to measure the relative humidity, but dont have a hygrometer. dont worry, we have a <a href="workshops.php"><b>Weather Workshops</b></a> that shows you how to make a hygrometer too!</p>

<p>(You can go to the website for those other guys at <a href="http://www.weather.com"><b>The Weather Channel</b></a> to get these measurements, but taking measurements from them isnt as much fun as doing it yourself.)
<?php //footer


include ('includes/footer.html');
?>
</body>
</html>