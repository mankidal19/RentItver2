<script>
	function logout()
	{
		alert("You are currently logout");
		window.location.replace("../index.html");
	}
</script>
<?php
	$_SESSION["LOGIN"]='NO';
	$_SESSION["LEVEL"]='NONE';
	?><script>window.onload=logout();</script>
?>