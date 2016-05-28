<?php
session_start();
ini_set('display_errors', 1);
if(!isset($_SESSION['faculty_id']) && !empty($_SESSION['faculty_id'])) {
    header('Location:faculty_login.html');
    ?>
<?php }
else{
    require('dbconnect.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Dashboard</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Hostel Management system
                </a>
            </div>

            <ul class="nav">
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="">
                                Account
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Dropdown
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <!-- Warden announcements -->
            <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title text-center"><b>Leave forms</b></h4>
                </div>
                <div class="content">
                    <!--Leave forms-->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr><th>Reason</th>
                                        <th>Name</th>
                                        <th>Date of leave</th>
                                        <th>Date of arrival</th>
                                        <th>warden</th>
                                        <th>status</th>
                                    </tr></thead>
                                    <tbody>
                                    <tr>
                                        <?php
                                        $faculty = $_SESSION['faculty_id'];
                                        $sql = 'SELECT * FROM `student_leave`,`warden` WHERE student_leave.warden_id = warden.warden_id';
                                        $result = $con->query($sql);

                                        if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row["reason"] ?></td>
                                        <td><?php echo $row["name"] ?></td>
                                        <td><?php echo $row["date_of_leave"] ?></td>
                                        <td><?php echo $row["date_of_return"] ?></td>
                                        <td><?php echo $row["warden_name"] ?></td>
                                        <td><?php
                                            if($row['status'] ==0){
                                                echo '<a href="approve.php?id=' . $row['leave_id'] . '" class="btn btn-success"><i class="fa fa-check-square-o" aria-hidden="true"></i> Approve</a>';
                                                 echo '</br>';
                                                echo '<a href="disapprove.php?id=' . $row['leave_id'] . '" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Disapprove</a>';
                                            }
                                            else if($row['status'] ==1){
                                                echo '<button class="btn btn-info">Approved</button>';
                                            }
                                            else if($row['status'] ==2){
                                                echo '<button class="btn btn-danger">Disapproved</button>';
                                            }
                                            ?></td>
                                    </tr>
                                    <?php
                                    }
                                    } else {
                                        echo "0 results";
                                    }

                                    ?>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- leave forms-->
                    <div class="footer">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i>Updated 3 minutes ago
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="col-md-12">
                <div class="card ">
                    <div class="header">
                        <h4 class="title">Remarks</h4>
                    </div>
                    <div class="content">
                        <!--Leave forms-->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                </div>
                                <div class="content table-responsive table-full-width">

                                     <!-- print all leave forms -->
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr><th>Name</th>
                                            <th>Rollno</th>
                                            <th>Remark</th>
                                            <th>warden</th>
                                            <th>Hostel</th>
                                            <th>Date</th>
                                        </tr></thead>
                                        <tbody>
                                        <tr>
                                            <?php
                                        $sql = "SELECT * FROM `remarks`,`student`,`warden` WHERE (remarks.student_id = student.student_id)and (remarks.warden_id = warden.warden_id) and(remarks.faculty_id = '$faculty')";
                                        $result = $con->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) { ?>
                                                <tr>
                                                    <td><?php echo $row["name"] ?></td>
                                                    <td><b><?php echo $row["student_id"] ?></b></td>
                                                    <td class="well"><?php echo $row["remark"] ?></td>
                                                    <td><?php echo $row["warden_name"] ?></td>
                                                    <td><?php echo $row["hostel_name"] ?></td>
                                                    <td><?php echo $row["date"] ?></td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        $con->close();
                                        ?>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- leave forms-->
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-history"></i> Updated 3 minutes ago
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        </div>
                        <!-- leave forms-->
                    </div>
                </div>
            </div>
            <!-- end warden announcements-->
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>


</html>
    <?php
}?>