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
$id = $_POST['id'];

$sql = "
UPDATE Medicine
SET
  PainID='{$_POST['painid']}',
  DateTime='$date',
  Opioids='{$_POST['opioids']}',
  Dose='{$_POST['dose']}',
  Frequency='{$_POST['frequency']}',
  RouteOfAddmission='{$_POST['route']}',
  SideEffects='{$_POST['sideeffects']}',
  Comments='{$_POST['comments']}'
WHERE MedicineID = $id
";
var_dump($sql);

if (empty($id)) {
  $sql = "
    INSERT INTO Medicine (
      PainID, DateTime, Opioids, Dose, Frequency, RouteOfAddmission,
      SideEffects, Comments
    )
    VALUES ('{$_POST['painid']}', '$date',
      '{$_POST['opioids']}', '{$_POST['dose']}', '{$_POST['frequency']}',
      '{$_POST['route']}', '{$_POST['sideeffects']}', '{$_POST['comments']}')";
}

var_dump($sql);

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

if (empty($id))
  $id = mysqli_insert_id($con);

header('Location:view_medicine.php?MedicineID=' . $id);
mysqli_close($con);
die();
?>
