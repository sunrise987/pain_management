<?php
/* url : /view_patient.php?PatientID=n */
/* TODO: */
require '../lib/login_check.php';
require '../lib/mysql_connect.php';
require '../side_bar/patient_buttons.php';

echo "
<html>
  <head>
    <link href='../style.css' rel='stylesheet' type='text/css'>
  </head>";

$id = $_GET['PatientID'];
$result = mysqli_query($con, "SELECT * FROM Patient where PatientID=$id");
$row = mysqli_fetch_array($result);

echo "
  <body>
    <header><div>
      <h2>Patient Information</h2>
      <input type='button' name='delete' value='Delete'
        onclick=\"location='delete_patient.php?PatientID=" . $id . "'\">
      <input type='button' name='edit' value='Edit'
        onclick=\"location='edit_patient.php?PatientID=" . $id . "'\">
    </div></header>
    <div id='Container'>
        <ul class='info'>";

echo "<li><label>Name</label>" . $row['Name'] . "</li>";
echo "<li><label>Date Of Birth</label>" . $row['DateOfBirth'] . "</li>";
echo "<li><label>Gender</label>" . $row['Gender'] . "</li>";
echo "<li><label>Nationality</label>" . $row['Nationality'] . "</li>";
echo "<li><label>Date Of Admission</label>" . $row['DateOfAdmission'] . "</li>";
echo "<li><label>Medical History</label>" . $row['PastMedicalHistory'] . "</li>";
echo "<li><label>Surgical History</label>" . $row['PastSurgicalHistory'] . "</li>";
echo "<li><label>Diagnosis</label>" . $row['Diagnosis'] . "</li>";
echo "
      </ul>
    </div>
    <button type='button' onclick=\"location='view_all_patients.php'\">
      View All Patients</button>
    <button type='button' onclick=\"location='../pain/edit_pain.php?PatientID=".$id."&PainID='\">
      Add Pain Information</button>";

    $url = "../pain/view_all_pain_body.php";
    include "$url";
    echo "
  </body>
</html>";

mysqli_close($con);
?>
