<?php
$con=mysqli_connect("localhost","php_app","admin000","patient_management");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$name = $_POST['fname'] . " " . $_POST['lname'];
var_dump($name);

$day = $_POST['birth_day'];
$month = $_POST['birth_month'];
$year = $_POST['birth_year'];
$dob = "$year-$month-$day";

$day = $_POST['addm_day'];
$month = $_POST['addm_month'];
$year = $_POST['addm_year'];
$doa = "$year-$month-$day";

$sql = "INSERT INTO Patient (Name, DateOfBirth, Gender, Nationality,
  DateOfAddmission, PastMedicalHistory, PastSurgicalHistory, Diagnosis)

  VALUES ('$name', '$dob','$_POST[gender]','$_POST[nationality]',
    '$doa','$_POST[pmh]','$_POST[psh]', '$_POST[diagnosis]')";
var_dump($sql);

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

$id = mysqli_insert_id($con);
header('Location:view_patient.php?PatientID=' . $id);
die();
mysqli_close($con);
?>
