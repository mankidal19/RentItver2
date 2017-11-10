<?php 
// Start up your PHP Session
session_start();

include('config.php');
?>

<?php
 

// username and password sent from form
$myusername=$_POST['username'];
$mypassword=$_POST['password'];

$sql="SELECT * FROM user WHERE username='$myusername' and password='$mypassword'";

$result=mysqli_query($conn,$sql);
$rows=mysql_fetch_array($result);
$user_name=$rows['username'];
$user_id=$rows['password'];
$user_level=$rows['level'];
$userID = $rows['userID'];
	
// mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
 
if($count==1){
		
$_SESSION["Login"] = "YES";
 
// Add user information to the session (global session variables)
$_SESSION['USER'] = $user_name;
$_SESSION['ID'] = $user_id;
$_SESSION['LEVEL'] =$user_level;

 $expire = time()+60*60*24*30;
 
 setcookie("userID", $userID, $expire);
        
                if($_SESSION["LEVEL"] == "Admin"){
                	header("Location: admin.php");
                }
            
                else if($_SESSION["LEVEL"] == "Staff"){
                	header("Location: staff.php");
                }
            
                else if($_SESSION["LEVEL"] == "Manager"){
                	header("Location: manager.php");
                }
// echo "<h1>You are now correctly logged in</h1>";
// echo "<p><a href='document.php'>Proceed to site</a></p>";
 

 }
//if wrong username and password
else {

$_SESSION["Login"] = "NO";
 
echo "<h1>You are NOT correctly logged in </h1>";
echo "<p><a href='document.php'>Link to protected file</a></p>";
}

?>
		 
	  

 
