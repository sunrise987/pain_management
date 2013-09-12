<?php
  // TODO:
  // Check with client:
  // If necessary to make relationship from Patient to Pain
  // "one to many".
  // If so, in the "Manage Pain" button : query all pains for this
  // patient and find the latest one and retrive it.
  // by date. To do that you have to add a Date entry in Patient table.
  // Also, don't forget to remove the UNIQUE label at PatientID in Pain.

require '../lib/mysql_connect.php';
require '../lib/main_container_start.php';
?>

<script language="javascript">
function checkDelete(id) {
  var message = "Are you sure you want to delete this Patient? Subsequently all the records of pain, pain management and medicine for this patient will be deleted. ";

  if (confirm(message)) {
    location='../patient/delete_patient.php?PatientID=' + id;
  }
}
</script>

  <div id='content_bottom'>
    <h2>list of patients</h2>
    <div class='CSSTableGenerator'>
      <table>
        <tr>

          <th class='name'>Name</td>
          <th class='dob'>Date of Birth</td>
          <th class='gender'>Gender</td>
          <th class='nation'>Nationality</td>
          <th class='doa'>Date of Admission</td>
          <th class='med_his'>Medical History</td>
          <th class='surg_his'>Surgical History</td>
          <th class='diag'>Diagnosis</td>
          <th class='view_button'>Pain Info</td>
          <th class='view_edit_delete'></td>
        </tr>

<?php
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
    onclick=\"checkDelete('".$id."')\">";

  echo "</td></tr>";
}
mysqli_close($con);
?>
      </table>
    </div>
    <button type='button' onclick="location='edit_patient.php?PatientID='">Add Patient</button>
</div>

<?php require '../lib/main_container_end.php'; ?>
