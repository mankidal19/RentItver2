<script>
			function notAllowed()
			{
				alert("Only jpg is allowed\nTry Upload your photo later");
				window.location.replace('../dashboard/admin-main.php');
			}
			function error()
			{
				alert("Error when uploading file\nTry Upload your photo later");
				window.location.replace('../dashboard/admin-main.php');
			}
			function sizeBig()
			{
				alert("Your file was too big\nTry Upload your photo later");
				window.location.replace('../dashboard/admin-main.php');
			}
			function success()
			{
				alert("Update Success");
				window.location.replace('../dashboard/admin-main.php');
			}
			function Admin()
			{
				alert("You are not currenly login as Admin");
				window.location.replace('../login.html');
			}
			function updateSuccess()
			{
				alert("Update Success");
				window.location.replace("../dashboard/admin-main.php");
			}
		</script>
<?php 
	include('config.php');
	session_start();
	
	$carID=$_POST['carID'];
	$carYears=$_POST['car-years'];
	echo("$carYears"); 

	if(isset($_POST['car-years']))
	{
		$carYears=$_POST['car-years'];
		$sql="update car set year='$carYears' where carID='$carID'";
		$result=mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql}");
	}
	if(isset($_POST['car-makes']))
	{
		$carMakes=$_POST['car-makes'];
		$sql="update car set makes='$carMakes' where carID='$carID'";
		$result=mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql}");
	}
	if(isset($_POST['car-models']))
	{
		$carModels=$_POST['car-models'];
		$sql="update car set models='$carModels' where carID='$carID'";
		$result=mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql}");
	}
	if(isset($_POST['maxPassenger'])&& !empty($_POST['maxPassenger']))
	{
		$maxPassenger=$_POST['maxPassenger'];
		$sql="update car set maxPassenger='$maxPassenger' where carID='$carID'";
		$result=mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql}");
	}
	if(isset($_POST['hourlyRate']) && !empty($_POST['hourlyRate']))
	{
		$hourlyRate=$_POST['hourlyRate'];
		$sql="update car set hourlyRate='$hourlyRate' where carID='$carID'";
		$result=mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql}");
	}
	if(isset($_POST['carDesc'])&& !empty($_POST['carDesc']))
	{
		$carDesc=$_POST['carDesc'];
		$sql="update car set description='$carDesc' where carID='$carID'";
		$result=mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql}");
	}
	
	if(isset($_FILES['carFile']))
	{
		$delete=glob('../images/uploadCar/'.$carID.'*');
		unlink($delete);
		$file = $_FILES['carFile'];
		$fileName = $_FILES['carFile']['name']; 
		$fileTmpName = $_FILES['carFile']['tmp_name'];
		$fileSize = $_FILES['carFile']['size'];
		$fileError = $_FILES['carFile']['error'];
		$fileType = $_FILES['carFile']['type'];
		$fileExt = explode('.',$fileName);
		$fileActualExt= strtolower(end($fileExt));
		$allowed = array('jpg','jpeg','png');
		echo($fileActualExt);

			if(in_array($fileActualExt,$allowed))
			{
				if($fileError==0)
				{
					if($fileSize<10000000)
					{
						$sql1="select carID from car where carID='$carID'";
						$result1=mysqli_query($conn,$sql1) or trigger_error($conn->error."[$sql1]");
						$row = mysqli_fetch_array($result1);
						$carID = $row['carID'];
						$fileNameNew = "profile".$carID.".".$fileActualExt;
						$fileDestination = '../images/uploadCar/'.$fileNameNew;
						move_uploaded_file($fileTmpName,$fileDestination); 

						?><script>window.onload=success();</script> <?php
					}
					else
					{
						?><script>window.onload=sizeBig();</script><?php
					}
				}
				else
				{
					?><script>window.onload=error();</script><?php
				}
			}
	}
	?><script> window.onload=updateSuccess();</script><?php
	mysqli_close($conn);
?>