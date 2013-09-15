<?php
/* url : /delete_pain.php?PainID=n */

require '../lib/mysql_connect.php';
require '../lib/login_check.php';

$id = $_GET['PainID'];

if (empty($id))
  echo "Error at delete, wrong ID.";

else {
  // Go back to patient.
  $row = mysqli_fetch_array(mysqli_query($con, "
    SELECT PatientID FROM Pain WHERE PainID = $id"));

  // Delete medicine and pain_management for this pain.
  mysqli_query($con, "DELETE FROM PainManagement WHERE PainID = $id");
  mysqli_query($con, "DELETE FROM Medicine WHERE PainID = $id");
  // Delete pain entry.
  mysqli_query($con, "DELETE FROM Pain WHERE PainID = $id");

  header('Location:../patient/view_patient.php?PatientID=' . $row['PatientID']);
}

mysqli_close($con);
die();
?>
