<html>
	<head></head>
	<body>
		<?php
		    include ("config.php");
			$userName = $_POST['EMail_div1'];
			$gender = $_POST['gender_div1'];
			$date = $_POST['birthDate_div1'];
			$password = $_POST['password_div1'];
			$email = $_POST['EMail_div1'];
			$phone = $_POST['Phone_div1'];
			$level = 'user';

			$checkEmail = "select * from user where email='$email'";
			$check = mysqli_query($conn,$checkEmail) or trigger_error($conn->error."[$checkEmail]");
			$existsEmail = mysqli_num_rows($check);
			if($existsEmail==1 || $existsEmail>1)
			{
			    ?>
			    <script>
					function repeat()
					{
						alert("User Email has register");
						window.location.replace("../WEB-INF/registration_form.html");;
					}
				    window.onLoad=repeat();
				 </script>	
				<?php
			}
			else
			{
			    $sql ="Insert into user(username,gender,birthDate,password,email,phone,level) values('$userName','$gender','$date','$password','$email','$phone','$level')";
			    $result=mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql]");
			    if($result)
			    {
			    	?>
			    	<script>
			    		function success()
						{
							alert("Register Success");
							window.location.replace("../WEB-INF/index.html");;
						}
			    		window.onload=success();
			   		</script>
			    	<?php
			    }
			    else
			    {
			    	?>
			    	<script>
			    		function failed()
						{
							alert("Register Failed");
							window.location.replace("../WEB-INF/registration_form.html");;
						}
						window.onload=failed();
			    	</script>
			    	<?php
			    }
			}
			mysqli_close($conn);
		?>
		</script>
	</body>
</html>
