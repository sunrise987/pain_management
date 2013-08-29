<html>
  <head>
    <link href="style.css" rel="stylesheet" type="text/css">
    <h2>Pain Management</h2>
  </head>
  <body>
    <div class="CSSTableGenerator">
      <table>
        <tr>
          <td class="delete"></td>
          <td class="datetime">Date/Time</td>
          <td class="opioids">Opioids</td>
          <td class="dose">Dose</td>
          <td class="freq">Frequency</td>
          <td class="route">Route Of Addmission</td>
          <td class="se">Side Effects</td>
          <td class="comment">Comments</td>
        </tr>

<?php
$con=mysqli_connect("localhost", "php_app", "admin000",
  "patient_management");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con, "SELECT * FROM Medicine");
while ($row = mysqli_fetch_array($result)) {
  echo "<tr>
    <td>X</td>";
  echo "<td>" . $row['Opioids'] . "</td>";
  echo "<td>" . $row['Dose'] . "</td>";
  echo "<td>" . $row['Frequency'] . "</td>";
  echo "<td>" . $row['RouteOfAddmission'] . "</td>";
  echo "<td>" . $row['SideEffects'] . "</td>";
  echo "<td>" . $row['Comments'] . "</td>";
}
mysqli_close($con);
?>
      </table>
    </div>
  </body>
</html>
