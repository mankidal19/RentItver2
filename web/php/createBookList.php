<?php
 
	  include('config.php');
	  session_start();


$sql = "CREATE TABLE booklist
        (
			bookID int(15) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	 		totalPay varchar(200) NOT NULL,
	 		carID int(15) NOT NULL,
	 		ownerID int(11) NOT NULL, 
	 		startDate varchar(15) NOT NULL,
	 		startTime varchar(15) NOT NULL,
	 		returnDate varchar(15) NOT NULL,
	 		returnTime varchar(15) NOT NULL,
	 		hoursRent int(5) NOT NULL,
	 		status int(2) NOT NULL DEFAULT '0',
	 		borrorID int(11) NOT NULL,
	 		confirmCode varchar(10),
	 		FOREIGN KEY (ownerID) references rentalmaster(userID) on delete cascade on update cascade,
	 		FOREIGN KEY (carID) references car(carID) on delete cascade on update cascade,
	 		FOREIGN KEY (borrorID) references user(userID) on delete cascade on update cascade
        )AUTO_INCREMENT=21453215";

$result=mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql]");

mysqli_close($conn);
?>