<?php
session_start();
require 'mysql_connect.php';

if (isset($_SESSION['user_email'])) {
  $email = $_SESSION['user_email'];
  $sql = "SELECT * FROM Users WHERE Email = \"$email\"";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  $duration = (time() - $_SESSION['time']) / (60*60);
  echo $duration;

  if (strcmp($email, $row['Email']) != 0 || $duration >= 6) {
    //User is invalid, redirect to login page.
    header('Location:../lightopenid-lightopenid/my_openid_google_login.php');
    echo 'Your email '  .   $email  . '. is not registered in this system.';
    echo 'Please log in with a valid email.';
    session_destroy();
    die();
  }

} else {
    header('Location:../lightopenid-lightopenid/my_openid_google_login.php');
    echo 'Please log in first.';
    die();
}
?>
