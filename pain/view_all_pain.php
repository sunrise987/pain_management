<?php
/* url : /view_all_pain.php?PatientID=n */

echo "
<html>
  <head>
    <link href='../style.css' rel='stylesheet' type='text/css'>
  </head>
    <body>
";

$con=mysqli_connect("localhost", "php_app", "admin000", "patient_management");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

include 'view_all_pain_body.php';

echo "
  </body>
</html>
";

mysqli_close($con);
?>
