<?php
$con=mysqli_connect("localhost","php_app","admin000","patient_management");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$intens = empty($_POST['intensity']) ?  0: $_POST['intensity'];

$radiation = IsChecked("radiation", "1") ? 1: 0;
$sleep = IsChecked("sleep", "1") ? 1: 0;
$mood = IsChecked("mood", "1") ? 1: 0;
$activity = IsChecked("activity", "1") ? 1: 0;
$nutrition = IsChecked("nutrition", "1") ? 1: 0;
$social = IsChecked("social", "1") ? 1: 0;


$id = $_POST['id'];

$sql = "
UPDATE Pain
SET
  PatientID='{$_POST['patientid']}',
  LocationOfPain='{$_POST['lop']}',
  Pattern='{$_POST['pattern']}',
  Intensity='$intens',
  AtThisMoment='{$_POST['atmoment']}',
  CharacterOfPain='{$_POST['character']}',
  CharacterOther='{$_POST['other']}',
  Radiation='$radiation',
  TypeOfPain='{$_POST['tp']}',
  Mixed='{$_POST['mixed']}',
  WhatRelievesPain='{$_POST['relieve']}',
  WhatIncreasesPain='{$_POST['cause']}',
  PainAffectsSleep='$sleep',
  PainAffectsMood='$mood',
  PainAffectsActivity='$activity',
  PainAffectsNutrition='$nutrition',
  PainAffectsSocialInteraction='$social',
  Comments='{$_POST['comments']}'
WHERE PainID = $id
";

if (empty($id)) {
  $sql="
    INSERT INTO Pain (
      PatientID, LocationOfPain, Pattern, Intensity, AtThisMoment,
      CharacterOfPain, CharacterOther,
      Radiation, TypeOfPain, Mixed, WhatRelievesPain, WhatIncreasesPain,
      PainAffectsSleep, PainAffectsMood, PainAffectsActivity,
      PainAffectsNutrition, PainAffectsSocialInteraction, Comments
    )
    VALUES (
      '{$_POST['patientid']}', '{$_POST['lop']}', '{$_POST['pattern']}',
      '$intens', '{$_POST['atmoment']}', '{$_POST['character']}',
      '{$_POST['other']}', $radiation,
      '{$_POST['tp']}', '{$_POST['mixed']}',
      '{$_POST['relieve']}','{$_POST['cause']}', $sleep, $mood, $activity,
      $nutrition, $social, '{$_POST['comments']}'
    )";
}

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

if (empty($id))
  $id = mysqli_insert_id($con);

header('Location:view_pain.php?PainID=' .$id);
die();

mysqli_close($con);

function IsChecked($chkname,$value) {
  if(!empty($_POST[$chkname])) {
    if (strcmp($_POST[$chkname], $value) == 0)
      return true;
  }
  return false;
}
?>
