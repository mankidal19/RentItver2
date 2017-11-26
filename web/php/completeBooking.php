<?php 
	session_start();
	include('config.php');
	$bookingID=$_POST['bookingID'];
	$sql="update booklist set status=3 where bookID='$bookingID'";
	$result=mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql}");
	if($result)
	{
		?><script>
			function confirmed()
			{
				alert("Confirmed Booking");
				window.location.replace("../dashboard/rentalMaster-main.php");
			}
			window.onload=confirmed();
		</script><?php
	}
?>