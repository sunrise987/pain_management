<?php
/* url : /view_all_pain.php?PatientID=n */

require '../lib/mysql_connect.php';
//require '../lib/login_check.php';
include '../lib/main_container_start.php';
include 'view_all_pain_body.php';
include '../lib/main_container_end.php';

mysqli_close($con);
?>
