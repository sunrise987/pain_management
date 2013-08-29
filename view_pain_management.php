<html>
  <head>
    <link href="style.css" rel="stylesheet" type="text/css">
    <h2>Pain Management for ...</h2>
  </head>
  <body>
    <div class="CSSTableGenerator">
      <table>
        <tr>
          <td class="delete"></td>
          <td class="datetime">Date/Time</td>
          <td class="lop">Location of Pain</td>
          <td class="top">Type of Pain</td>
          <td class="intensity">Intensity</td>
          <td class="opioids">Opioids</td>
        </tr>

<?php
$con=mysqli_connect("localhost", "php_app", "admin000",
  "patient_management");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con, "SELECT LocationOfPain, Opioids FROM Medicine join Pain");
while ($row = mysqli_fetch_array($result)) {
  echo "<tr><td>X</td>";
  echo "<td>" . $row['LocationOfPain'] . "</td>";
  echo "<td>" . $row['Opioids'] . "</td></tr>";
}
mysqli_close($con);
?>
      </table>
    </div>
  </body>
</html>
