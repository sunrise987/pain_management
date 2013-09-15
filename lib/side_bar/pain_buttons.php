<?php
$id = $_GET['PainID'];
$row = mysqli_fetch_array(mysqli_query($con, "SELECT PatientID FROM Pain where PainID=$id"));
?>

<div id='aside'>
  <li>
  <h4>LINKS</h4>
  <ul>
    <li>
      <a href='../patient/view_all_patients.php'>All Patients</a>
    </li>
    <li>
     <a href='../patient/view_patient.php?PatientID=<?php
      echo $row['PatientID'] ?>'>Back to patient</a>
    </li>
  </ul>
</div>
