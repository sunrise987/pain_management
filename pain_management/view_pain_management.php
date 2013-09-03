<html>
  <head>
    <link href="../style.css" rel="stylesheet" type="text/css">
<?php
$con=mysqli_connect("localhost", "php_app", "admin000", "patient_management");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['PainManagementID'];
$result = mysqli_query($con, "SELECT * FROM PainManagement where PainManagementID = $id");
$row = mysqli_fetch_array($result);

echo "
  </head>
  <body>
  <header>
    <div>
      <h2>Pain Management</h2>
      <input type=\"button\" name=\"delete\" value=\"Delete\"
        onclick=\"location='delete_pain_management.php?PainManagementID=" . $id . "'\">
      <input type=\"button\" name=\"edit\" value=\"Edit\"
        onclick=\"location='edit_pain_management.php?PainID=" . $row['PainID'] . "&PainManagementID=" . $id . "'\">
    </div>
  </header>
    <div class=\"CSSTableGenerator\">";

  echo "<li><label>Date/Time</label>" . $row['DateTime'] . "</li>";
  echo "<li><label>Location of Pain</label>" . $row['LocationOfPain'] . "</li>";
  echo "<li><label>Type of Pain</label>" . $row['TypeOfPain'] . "</li>";
  echo "<li><label>Intensity</label>" . $row['Intensity'] . "</li>";
  echo "<li><label>Opioids</label>" . $row['Opioids'] . "</li></tr>";
  echo "<li><label>Other Medications</label>" . $row['InfoOtherMed'] . "</li></tr>";
  echo "<li><label>Side Effects</label>" . $row['SideEffects'] . "</li></tr>";
  echo "<li><label>Comments</label>" . $row['Comments'] . "</li></tr>";
mysqli_close($con);
?>
    </div>
  </body>
</html>
