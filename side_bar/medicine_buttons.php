<?php

$id = $_GET['MedicineID'];
$row = mysqli_fetch_array(mysqli_query($con, "
  SELECT Medicine.PainID, Pain.PatientID
  FROM Medicine
  JOIN Pain ON Medicine.PainID
  WHERE MedicineID=$id"));

echo "
<div id='side_bar'>
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
