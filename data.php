<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>data</title>
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
<h1>Climate Data For All Cities</h1>

<?      //begin php code

	$page_title = 'Climate Data for All Cities';
	include ('includes/header.html');

		require ('mysqli_connect.php');

?>


<?php
global $r;
$display = 15;


include ('mysqli_connect.php');

//determine pages
if (isset($_GET['p']) && is_numeric($_GET['p'])) {
	$pages = $_GET['p'];
	echo "<p>the number of pages at $display entries per page is $pages</p>";
} else { 
 	// Count the number of records:
	$q = "SELECT COUNT(city) FROM city_stats";
	$r = @mysqli_query ($dbc, $q);
	$row = @mysqli_fetch_array ($r, MYSQLI_NUM);
	$records = $row[0];
	// Calculate the number of pages...
	if ($records > $display) { 
		$pages = ceil ($records/$display);
		echo "<p>the number of pages at $display entries per page is $pages</p>";
	} else {
		$pages = 1;
		echo "<p>the number of pages at $display entries per page is $pages</p>";
	}
} 
//where to start
if (isset($_GET['s']) && is_numeric($_GET['s'])) {
	$start = $_GET['s'];
} else {
	$start = 0;
}

//default sort
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'city';

//sorting order
switch ($sort) {
	case 'city':
		$order_by = 'city ASC';
		break;
	case 'state':
		$order_by = 'state ASC';
		break;
	case 'rh':
		$order_by = 'record_high ASC';
		break;
	case 'rl':
		$order_by = 'record_low ASC';
		break;
	case 'clear':
		$order_by = 'days_clear ASC';
		break;
	case 'cloudy':
		$order_by = 'days_cloudy ASC';
		break;
	case 'percip':
		$order_by = 'days_with_percip ASC';
		break;
	case 'snow':
		$order_by = 'days_with_snow ASC';
		break;
	default:
		$order_by = 'city ASC';
		$sort = 'city';
		break;
}

//define & run query
$query = "SELECT * FROM city_stats ORDER BY $order_by LIMIT $start, $display";
$r = mysqli_query($dbc, $query);

$num = mysqli_num_rows($r);


if ($r){
	
	echo '<p>query has successfully run!</p>';
	
	if ($num > 0) { //number of cities in table
	
	echo "<p>There are currently $num listed cities.</p>\n <br>";
}
else{
	echo '<p>There are currently no cities in the database.</p>';
}
	//new table header
	echo '<table align="center" cellspacing="0" cellpadding="5" width="75%">
<tr>
	<td align="left"><b><a href="data.php?sort=city">City</a></b></td>
	<td align="left"><b><a href="data.php?sort=state">State</a></b></td>
	<td align="right"><b><a href="data.php?sort=rh">High</a></b></td>
	<td align="right"><b><a href="data.php?sort=rl">Low</a></b></td>
	<td align="right"><b><a href="data.php?sort=clear">days clear</a></b></td>
	<td align="right"><b><a href="data.php?sort=cloudy">days cloudy</a></b></td>
	<td align="right"><b><a href="data.php?sort=percip">days with precip</a></b></td>
	<td align="right"><b><a href="data.php?sort=snow">days with snow</a></b></td>
</tr>';
		
		//print data in table
		$bg = '#eeeeee'; 
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) { //table data
		$bg = ($bg=='#eeeeee' ? '#8fbc8f' : '#eeeeee');
		echo '<tr bgcolor="' . $bg . '">
		<td align="left">' . $row['city'] . '</td><td align="left">' . $row['state'] . '</td>
		<td align="right">' . $row['record_high'] . '</td><td align="right">' . $row['record_low'] . '</td>
		<td align="right">' . $row['days_clear'] . '</td><td align="right">' . $row['days_cloudy'] . '</td>
		<td align="right">' . $row['days_with_percip'] . '</td><td align="right">' . $row['days_with_snow'] . '</td></tr>
		';
}
	echo '</table>';
	//end table
	
	mysqli_free_result ($r);
}
else{
	echo '<p class="error">try again my friend</p>';
}

mysqli_close($dbc);

// Make the links to other pages, if necessary.
if ($pages > 1) {
	
	echo '<br /><p>';
	$current_page = ($start/$display) + 1;
	
	// If it's not the first page, make a Previous button:
	if ($current_page != 1) {
		echo '<a href="data.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
	}
	
	// Make all the numbered pages:
	for ($i = 1; $i <= $pages; $i++) {
		if ($i != $current_page) {
			echo '<a href="data.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
		} else {
			echo $i . ' ';
		}
	} // End of FOR loop.
	
	// If it's not the last page, make a Next button:
	if ($current_page != $pages) {
		echo '<a href="data.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
	}
	
	echo '</p>'; 
	
} 

?>

<?php //footer


include ('includes/footer.html');
?>
</body>
</html>