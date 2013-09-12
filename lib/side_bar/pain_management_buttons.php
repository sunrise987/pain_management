<?php

$id = $_GET['PainManagementID'];
$row = mysqli_fetch_array(mysqli_query($con, "
  SELECT PainManagement.PainID, Pain.PatientID
  FROM PainManagement
  JOIN Pain ON PainManagement.PainID
  WHERE PainManagementID=$id"));

echo "
<div id='aside'>
  <h3> Navitation bar<h3>
  <table>
    <tr>
      <input type='button' name='all_patients' value='All Patients'
        onclick=\"location='../patient/view_all_patients.php'\">
    </tr>

    <tr>
      <input type='button' name='patient_info' value='Patient Information'
        onclick=\"location='../patient/view_patient.php?PatientID=". $row['PatientID'] ."'\">
    </tr>

    <tr>
      <input type='button' name='pain_info' value='Pain Information'
        onclick=\"location='../pain/view_pain.php?PainID=". $row['PainID'] ."'\">
    </tr>
  </table>
</div>";
?>
