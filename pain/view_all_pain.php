<?php
/* url : /view_all_pain.php?PatientID=n */

require '../lib/mysql_connect.php';
require '../lib/login_check.php';
?>

<html>
  <head>
    <link href='../style.css' rel='stylesheet' type='text/css'>
  </head>
    <body>
    <?php include 'view_all_pain_body.php'; ?>
  </body>
</html>

<?php mysqli_close($con); ?>
