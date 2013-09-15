<?php
require '../lib/mysql_connect.php';
require '../lib/login_check.php';
require '../lib/login_check_admin.php';

$id = $_POST['id'];

$sql = "
UPDATE Users
SET
  Name='{$_POST['name']}',
  Phone='{$_POST['phone']}'
  Email='{$_POST['email']}'
WHERE UserID = $id
";
var_dump($sql);

if (empty($id)) {
  $sql = "
  INSERT INTO Users(
    Name, Phone, Email
  )
  VALUES (
    '{$_POST['name']}',
    '{$_POST['phone']}',
    '{$_POST['email']}'
  )";
}
var_dump($sql);

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

if (empty($id))
  $id = mysqli_insert_id($con);

header('Location:view_user.php?UserID=' . $id);
mysqli_close($con);
die();
?>
