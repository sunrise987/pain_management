<?php
require '../lib/login_check.php';
require '../lib/mysql_connect.php';

$id = $_GET['PainManagementID'];
if (empty($id))
  echo "Error at delete, wrong ID.";
else {
  mysqli_query($con, "delete from PainManagement where PainManagementID = $id");
  echo "Record was deleted.";
}

mysqli_close($con);
?>
