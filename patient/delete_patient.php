<?php
/* url : /delete_patient.php?PatientID=n */

require '../lib/mysql_connect.php';
require '../lib/login_check.php';

$id = $_GET['PatientID'];

if (empty($id))
  echo "Error at delete, wrong ID.";

else {
  // Delete all pains for this patient.
  $result = mysqli_query($con, "
    SELECT PainID FROM Pain WHERE PatientID = $id");
  while ($row = mysqli_fetch_array($result)) {
    $painid = $row['PainID'];
    mysqli_query($con, "DELETE FROM Pain WHERE PainID = $painid");

    // Delete all medicine and pain_management for this pain.
    mysqli_query($con, "DELETE FROM PainManagement WHERE PainID = $painid");
    mysqli_query($con, "DELETE FROM Medicine WHERE PainID = $painid");
  }

  mysqli_query($con, "DELETE FROM Patient WHERE PatientID = $id");
  header('Location:view_all_patients.php');
}

mysqli_close($con);
die();
?>
