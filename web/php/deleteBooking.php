<?php 
	session_start();
	include('config.php');
	$bookingID=$_POST['bookingID'];
	$sql="delete from booklist where bookID='$bookingID'";
	$result=mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql}");
	if($result)
	{
		?><script>
			function deleted()
			{
				alert("Deleted Booking");
				window.location.replace("../dashboard/rentalMaster-main.php");
			}
			window.onload=deleted();
		</script><?php
	}
?>