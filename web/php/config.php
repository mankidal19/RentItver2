	<?php
	     // login to MySQL Server from PHP, change username and password to your own 
	     $conn = new mysqli("localhost","root","","rentit");

	     // If login failed, terminate the page (using function 'die')
	     if (!$conn) die("Error! Cannot connect to server: ". mysql_error() );

	     // Login was successful. Then choose a database to work with (change to your own database)
	     $conn->connect("localhost","root","","rentit");
	 ?>
