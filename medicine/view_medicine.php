<?php
/* url : /view_medicine.php?MedicineID=n */
/* TODO: handle invalid MedicineID error. */

require '../lib/login_check.php';
require '../lib/mysql_connect.php';

echo "
<html>
  <head>
    <link href='../style.css' rel='stylesheet' type='text/css'>
  </head>";
require '../side_bar/medicine_buttons.php';

$id = $_GET['MedicineID'];
$result = mysqli_query($con, "SELECT * FROM Medicine WHERE MedicineID = $id");
$row = mysqli_fetch_array($result);

echo "
  <body>
    <header><div>
      <h2>Medicne Information</h2>
      <input type='button' name='delete' value='Delete'
        onclick=\"location='delete_medicine.php?MedicineID=" . $id . "'\">
      <input type='button' name='edit' value='Edit'
        onclick=\"location='edit_medicine.php?PainID=" . $row['PainID'] .
        "&MedicineID=" . $id . "'\">
    </div></header>
    <div class='CSSTableGenerator'>
      <ul class='info'>";

  echo "<li><label>Date Time</label>" . $row['DateTime'] . "</li>";
  echo "<li><label>Opioids</label>" . $row['Opioids'] . "</li>";
  echo "<li><label>Dose</label>" . $row['Dose'] . "</li>";
  echo "<li><label>Frequency</label>" . $row['Frequency'] . "</li>";
  echo "<li><label>Route Of Admission</label>" . $row['RouteOfAdmission'] . "</li>";
  echo "<li><label>Side Effects</label>" . $row['SideEffects'] . "</li>";
  echo "<li><label>Comments</label>" . $row['Comments'] . "</li>";

mysqli_close($con);
?>
      </ul>
    </div>
  </body>
</html>
