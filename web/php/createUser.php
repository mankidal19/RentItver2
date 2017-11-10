<?php
 
	  include('config.php');


$sql = "CREATE TABLE user
        (
			userID int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	 		username varchar(100) NOT NULL,
	 		gender varchar(10) NOT NULL,
	 		birthDate date NOT NULL,
	 		password varchar(12) NOT NULL,
	 		email varchar(50) NOT NULL,
	 		phone varchar(15) NOT NULL,
			level varchar(20) NOT NULL,
			valid int(4) NOT NULL default'1',
	 		token varchar(40)
        )AUTO_INCREMENT=200000";

$result=mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql]");

mysqli_close($conn);
?>