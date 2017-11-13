<html>
	<head>
		<script>
			function notAllowed()
			{
				alert("Only jpg, jpeg and png is allowed to uploaded");
				window.location.replace('../dashboard/rentalMaster-addCar.php');
			}
			function error()
			{
				alert("Error when uploading file");
				window.location.replace('../dashboard/rentalMaster-addCar.php');
			}
			function sizeBig()
			{
				alert("Your file was too big");
				window.location.replace('../dashboard/rentalMaster-addCar.php');
			}
			function success()
			{
				alert("Upload Success");
				window.location.replace('../dashboard/rentalMaster-main.php');
			}
			function notRentalMaster()
			{
				alert("You are not currenly login as RentalMaster");
				window.location.replace('../login.html');
			}
		</script>
	</head>
	<body>			
		<?php 
			include('config.php');
			session_start();
			$years=$_POST['car-years'];
			$makes=$_POST['car-makes'];
			$models=$_POST['car-models'];
			$hourlyRate=$_POST['hourlyRate'];
			$maxPassenger=$_POST['maxPassenger'];
			$description=$_POST['carDesc'];
			$ownerID=$_SESSION['ID'];

			if($_SESSION['LEVEL']=='RentalMaster')
			{
				$sql="insert into car(year,makes,models,hourlyRate,maxPassenger,description,ownerID) values('$years','$makes','$models','$hourlyRate','$maxPassenger','$description','$ownerID')";
				$result=mysqli_query($conn,$sql) or trigger_error($con->error."[$sql]");
				if($result)
				{
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

				}
				if(in_array($fileActualExt,$allowed))
					{
						if($fileError==0)
						{
							if($fileSize<1000000)
							{
								$sql1="select carID from car where ownerID='$ownerID'";
								$result1=mysqli_query($conn,$sql1) or trigger_error($conn->error."[$sql1]");
								$row = mysqli_fetch_array($result1);
								$carID = $row['carID'];
								$fileNameNew = "profile".$carID.".".$fileActualExt;
								$fileDestination = '../images/uploadCar/'.$fileNameNew;
								move_uploaded_file($fileTmpName,$fileDestination);
								?>
								<script>window.onload=success();</script>									
								<?php
							}
							else
							{
								?>
								<script>window.onload=sizeBig();</script>
								<?php
							}
						}
						else
						{
							?>
							<script>window.onload=error();</script>
							<?php
						}
					}
					else
					{
						?>
						<script>window.onload=notAllowed();</script>
						<?php
	//				}
				}
			}
			else
			{
				?>
				<script>window.onload=notRentalMaster();</script>
				<?php
			}

		?>
	</body>

</html>
