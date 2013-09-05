<?php
/* url : /delete_patient.php?PatientID=n */

$con=mysqli_connect("localhost", "php_app", "admin000", "patient_management");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MYSQL: " . mysqli_connect_error();
}

$id = $_GET['PatientID'];

if (empty($id))
  echo "Error at delete, wrong ID.";

else {
  mysqli_query($con, "DELETE FROM Patient WHERE PatientID = $id");
  header('Location:view_all_patients.php');
}

mysqli_close($con);
die();
?>
