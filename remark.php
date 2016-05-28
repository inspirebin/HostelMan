<?php
require("session.php");
require("dbconnect.php");
if(checkWardenSession() == 1){
      $student = $_POST['name'];
      $remark =  $_POST['reason'];
      $warden = $_SESSION['warden_id'];
      $date = date("Y-m-d");
     $sql = "select advisor from student where student_id = '$student'";
     $student_list = mysqli_query($con, $sql);
     $row = mysqli_fetch_assoc($student_list);
     $advisor = $row['advisor'];
      var_dump($row);
    $insert = "INSERT INTO `remarks`(`student_id`, `remark`, `warden_id`,`faculty_id`,`date`) VALUES('$student','$remark','$warden','$advisor','$date')";
    if ($con->query($insert) === TRUE) {
        header('Location:warden_dashboard.php');
        // echo var_dump($current_user);
        //echo var_dump( $insert);
    } else {
        echo "Error: " . $insert . "<br>" . $con->error;
    }
}
?>


