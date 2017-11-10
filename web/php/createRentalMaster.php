<?php
 
	  include('config.php');


$sql = "CREATE TABLE rentalmaster
        (
		userID int(11) NOT NULL AUTO_INCREMENT,
		username varchar(30) NOT NULL,
 		firstName varchar(100) NOT NULL,
 		lastName varchar(100) NOT NULL,
 		password varchar(12) NOT NULL,
 		email varchar(50) NOT NULL,
 		address1 varchar(250)NOT NULL,
 		address2 varchar(250)NOT NULL,
 		postcode varchar(10) NOT NULL,
 		country varchar(30) NOT NULL,
 		phone varchar(15) NOT NULL,
 		state varchar(20) NOT NULL,
 		city varchar(20) NOT NULL,
 		cemail varchar(50) NOT NULL,
 		cphone varchar(20) NOT NULL,
 		title varchar(3) NOT NULL,
 		gender varchar(10) NOT NULL,
 		position varchar(20) NOT NULL,
 		establishDate date NOT NULL,
 		level varchar(15) NOT NULL default'RentalMaster',
 		valid int(4) NOT NULL default '1',
 		token varchar(40),
		PRIMARY KEY (userID)
        )AUTO_INCREMENT=20000";

$result=mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql]");

mysqli_close($conn);
?>