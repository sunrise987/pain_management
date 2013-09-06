<?php

$id = $_GET['PainID'];
$row = mysqli_fetch_array(mysqli_query($con, "SELECT PatientID FROM Pain where PainID=$id"));

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

  </table>
</div>";
?>
