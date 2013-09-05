<?php
/* url : /delete_pain.php?PainID=n */

$con=mysqli_connect("localhost", "php_app", "admin000", "patient_management");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MYSQL: " . mysqli_connect_error();
}

$id = $_GET['PainID'];
if (empty($id))
  echo "Error at delete, wrong ID.";
else {
  $row = mysqli_fetch_array(mysqli_query($con, "
    SELECT PatientID FROM Pain WHERE PainID = $id"));
  mysqli_query($con, "delete from Pain where PainID = $id");
  header('Location:view_all_pain.php?PatientID=' . $row['PatientID']);
}

mysqli_close($con);
die();
?>
