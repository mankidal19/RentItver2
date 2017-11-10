<?php
 
	  include('config.php');
	  session_start();


$sql = "CREATE TABLE car
        (
			carID int(15) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	 		year int(5) NOT NULL,
	 		makes varchar(20) NOT NULL,
	 		models varchar(20) NOT NULL,
	 		hourlyRate varchar(20) NOT NULL,
	 		description varchar(200) NOT NULL,
	 		ownerID int(11) NOT NULL, 
	 		borrorID int(11),
	 		FOREIGN KEY (ownerID) references rentalmaster(userID) on delete cascade on update cascade,
	 		FOREIGN KEY (borrorID) references user(userID) on delete cascade on update cascade
        )AUTO_INCREMENT=2000000";

$result=mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql]");

mysqli_close($conn);
?>