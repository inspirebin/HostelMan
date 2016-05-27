<?php

$con = mysqli_connect("localhost","hostelman","hostelman123","hostelapp");

if (mysqli_connect_errno())

{
echo "MySQLi Connection was not established:" . mysqli_connect_error();
}
?>