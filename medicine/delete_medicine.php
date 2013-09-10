<?php
/* url : /delete_medicine.php?MedicineID=n */

$con=mysqli_connect("localhost", "php_app", "admin000", "patient_management");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MYSQL: " . mysqli_connect_error();
}

$id = $_GET['MedicineID'];
if (empty($id))
  echo "Error at delete, wrong ID.";

else {
  $row = mysqli_fetch_array(mysqli_query($con, "
    SELECT PainID FROM Medicine WHERE MedicineID = $id"));
  mysqli_query($con, "delete from Medicine where MedicineID = $id");
  header('Location:view_all_medicine.php?PainID=' . $row['PainID']);
}

mysqli_close($con);
die();
?>
