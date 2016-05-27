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
    if(isset($passwd)){
        if($passwd == $password)
        {
            session_start();
            $_SESSION['userid'] = $username;
            header('Location: student_dashboard.php');
        }
        else{
            echo "password Incorrect";
        }
    }
else
{
echo "Password Incorrect";    
}
}

mysqli_close($con);
?>