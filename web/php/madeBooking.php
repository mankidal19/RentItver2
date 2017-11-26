<?php 
    session_start();
    if($_SESSION['LOGIN']!="YES")
    {
        ?><script>window.onload=haventLogin();</script><?php
    }
    if($_SESSION['LEVEL']!="user")
    {
        ?><script>
            function notUser()
            {
                alert("You are not user");
                $_SESSION['LOGIN']='NO';
                window.location.replace(../index.html");
            }
        window.onload=notUser();</script><?php
    }
?>
<script>
	function successBooking()
	{
		alert("Booking Success\nPlease wait for approval from car company");
		window.location.replace("../dashboard/customer-main.php");
	}
</script>

<?php
	include("config.php");
	$carId=$_POST['carId'];
	$carMake=$_POST['carMake'];
	$carModel=$_POST['carModel'];
	$companyName=$_POST['companyName'];
	$hourlyRate=$_POST['hourlyRate'];
	echo $hoursRent=$_POST['hoursRent'];
	$totalRate=$_POST['totalRate'];
	$startDate=$_POST['startDate'];
	$returnDate=$_POST['returnDate'];
	$startTime=$_POST['startTime'];
	$returnTime=$_POST['returnTime'];
	$sql="select * from car where carId='$carId'";
	$checkOwnerID = mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql");
	$row=mysqli_fetch_array($checkOwnerID);
	$ownerID=$row['ownerID'];
	$sql="insert into booklist(totalPay,carID,ownerID,borrorID,startDate,returnDate,hoursRent,startTime,returnTime)values('$totalRate','$carId','$ownerID','{$_SESSION['ID']}','$startDate','$returnDate','$hoursRent','$startTime','$returnTime')";
	$insertBooking = mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql");
	// if($insertBooking)
	// {
	// 	?><script>window.onload=successBooking();</script><?php
	// }

?>