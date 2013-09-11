<?php
/* url : /view_pain.php?PainID=n */
/* TODO: handle invalid PainID error.*/

require '../lib/mysql_connect.php';
//require '../lib/login_check.php';
require '../lib/main_container_start.php';

$id = $_GET['PainID'];
$row = mysqli_fetch_array(mysqli_query($con, "
  SELECT * FROM Pain WHERE PainID=$id"));
$patientid = $row['PatientID'];
$row_patient = mysqli_fetch_array(mysqli_query($con, "
  SELECT Name FROM Patient WHERE PatientID=$patientid"));
?>

  <div id="content_top">
    <h2>Pain Information for<?php echo $row_patient['Name'] ?></h2>
    <div id="delete_edit_container">
      <div id="delete_edit_btns">
        <ul>
          <li><input type='button' name='delete' value='Delete'
            onclick="location='delete_pain.php?PainID=<?php echo $id ?>'"></li>
          <li><input type='button' name='edit' value='Edit'
            onclick="location='<?php echo 'edit_pain.php?PatientID='.
            $patientid . '&PainID=' . $id; ?>'"></li>
        </ul>
      </div>
    </div>
    <ul class='info'>

<li><label>Location Of Pain</label><?php echo $row['LocationOfPain'] ?></li>
<li><label>Pattern</label><?php echo  $row['Pattern'] ?></li>
<li><label>Intensity</label><?php echo  $row['Intensity'] ?></li>
<li><label>Character</label><?php echo  $row['CharacterOfPain'] ?></li>
<li><label>Radiation</label><?php echo  $row['Radiation'] ?></li>
<li><label>Type Of Pain</label><?php echo  $row['TypeOfPain'] ?></li>
<li><label>What relieves the pain?</label><?php echo  $row['WhatRelievesPain'] ?></li>
<li><label>What causes pain increas?</label><?php echo $row['WhatIncreasesPain'] ?></li>
<li><label>Indicate if pain affects</label><?php echo  $row['PainAffectsSleep'] ?></li>
<li><label>Further comments about the pain</label><?php echo $row['Comments'] ?></li>
<li><label>Plan </label>

<?php include '../medicine/view_all_medicine_body.php'; ?>
<input type='button' name='add_medicine' value='Add Medicine'
  onclick="location='../medicine/edit_medicine.php?PainID=<?php echo $id ?>&MedicineID='">
</li></ul>

<?php include '../pain_management/view_all_pain_managements_body.php'; ?>

<input type='button' value='Add Pain Management Entry'
  onclick="location='../pain_management/edit_pain_management.php?PainID=<?php echo $id
?>&PainManagementID='">
</div>

<?php
require '../lib/main_container_end.php';
mysqli_close($con);
?>

