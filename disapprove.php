<?php

if(isset($_GET['id'])){
    $id= $_GET['id'];
    require('dbconnect.php');
    $query = "UPDATE `student_leave` SET `status`= '2' where `leave_id` = '$id'";

    if ($con->query($query) === TRUE) {
        header('Location:faculty_dashboard.php');
        // echo var_dump($current_user);
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }
}
else{
    echo  "Invalid parameters";
}

?>