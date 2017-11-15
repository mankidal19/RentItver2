<script>
	function success()
	{
		alert("Update Success");
		window.location.replace("../dashboard/rentalMaster-carList.php");
	}
	function failed()
	{
		alert("Update Failed");
		window.location.replace("../dashboard/rentalMaster-carList.php");
	}

</script>
<?php 
	session_start();
	include('config.php');

	$carID=$_POST['carID'];
	$sql="delete from car where carID='$carID'";
	$result=mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql]");
	if($result)
	{
		
		?><script>window.onload=success()</script><?php
	}
	else
	{
		?><script>window.onload=failed()</script><?php
	}
	mysqli_close($conn);
?>
