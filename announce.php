<?php
require("session.php");
require("dbconnect.php");
if(checkWardenSession() == 1){
    $title = $_POST['title'];
    $info =  $_POST['info'];
    $insert = "INSERT INTO `announcements`(`title`, `information`) VALUES ('$title','$info')";
    if ($con->query($insert) === TRUE) {
        header('Location:warden_dashboard.php');
    } else {
        echo "Error: " . $insert . "<br>" . $con->error;
    }
}
?>


