<?php
/* url : /delete_patient.php?PatientID=n */

require '../lib/mysql_connect.php';
require '../lib/login_check.php';

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
