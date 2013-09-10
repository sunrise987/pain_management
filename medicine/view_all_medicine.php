<?php
/* url : /view_all_medicine.php?PainID=n */
require '../lib/login_check.php';
require '../lib/mysql_connect.php';
?>

<html>
  <head>
    <link href='../style.css' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <div>
      <?php include 'view_all_medicine_body.php'; ?>
    </div>
  </body>
</html>

<?php mysqli_close($con); ?>
