<?php
	include('config.php');
	$sql1 = "insert into rentalmaster(username,firstName,lastName, password, email,address1, address2, postcode,country,phone,state,city,cemail,cphone,title,gender,position,establishDate,businessId) values('rentalMaster','first','last','12345678','privatemaster@gmail.com','address1','address2','81300','Malaysia','0123546789','Johor','Skudai','rentalmaster@gmail.com','0123456789','title','gender','position','2017-10-29','123456789')";
	$sql5 = "insert into rentalmaster(username,firstName,lastName, password, email,address1, address2, postcode,country,phone,state,city,cemail,cphone,title,gender,position,establishDate,businessId) values('rentalMaster2','first','last','12345678','privatemaster3@gmail.com','23,Jalan Sasa 3','Taman Gaya','81100','Malaysia','0123546789','Johor','Johor Bahru','rentalmaster2@gmail.com','0123456789','title','gender','position','2017-10-29','123456789')";
	$sql4 = "insert into rentalmaster(username,firstName,lastName, password, email,address1, address2, postcode,country,phone,state,city,cemail,cphone,title,gender,position,establishDate,businessId) values('rentalMaster3','first','last','12345678','privatemaster3@gmail.com','79 Jalan Sisi','Taman Mutiara','84000','Malaysia','0124567891','Johor','Muar','rentalmaster3@gmail.com','0124567891','title','Female','position','2017-11-29','123456789')";
	$sql2 = "insert into user(username, gender, birthDate,password, email, phone, level) values ('admin','male','123','12345678','admin@gmail.com','0123456789','admin')" ; 
	$sql3 = "insert into user(username, gender, birthDate, password, email, phone, level) values ('user1','male','123','12345678','user@gmail.com','0123456789','user')" ;
	$sql4 = "insert into user(username, gender, birthDate, password, email, phone, level) values ('user2','female','123','12345678','user2@gmail.com','0123456789','user')" ;
	$sql5 = "insert into user(username, gender, birthDate, password, email, phone, level) values ('user3','female','123','12345678','user3@gmail.com','0123456789','user')" ;
	$result1=mysqli_query($conn,$sql1) or trigger_error($conn->error."[$sql]");
	$result2=mysqli_query($conn,$sql2) or trigger_error($conn->error."[$sql]");
	$result3=mysqli_query($conn,$sql3) or trigger_error($conn->error."[$sql]");
	$result4=mysqli_query($conn,$sql4) or trigger_error($conn->error."[$sql]");
	$result5=mysqli_query($conn,$sql5) or trigger_error($conn->error."[$sql]");

?>