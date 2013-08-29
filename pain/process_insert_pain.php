<?php
$con=mysqli_connect("localhost","php_app","admin000","patient_management");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$intens = empty($_POST['intensity']) ?  0: $_POST['intensity'];

$sleep = IsChecked("effects", "sleep") ? "b'1'": "b'0'";
$mood = IsChecked("effects", "mood") ? "b'1'": "b'0'";
$activity = IsChecked("effects", "activity") ? "b'1'": "b'0'";
$nutrition = IsChecked("effects", "nutrition") ? "b'1'": "b'0'";
$social = IsChecked("effects", "social") ? "b'1'": "b'0'";

//var_dump($social);

$sql="INSERT INTO Pain (LocationOfPain, Pattern, Intensity, CharacterOfPain, Radiation,
  TypeOfPain, WhatRelievesPain, WhatIncreasesPain, PainAffectsSleep, PainAffectsMood,
  PainAffectsActivity, PainAffectsNutrition, PainAffectsSocialInteraction, Comments,
  MedicationPlan)

  VALUES ('{$_POST['lop']}', '{$_POST['pattern']}', '$intens', '{$_POST['character']}',
    '{$_POST['radiation']}', '{$_POST['tp']}', '{$_POST['relieve']}','{$_POST['cause']}', $sleep,
    $mood, $activity, $nutrition, $social, '{$_POST['comments']}', '{$_POST['plan']}')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
$id = mysqli_insert_id($con);

header('Location:view_pain.php?PainID=' .$id);
die();

mysqli_close($con);

function IsChecked($chkname,$value) {
  if(!empty($_POST[$chkname])) {
    foreach($_POST[$chkname] as $chkval) {
      if($chkval == $value) return true;
    }
  }
  return false;
}
?>
