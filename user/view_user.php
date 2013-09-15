<?php
/* url : /view_user.php?UserID=n */

require '../lib/mysql_connect.php';
require '../lib/main_container_start.php';
require '../lib/login_check_admin.php';

$id = $_GET['UserID'];
$result = mysqli_query($con, "SELECT * FROM Users where UserID=$id");
$row = mysqli_fetch_array($result);
?>

  <div id="content_top">
    <h2>User</h2>
    <div id="delete_edit_container">
      <div id="delete_edit_btns">
        <ul>
          <li><input type='button' name='delete' value='Delete'
          onclick="location='delete_user.php?UserID=<?php echo $id ?>'"></li>
          <li><input type='button' name='edit' value='Edit'
          onclick="location='edit_user.php?UserID=<?php echo $id ?>'"></li>
        </ul>
      </div>
      </div>
      <ul class='info'>

        <li><label>Name</label><?php echo $row['Name'] ?></li>
        <li><label>Phone</label><?php echo $row['Phone'] ?></li>
        <li><label>Email</label><?php echo $row['Email'] ?></li>

      </ul>
    </div>

<?php
require '../lib/main_container_end.php';
mysqli_close($con);
?>
