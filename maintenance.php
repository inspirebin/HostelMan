<?php
require("session.php");
if(checkSession() == 1){
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Maintenance</title>

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
    <div class="sidebar" data-color="azure" data-image="assets/img/sidebar-5.jpg">

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
                    <a href="student_dashboard.php">
                        <i class="pe-7s-study"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li>
                    <a href="leave_form.html">
                        <i class="pe-7s-id"></i>
                        <p>Leave form</p>
                    </a>
                </li>
                <li class="active">
                    <a href="maintenance.php">
                        <i class="pe-7s-tools"></i>
                        <p>Maintenance</p>
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
                    <a class="navbar-brand" href="#">Request Maintenance</a>
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

            <!-- maintenence form -->
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Maintanence request</h4>
                    </div>
                    <div class="content">
                        <form action="submit_maintenance.php" method="POST">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Select category</label>
                                        <select name="category" class="form-control">
                                            <option value="plumbing">plumbing</option>
                                            <option value="carpenter">carpenter</option>
                                            <option value="Electrical">Electrical</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Detail Description of the problem</label>
                                            <textarea name="description" rows="5" class="form-control" placeholder="Here can be your description" value="Mike"></textarea>
                                        </div>
                                    </div>
                                    <?php
                                      require('dbconnect.php');
                                    ?>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>warden</label>
                                            <select name="warden" id="" class="form-control">
                                                <?php
                                                  $sql = "SELECT `warden_id`,`warden_name`FROM `warden`";
                                                 $result = $con->query($sql);
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($row = $result->fetch_assoc()) {
                                                        ?>
                                                        <option value="<?php echo $row['warden_id'] ?>"><?php echo $row['warden_name'] ?></option>
                                                    <?php
                                                    }
                                                } else {
                                                    echo "0 results";
                                                }
                                                ?>
                                                
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- maintenence form -->

        </div>
    </div>
</div>
</div>
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
<?php }?>