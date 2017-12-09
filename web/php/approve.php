<?php 
	session_start();
	include('config.php');
	$bookingID=$_POST['bookingID'];
	$confirmCode = $_POST['confirmationCode'];
	$sql="update booklist set status=2,confirmCode='$confirmCode' where bookID='$bookingID'";
	$result=mysqli_query($conn,$sql);

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