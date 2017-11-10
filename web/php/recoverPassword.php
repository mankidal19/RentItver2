<?php
	include(config.php);
	$email=$_post['email'];
	function checkRentalMaster($email)
	{
		$query=("Select * from rentalmaster where cemail='$email");
		$result=mysqli_query($conn,$query)or trigger_error($conn->error."[$query]");
		$existsEmail = mysqli_num_rows($result);
		if($existsEmail>=1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function checkUser($email)
	{
		$query=("Select * from user where email='$email");
		$result=mysqli_query($conn,$query)or trigger_error($conn->error."[$query]");
		$existsEmail = mysqli_num_rows($result);
		if($existsEmail>=1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function generateRandomString($length=10)
	{
		$character = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUCWXYZ"
		$characterLength = strlen($character);
		$randomString='';
		for($i=0;$i<$length;i++)
		{
			$randomString = $character[rand(0,$characterLength)];
		} 
		return md5($randomString);
	} 

	function send_mail($to,$token)
	{
		require 'PHPMailerAutoLoad.php';
		$mail = new PHPMailer;
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'rentit@gmail.com';
		$mail->Password = '1234567890abcde';
		$mail->SMTPSecure = 'ssl';
		$mail->Port=465;
		$mail->From = 'rentit@gmail.com';
		$mail->FromName = 'RentIt.Com';
		$mail->addAddress($to);

		$mail->isHTML(true);
		$mail->Subject = 'Demo:Password Recovery Instruction';
		$link->'localhost...';
		$mail->Body = '<b>Hello</b><br><br>You have requested for your password recovery. <a href='$link' target='_blank'>Click here</a> to reset your password. If you are unable to click the link then copy the below link and paste in your browser to reset your password.<br><i>". $link."</i>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		if(!$mail->send())
		{
			return 'fail';
		}
		else
		{
			return 'success';
		}
	}

	function verifytokenUser($email,$token)
	{
		$query = mysqli_query($conn,'SELECT valid FROM user where email='$email)
		$row=mysqli_fetch_assoc($query);
		if (mysqli_num_rows($query)>0)
		{
			if($row['valid']==1)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}
?>