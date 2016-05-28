<?php
require("session.php");
if(checkSession() == 1){
    require("dbconnect.php");
    $category = $_POST['category'];
    $description = $_POST['description'];
    $warden = $_POST['warden'];
    $student = $_SESSION['userid'];

    $insert = "INSERT INTO `student_mnt`(`student_id`, `category`, `description`, `warden`) VALUES ('$student','$category','$description','$warden')";

    if ($con->query($insert) === TRUE) {
        header('Location:student_dashboard.php');
        // echo var_dump($current_user);
    } else {
        echo "Error: " . $insert . "<br>" . $con->error;
    }
}
?>