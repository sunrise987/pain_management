<?php
require '../lib/globals.php';
$con=mysqli_connect($hostname, "php_app", "admin000", "patient_management");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
