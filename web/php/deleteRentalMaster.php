<script>
	function success()
	{
		alert("Update Success");
		window.location.replace("../dashboard/admin-main.php");
	}
	function failed()
	{
		alert("Update Failed");
		window.location.replace("../dashboard/admin-main.php");
	}

</script>
<?php 
	session_start();
	include('config.php');

	$userID=$_POST['userID'];
	$sql="delete from rentalMaster where userID='$userID'";
	$result=mysqli_query($conn,$sql) ;
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
