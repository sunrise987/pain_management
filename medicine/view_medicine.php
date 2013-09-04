<?php
/* url : /view_medicine.php?MedicineID=n */
/* TODO: handle invalid MedicineID error.
 */
echo "
<html>
  <head>
    <link href='../style.css' rel='stylesheet' type='text/css'>
    ";

$con=mysqli_connect("localhost", "php_app", "admin000",
  "patient_management");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['MedicineID'];
$result = mysqli_query($con, "SELECT * FROM Medicine WHERE MedicineID = $id");
$row = mysqli_fetch_array($result);

echo "
  </head>
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
  echo "<li><label>Route Of Addmission</label>" . $row['RouteOfAddmission'] . "</li>";
  echo "<li><label>Side Effects</label>" . $row['SideEffects'] . "</li>";
  echo "<li><label>Comments</label>" . $row['Comments'] . "</li>";

mysqli_close($con);
?>
      </ul>
    </div>
  </body>
</html>
