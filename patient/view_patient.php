<?php
/* url : /view_patient.php?PatientID=n */
/* TODO: */

//require '../lib/login_check.php';
require '../lib/mysql_connect.php';
require '../lib/main_container_start.php';
?>

<?php
$id = $_GET['PatientID'];
$result = mysqli_query($con, "SELECT * FROM Patient where PatientID=$id");
$row = mysqli_fetch_array($result);
?>

  <div id="content_top">
    <h2>Patient</h2>
    <div id="delete_edit_container">
      <div id="delete_edit_btns">
        <ul>
          <li><input type='button' name='delete' value='Delete'
          onclick="location='delete_patient.php?PatientID=<?php echo $id ?>'"></li>
          <li><input type='button' name='edit' value='Edit'
          onclick="location='edit_patient.php?PatientID=<?php echo $id ?>'"></li>
        </ul>
      </div>
      </div>
      <ul class='info'>

        <li><label>Name</label><?php echo $row['Name'] ?></li>
        <li><label>Date Of Birth</label><?php echo  $row['DateOfBirth'] ?></li>
        <li><label>Gender</label><?php echo $row['Gender'] ?></li>
        <li><label>Nationality</label><?php echo $row['Nationality'] ?></li>
        <li><label>Date Of Admission</label><?php echo $row['DateOfAdmission'] ?></li>
        <li><label>Medical History</label><?php echo $row['PastMedicalHistory'] ?></li>
        <li><label>Surgical History</label><?php echo $row['PastSurgicalHistory'] ?></li>
        <li><label>Diagnosis</label><?php echo $row['Diagnosis'] ?></li>

      </ul>
      <input type='button' value='Add Pain Information'
      onclick="location='../pain/edit_pain.php?PatientID=<?php echo $id?>&PainID='">

      <?php include "../pain/view_all_pain_body.php"; ?>
    </div>

<?php require '../lib/main_container_end.php'; ?>
<?php mysqli_close($con); ?>
