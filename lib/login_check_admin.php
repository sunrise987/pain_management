<?php
require 'mysql_connect.php';

$admin = false;
$email = $_SESSION['user_email'];

if (isset($email)) {
  $array = mysqli_query($con, "SELECT * FROM AdminUsers WHERE Email = \"$email\"");
  $row = mysqli_fetch_array($array);
  if (strcmp($email, $row['Email']) == 0) {
    //User is admin
    //echo 'You are an admin user. You can proceed to edit users.';
    $admin = true;
  }
}
if (!$admin) {
  header('Location:../user/view_all_users.php');
  die();
}
?>
