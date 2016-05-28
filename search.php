<?php
require("session.php");
if(checkWardenSession() == 1){
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Submit Remarks</title>

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
                    <li>
                        <a href="warden_dashboard.php">
                            <i class="pe-7s-id"></i>
                            <p>Leave forms</p>
                        </a>
                    </li>
                    <li>
                        <a href="warden_maintain.php">
                            <i class="pe-7s-tools"></i>
                            <p>Maintenence Requests</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            <i class="pe-7s-help2"></i>
                            <p>Remark</p>
                        </a>
                    </li>

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
                        <a class="navbar-brand" href="#">Remarks</a>
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

                <!-- remarks -->
                <div class="col-md-12">

                    <div class="content">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="query" class="form-control col-md-12">
                                    </div>
                                    <div class="clearfix"></div>
                                    <button name ="submit" type="submit" class="btn btn-info btn-fill pull-right"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                        <div class="row">
                            <div class="col-md-12 container">
                                <?php
                                if(isset($_POST['submit'])){
                                $query = $_POST['query'];

                                require("dbconnect.php");
                                $sql = "SELECT * FROM student WHERE name LIKE '%$query%'  or student_id LIKE '%$query%'";

                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {?>
                                <h3 class="text-center">
                                    <?php echo $result->num_rows?> Results found for '<?php echo $query ?>'
                                </h3>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr><th>Name</th>
                                        <th>Course</th>
                                        <th>Rollno</th>
                                        <th>Room</th>
                                        <th>Advisor</th>
                                        <th>Phone</th>
                                        <th>Guardians Phone</th>
                                    </tr></thead>
                                    <tbody>
                                    <?php
                                    while($row = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['course'] ?></td>
                                            <td><?php echo $row['student_id'] ?></td>
                                            <td><?php echo $row['room'] ?></td>
                                            <td><?php echo $row['advisor'] ?></td>
                                            <td><b><?php echo $row['phone'] ?></b></td>
                                            <td><?php echo $row['gphone'] ?></td>
                                        </tr>
                                    <?php  } }
                                    else if($result->num_rows == 0){ ?>
                                        <h3 class="text-center">
                                            Sorry! no results found for '<?php echo $query ?>'
                                        </h3>
                                   <?php }
                                    }
                                    ?>
                                    </tbody>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--end  warden announcements -->
    </div>

    <br>

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

<?php }?>