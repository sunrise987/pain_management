<?php
/* url : /delete_user.php?UserID=n */

require '../lib/mysql_connect.php';
require '../lib/login_check.php';
require '../lib/login_check_admin.php';

$id = $_GET['UserID'];

if (empty($id))
  echo "Error at delete, wrong ID.";

else {
  mysqli_query($con, "DELETE FROM Users WHERE UserID = $id");
  header('Location:view_all_users.php');
}

mysqli_close($con);
die();
?>
