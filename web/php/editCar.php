<?php 
	include('config.php');
	session_start();

	$carYears=$_POST['car-years'];
	$carMakes=$_POST['car-makes'];
	$carID=$_POST[''];
	$carModels=$_POST['car-models'];
	$maxPassenger=$_POST['maxPassenger'];
	$hourlyRate=$_POST{'hourlyRate'};
	$carDesc=$_POST['carDesc'];
	$ownerID=$_SESSION['ID'];

	$sql="update car set year='$carYears',makes='$carMakes',models='$carModels',maxPassenger='$maxPassenger',description='$carDesc' hourlyRate='$hourlyRate' where ownerID='$carID';"
	$result=mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql}");
	if($result)
	{
		$sql="select * from car where "
	}


	mysqli_close($conn);
?>