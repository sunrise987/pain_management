<?php
$con=mysqli_connect("localhost", "php_app", "admin000", "patient_management");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MYSQL: " . mysqli_connect_error();
}

$id = $_GET['PainManagementID'];
if (empty($id))
  echo "Error at delete, wrong ID.";
else {
  mysqli_query($con, "delete from PainManagement where PainManagementID = $id");
  echo "Record was deleted.";
}

mysqli_close($con);
?>
