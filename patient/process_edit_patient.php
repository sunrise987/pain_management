<?php
require '../lib/mysql_connect.php';
require '../lib/login_check.php';

$id = $_POST['id'];
$name = $_POST['fname'] . " " . $_POST['lname'];
$day = $_POST['birth_day'];
$month = $_POST['birth_month'];
$year = $_POST['birth_year'];
$dob = "$year-$month-$day";

$day = $_POST['addm_day'];
$month = $_POST['addm_month'];
$year = $_POST['addm_year'];
$doa = "$year-$month-$day";

$sql = "
UPDATE Patient
SET
  Name='$name',
  DateOfBirth='$dob',
  Gender='{$_POST['gender']}',
  Nationality='{$_POST['nationality']}',
  DateOfAdmission='$doa',
  PastMedicalHistory='{$_POST['pmh']}',
  PastSurgicalHistory='{$_POST['psh']}',
  Diagnosis='{$_POST['diagnosis']}'
WHERE PatientID = $id
";
var_dump($sql);

if (empty($id)) {
  $sql = "
  INSERT INTO Patient (
    Name, DateOfBirth, Gender, Nationality,
    DateOfAdmission, PastMedicalHistory,
    PastSurgicalHistory, Diagnosis
  )
  VALUES (
    '$name', '$dob', '{$_POST['gender']}',
    '{$_POST['nationality']}',
    '$doa','{$_POST['pmh']}', '{$_POST['psh']}',
    '{$_POST['diagnosis']}'
  )";
}
var_dump($sql);

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

if (empty($id))
  $id = mysqli_insert_id($con);

header('Location:view_patient.php?PatientID=' . $id);
mysqli_close($con);
die();
?>
