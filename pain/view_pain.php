<?php
/* url : /view_pain.php?PainID=n */
/* TODO: handle invalid PainID error.*/

require '../lib/mysql_connect.php';
require '../lib/login_check.php';

echo "
<html>
  <head>
    <link href='../style.css' rel='stylesheet' type='text/css'>
  </head>";
require '../side_bar/pain_buttons.php';

$id = $_GET['PainID'];
$row = mysqli_fetch_array(mysqli_query($con, "
  SELECT * FROM Pain WHERE PainID=$id"));
$patientid = $row['PatientID'];
$row_patient = mysqli_fetch_array(mysqli_query($con, "
  SELECT Name FROM Patient WHERE PatientID=$patientid"));

echo "
  <body>
    <header><div>
      <h2>Pain Information for " . $row_patient['Name'] . "</h2>
      <input type='button' name='delete' value='Delete'
        onclick=\"location='delete_pain.php?PainID=" . $id . "'\">
      <input type='button' name='edit' value='Edit'
        onclick=\"location='edit_pain.php?PatientID=" . $patientid .
        "&PainID=" . $id . "'\">
    </div></header>
    <div id='Container'>
        <ul class='info'>
        ";

echo "<li><label>Location Of Pain</label>" . $row['LocationOfPain'] . "</li>";
echo "<li><label>Pattern</label>" . $row['Pattern'] . "</li>";
echo "<li><label>Intensity</label>" . $row['Intensity'] . "</li>";
echo "<li><label>Character</label>" . $row['CharacterOfPain'] . "</li>";
echo "<li><label>Radiation</label>" . $row['Radiation'] . "</li>";
echo "<li><label>Type Of Pain</label>" . $row['TypeOfPain'] . "</li>";
echo "<li><label>What relieves the pain?</label>" . $row['WhatRelievesPain'] . "</li>";
echo "<li><label>What causes pain increas?</label>" . $row['WhatIncreasesPain'] . "</li>";
echo "<li><label>Indicate if pain affects</label>" . $row['PainAffectsSleep'] . "</li>";
echo "<li><label>Further comments about the pain</label>" . $row['Comments'] . "</li>";
echo "<li><label>Plan </label>";
include '../medicine/view_all_medicine_body.php';
echo "<input type='button' name='add_medicine' value='Add Medicine'
  onclick=\"location='../medicine/edit_medicine.php?PainID="
  . $id . "&MedicineID='\">";
echo "</li></ul></div>";

include '../pain_management/view_all_pain_managements_body.php';
echo "<input type='button' value='Add Pain Management Entry'
      onclick=\"location='../pain_management/edit_pain_management.php?PainID=". $id
      ."&PainManagementID='\">";
echo "
  </body>
</html>";

mysqli_close($con);
?>
