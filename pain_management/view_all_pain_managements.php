<html>
  <head>
    <link href="../style.css" rel="stylesheet" type="text/css">
<?php
$con=mysqli_connect("localhost", "php_app", "admin000", "patient_management");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$painid = $_GET['PainID'];
$array = mysqli_query($con, "select Name from Patient join Pain where PainID = $painid");
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
          <td class=\"infoothermed\">Other Medications</td>
          <td class=\"sideeffects\">Side Effects</td>
          <td class=\"comments\">Comments</td>
        </tr>";

$result = mysqli_query($con, "SELECT * FROM PainManagement where PainID = $painid");
while ($row = mysqli_fetch_array($result)) {
  echo "<tr><td>X</td>";
  echo "<td>" . $row['DateTime'] . "</td>";
  echo "<td>" . $row['LocationOfPain'] . "</td>";
  echo "<td>" . $row['TypeOfPain'] . "</td>";
  echo "<td>" . $row['Intensity'] . "</td>";
  echo "<td>" . $row['Opioids'] . "</td>";
  echo "<td>" . $row['InfoOtherMed'] . "</td>";
  echo "<td>" . $row['SideEffects'] . "</td>";
  echo "<td>" . $row['Comments'] . "</td></tr>";
}
mysqli_close($con);
?>
      </table>
    </div>
  </body>
</html>
