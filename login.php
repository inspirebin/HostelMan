<?php
require('dbconnect.php');
if(isset($_POST["username"]) && isset($_POST["password"]))
{
$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT password FROM student WHERE student_id = '$username'";

$result = mysqli_query($con,$sql)or die(mysqli_error($con));

while($row = mysqli_fetch_array($result)) {
    $passwd = $row['password'];
} 

if($passwd == $password)
{
 session_start();
   
   if( isset( $_SESSION['counter'] ) ) {
      $_SESSION['counter'] += 1;
   }else {
      $_SESSION['counter'] = 1;
   }
	
   $msg = "You have visited this page ".  $_SESSION['counter'];
   $msg .= "in this session.";
}
else
{
echo "Password Incorrect";    
}
}

mysqli_close($con);
?>