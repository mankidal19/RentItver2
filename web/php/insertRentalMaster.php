<html>
	<head></head>	
	<body>
		<script>
			function repeat()
	    	{
	    		alert("Company Email or User Email has used");
	    	}
	    	function success()
	    	{
	    		alert("Register Success");
	    		 window.location.replace("../WEB-INF/index.html");
	    	}
	    </script>
			<?php
				include('config.php');
				
				//if(isset($_POST['companyName']))
				//{
					$username = $_POST['companyName_div2'];
					$establishDate = $_POST['establishDate_div2'];
					$address1 = $_POST['address1_div2'];
					$address2 = $_POST['address2_div2'];
					$postcode = $_POST['postcode_div2'];
					$country = $_POST['country_div2'];
					$state = $_POST['state_div2'];
					$city = $_POST['city_div2'];
					$cemail = $_POST['EMail_div2'];
					$cphone = $_POST['Phone_div2'];
					$title=$_POST['title_div2'];
				    $firstName =$_POST['firstName_div2'];
				    $lastName = $_POST["lastName_div2"];
				    $gender =$_POST['gender_div2'];
				    $position = $_POST['position_div2'];
				    $email = $_POST['privateEMail_div2'];
				    $phone = $_POST['privatePhone_div2'];
				    $password = $_POST['password_div2'];
				//}

			    $checkEmail ="select * from rentalmaster where email='$email' or cemail='$cemail'";
			    $check = mysqli_query($conn,$checkEmail) or trigger_error($conn->error."[$checkEmail]");
			    $existsEmail = mysqli_num_rows($check);
			    if($existsEmail==1 || $existsEmail>1)
			    {
			    	?>
			    	<script>window.onload=repeat;</script>
			    	<?php
			    }
			    else
			    {
			    	$sql = "insert into rentalmaster(username,firstName,lastName, password, email, address1, address2, postcode, country, phone, state, city, cemail, cphone, title, gender, position, establishDate) values('$username','$firstName','$lastName', '$password', '$email', '$address1', '$address2', '$postcode', '$country', '$phone', '$state', '$city', '$cemail', '$cphone', '$title', '$gender', '$position', '$establishDate')";
			    	$result=mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql]");
			    	if($result)
			    	{
			    		?>
			    		<script>window.onload=success()</script>
			    		<?php
			    	}
			    }

			    mysqli_close($conn);
			 ?>
	</body>
</html>