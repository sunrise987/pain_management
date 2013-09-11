<?php
/**/
//require '../lib/login_check.php';
require '../lib/mysql_connect.php';
require '../lib/main_container_start.php';
include 'view_all_pain_managements_body.php';
require '../lib/main_container_end.php';
mysqli_close($con);

?>
