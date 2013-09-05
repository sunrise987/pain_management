<?php
/* url : /view_pain.php?PainID=n */
/* TODO: handle invalid PainID error.*/

echo "
<html>
  <head>
    <link href='../style.css' rel='stylesheet' type='text/css'>
  </head>
  <body>
        ";

$con=mysqli_connect("localhost","php_app","admin000","patient_management");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['PainID'];
$result = mysqli_query($con, "SELECT * FROM Pain where PainID=$id");
$row = mysqli_fetch_array($result);

echo "
    <header><div>
      <h2>Pain Information</h2>
      <input type='button' name='delete' value='Delete'
        onclick=\"location='delete_pain.php?PainID=" . $id . "'\">
      <input type='button' name='edit' value='Edit'
        onclick=\"location='edit_pain.php?PatientID=" . $row['PatientID'] .
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
echo "<li><label>Plan</label>" . $row['MedicationPlan'] . "</li>";
echo "  </ul>
      </div>
      <button type=\"button\" onclick=\"location='../view_pain_management.php?PatientID="
      . $row['PatientID'] . "'\">View Pain Management</button>";

include '../pain_management/view_all_pain_managements_body.php';

echo "
  </body>
</html>";

mysqli_close($con);
?>
