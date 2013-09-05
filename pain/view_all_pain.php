<?php
/* url : /view_all_pain.php?PatientID=n */

echo "
<html>
  <head>
    <link href='../style.css' rel='stylesheet' type='text/css'>
  </head>
    <div>
";

$con=mysqli_connect("localhost", "php_app", "admin000", "patient_management");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$patientid = $_GET['PatientID'];
$row = mysqli_fetch_array(mysqli_query($con, "
  SELECT Name FROM Patient WHERE PatientID = $patientid"));
echo "
  </head>
  <body>
  <header><h2>Pain Information for " . $row['Name'] . "</h2></header>
    <div class='CSSTableGenerator'>
      <table>
        <tr>
          <td class='delete'></td>
          <td class='lop'>Location of Pain</td>
          <td class='pattern'>Pattern</td>
          <td class='intensity'>Intensity</td>
          <td class='character'>Character Of Pain</td>
          <td class='radiation'>Radiation</td>
          <td class='top'>Type of Pain</td>
          <td class='relives'>What relieves pain</td>
          <td class='increase'>What increases pain</td>
          <td class='comments'>Comments</td>
          <td class='plan'>Plan</td>
          ";

$result = mysqli_query($con, "
  SELECT * FROM Pain WHERE PatientID= $patientid");
while ($row = mysqli_fetch_array($result)) {
  echo "<tr><td>X</td>";
  echo "<td>" . $row['LocationOfPain'] . "</td>";
  echo "<td>" . $row['Pattern'] . "</td>";
  echo "<td>" . $row['Intensity'] . "</td>";
  echo "<td>" . $row['CharacterOfPain'] . "</td>";
  echo "<td>" . $row['Radiation'] . "</td>";
  echo "<td>" . $row['TypeOfPain'] . "</td>";
  echo "<td>" . $row['WhatRelievesPain'] . "</td>";
  echo "<td>" . $row['WhatIncreasesPain'] . "</td>";
  echo "<td>" . $row['Comments'] . "</td>";
  echo "<td>" . $row['MedicationPlan'] . "</td>";
}
mysqli_close($con);
echo "
    </div>
  </body>
</html>
";
?>
