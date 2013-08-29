<html>
  <head>
    <link href="../style.css" rel="stylesheet" type="text/css">
    <h2>list of patients</h2>
  </head>
  <body>
    <div class="CSSTableGenerator">
      <table>
        <tr>
          <td class="delete"></td>
          <td class="name">Name</td>
          <td class="dob">Date of Birth</td>
          <td class="gender">Gender</td>
          <td class="nation">Nationality</td>
          <td class="doa">Date of Admission</td>
          <td class="med_his">Medical History</td>
          <td class="surg_his">Surgical History</td>
          <td class="diag">Diagnosis</td>
          <td class="view_button"></td>
        </tr>

<?php
$con=mysqli_connect("localhost", "php_app", "admin000",
  "patient_management");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con, "SELECT * FROM Patient");
while ($row = mysqli_fetch_array($result)) {
  echo "<tr>
    <td>X</td>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "<td>" . $row['DateOfBirth'] . "</td>";
  echo "<td>" . $row['Gender'] . "</td>";
  echo "<td>" . $row['Nationality'] . "</td>";
  echo "<td>" . $row['DateOfAddmission'] . "</td>";
  echo "<td>" . $row['PastMedicalHistory'] . "</td>";
  echo "<td>" . $row['PastSurgicalHistory'] . "</td>";
  echo "<td>" . $row['Diagnosis'] . "</td>";
  echo "<td><button type=\"button\">View Pain Management</button></td>
    </tr>";
}
mysqli_close($con);
?>
      </table>
    </div>
  </body>
</html>
