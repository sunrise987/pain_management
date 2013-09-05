<?php
/* url : /view_all_medicine.php?PainID=n */

echo "
<html>
  <head>
    <link href='../style.css' rel='stylesheet' type='text/css'>
  </head>
    <div>
";

$con=mysqli_connect("localhost", "php_app", "admin000", "patient_management");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

include 'view_all_medicine_body.php';

mysqli_close($con);
echo "
    </div>
  </body>
</html>
";
?>
