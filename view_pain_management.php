<html>
  <head>
    <link href="style.css" rel="stylesheet" type="text/css">
<?php
$con=mysqli_connect("localhost", "php_app", "admin000", "patient_management");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['PatientID'];
$array = mysqli_query($con, "select Name from Patient where PatientID = $id");
$row = mysqli_fetch_array($array);

echo "
  </head>
  <body>
  <header><h2>Pain Management for " . $row['Name'] . "</h2></header>
    <div class=\"CSSTableGenerator\">
      <table>
        <tr>
          <td class=\"delete\"></td>
          <td class=\"datetime\">Date/Time</td>
          <td class=\"lop\">Location of Pain</td>
          <td class=\"top\">Type of Pain</td>
          <td class=\"intensity\">Intensity</td>
          <td class=\"opioids\">Opioids</td>
        </tr>";

$result = mysqli_query($con, "SELECT * FROM Medicine join Pain where PatientID = $id");
while ($row = mysqli_fetch_array($result)) {
  echo "<tr><td>X</td>";
  echo "<td>" . $row['DateTime'] . "</td>";
  echo "<td>" . $row['LocationOfPain'] . "</td>";
  echo "<td>" . $row['TypeOfPain'] . "</td>";
  echo "<td>" . $row['Intensity'] . "</td>";
  echo "<td>" . $row['Opioids'] . "</td></tr>";
  echo "<td>" . $row[''] . "</td></tr>";
  echo "<td>" . $row['Opioids'] . "</td></tr>";
}
mysqli_close($con);
?>
      </table>
    </div>
  </body>
</html>
