<?php # Script 3.7 - index.php #2

// This function outputs theoretical HTML
// for adding ads to a Web page.
function create_ad() {
	echo '<p class="ad">Dont forget to <a href="register.php">Register</a> to become a Weather Wizard!</p>';
} // End of the function definition.

$page_title = 'Welcome to the Weather Wizards Site!';
include ('includes/header.html');

// Call the function:
create_ad();
?>

<h1>Weather Wizards</h1>

	<p>Welcome to the Weather Wizards website for budding meterologists in the South Carolina Lowcountry area.</p>
	
	<p>Our website is flooded with information about local weather, workshops, and more. So check bac often.</p>

<?php

// Call the function again:
create_ad();

include ('includes/footer.html');
?>