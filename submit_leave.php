<?php
session_start();
if(!isset($_SESSION['userid']) && !empty($_SESSION['userid'])) {
    header('Location:student_login.html');
}else {
    require('dbconnect.php');
    $student = $_POST['student'];
    $reason = $_POST['reason'];
    $dt_leave = $_POST['dt_leave'];
    $dt_arr = $_POST['dt_arr'];
    $faculty = $_POST['faculty'];
    $warden = $_POST['warden'];
    $current_user = $_SESSION['userid'];


    $insert = "INSERT INTO `student_leave`(`student_id`, `faculty_id`, `warden_id`, `name`, `reason`, `date_of_leave`, `date_of_return`, `status`) VALUES ('$current_user','$faculty','$warden','$student','$reason','$dt_leave','$dt_arr','0')";

    if ($con->query($insert) === TRUE) {
        header('Location:student_dashboard.php');
       // echo var_dump($current_user);
    } else {
        echo "Error: " . $insert . "<br>" . $con->error;
    }
}
?>