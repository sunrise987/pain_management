<?php
require '../lib/login_check.php';
require '../lib/mysql_connect.php';

$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$date = "$year-$month-$day";
$id = $_POST['id'];

$sql = "
UPDATE PainManagement
SET
  PainID='{$_POST['painid']}',
  DateTime='$date',
  LocationOfPain='{$_POST['lop']}',
  TypeOfPain='{$_POST['top']}',
  Intensity='{$_POST['intensity']}',
  Opioids='{$_POST['opioids']}',
  InfoOtherMed='{$_POST['othermed']}',
  SideEffects='{$_POST['sideeffects']}',
  Comments='{$_POST['comments']}'
WHERE PainManagementID = $id
";

if (empty($id)) {
  $sql = "
    INSERT INTO PainManagement (
      PainID, DateTime, LocationOfPain, TypeOfPain, Intensity,
      Opioids, InfoOtherMed, SideEffects, Comments
    )

    VALUES (
      '{$_POST['painid']}', '$date', '{$_POST['lop']}', '{$_POST['top']}',
      '{$_POST['intensity']}', '{$_POST['opioids']}','{$_POST['othermed']}',
      '{$_POST['sideeffects']}', '{$_POST['comments']}')";
}

if (!mysqli_query($con, $sql)) {
  die('Error: ' . mysqli_error($con));
}

if (empty($id))
  $id = mysqli_insert_id($con);

header('Location:view_pain_management.php?PainManagementID=' . $id);
mysqli_close($con);
die();
?>
