<?php
/**/

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

include 'view_all_pain_managements_body.php';

echo "
  </body>
</html>
";

mysqli_close($con);
?>
