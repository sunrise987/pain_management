<?php

  // TODO:
  // Check with client:
  // If necessary to make relationship from Patient to Pain
  // "one to many".
  // If so, in the "Manage Pain" button : query all pains for this
  // patient and find the latest one and retrive it.
  // by date. To do that you have to add a Date entry in Patient table.
  // Also, don't forget to remove the UNIQUE label at PatientID in Pain.

echo "
<html>
  <head>
    <link href='../style.css' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <header><h2>list of patients</h2></header>
    <div class='CSSTableGenerator'>
      <table>
        <tr>

          <td class='name'>Name</td>
          <td class='dob'>Date of Birth</td>
          <td class='gender'>Gender</td>
          <td class='nation'>Nationality</td>
          <td class='doa'>Date of Admission</td>
          <td class='med_his'>Medical History</td>
          <td class='surg_his'>Surgical History</td>
          <td class='diag'>Diagnosis</td>
          <td class='view_button'>Pain Info</td>
          <td class='view_edit_delete'></td>
        </tr>";

$con=mysqli_connect("localhost", "php_app", "admin000", "patient_management");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con, "SELECT * FROM Patient");
while ($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "<td>" . $row['DateOfBirth'] . "</td>";
  echo "<td>" . $row['Gender'] . "</td>";
  echo "<td>" . $row['Nationality'] . "</td>";
  echo "<td>" . $row['DateOfAdmission'] . "</td>";
  echo "<td>" . $row['PastMedicalHistory'] . "</td>";
  echo "<td>" . $row['PastSurgicalHistory'] . "</td>";
  echo "<td>" . $row['Diagnosis'] . "</td>";

  $id = $row['PatientID'];
  $pain_row = mysqli_fetch_array(mysqli_query($con, "
    SELECT PainID FROM Pain WHERE PatientID = $id"));

  echo "<td><input type='button' value='Manage'
    onclick=\"location='../pain/view_pain.php?PainID="
    . $pain_row['PainID'] . "'\"></td>";

  echo "<td><input type='button' value='View'
    onclick=\"location='../patient/view_patient.php?PatientID="
    . $id . "'\">";
  echo "<input type='button' value='Edit'
    onclick=\"location='../patient/edit_patient.php?PatientID="
    . $id . "'\">";
  echo "<input type='button' value='Delete'
    onclick=\"location='../patient/delete_patient.php?PatientID="
    . $id . "'\"></td>";
  echo "</tr>";
}

mysqli_close($con);
?>
      </table>
    </div>
    <button type='button' onclick="location='edit_patient.php?PatientID='">Add Patient</button>
  </body>
</html>
