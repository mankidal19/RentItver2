<?php 
	session_start();
	include('config.php');
	$bookingID=$_POST['bookingID'];
	$sql="update booklist set status=2 where bookID='$bookingID'";
	$result=mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql}");
	if($result)
	{
		?><script>
			function approve()
			{
				alert("Approved Booking");
				window.location.replace("../dashboard/rentalMaster-main.php");
			}
			window.onload=approve();
		</script><?php
	}
?>