<?php
/* url : /view_all_medicine.php?PainID=n */
//require '../lib/login_check.php';
require '../lib/mysql_connect.php';
include '../lib/main_container_start.php';
include 'view_all_medicine_body.php';
include '../lib/main_container_end.php';

mysqli_close($con);
?>
