<?php
/**/
require '../lib/login_check.php';
require '../lib/mysql_connect.php';
?>

<html>
  <head>
    <link href='../style.css' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <?php include 'view_all_pain_managements_body.php'; ?>
  </body>
</html>

<?php mysqli_close($con); ?>
