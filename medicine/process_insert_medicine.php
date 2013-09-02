<?php
$con=mysqli_connect("localhost","php_app","admin000","patient_management");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$date = "$year-$month-$day";

$sql = "INSERT INTO Medicine (DateTime, Opioids, Dose, Frequency, RouteOfAddmission,
    SideEffects, Comments)

  VALUES ('$date', '{$_POST['opioids']}', '{$_POST['dose']}', '{$_POST['frequency']}',
    '{$_POST['route']}', '{$_POST['sideeffects']}', '{$_POST['comments']}')";

//var_dump($sql);

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

$id = mysqli_insert_id($con);
header('Location:view_medicine.php?MedicineID=' . $id);
die();
mysqli_close($con);
?>
