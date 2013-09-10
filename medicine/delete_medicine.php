<?php
/* url : /delete_medicine.php?MedicineID=n */

require '../lib/login_check.php';
require '../lib/mysql_connect.php';

$id = $_GET['MedicineID'];
if (empty($id))
  echo "Error at delete, wrong ID.";

else {
  $row = mysqli_fetch_array(mysqli_query($con, "
    SELECT PainID FROM Medicine WHERE MedicineID = $id"));
  mysqli_query($con, "delete from Medicine where MedicineID = $id");
  header('Location:../pain/view_pain.php?PainID=' .$row['PainID']);
  //header('Location:view_all_medicine.php?PainID=' . $row['PainID']);
}

mysqli_close($con);
die();
?>
