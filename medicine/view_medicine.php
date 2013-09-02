<html>
  <head>
    <link href="../style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <header><h2>Medicne Information</h2></header>
    <div class="CSSTableGenerator">
        <ul class="info">

<?php
$con=mysqli_connect("localhost", "php_app", "admin000",
  "patient_management");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id = $_GET['MedicineID'];
$result = mysqli_query($con, "SELECT * FROM Medicine WHERE MedicineID = $id");
$row = mysqli_fetch_array($result);

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
