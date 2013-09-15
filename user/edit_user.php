<?php
/* url : /edit_user.php?UserID=n */

require '../lib/main_container_start.php';
require '../lib/mysql_connect.php';
require '../lib/login_check_admin.php';

$id = $_GET['UserID'];

$result = mysqli_query($con, "SELECT * FROM Users WHERE UserID = $id");
if ($result != false)
  $row = mysqli_fetch_array($result);

else {
  $row = array("Name"=> "", "Phone"=> "", "Email"=> "");
}
?>
    <div id='content_top'>
      <h2>User </h2>
      <form action='process_edit_user.php' method='post'>

        <ul class='info'>
          <li><input type='hidden' name='id' value='<?php echo $id ?>'>
          <li>
              <label>Name</label>
              <input type='text' name='name' value='<?php echo $row['Name'] ?>'>
          </li>
          <li>
              <label>Phone Number</label>
              <input type='text' name='phone' value='<?php echo $row['Phone'] ?>'>
          </li>
          <li>
              <label>Email</label>
              <input type='text' name='email' value='<?php echo $row['Email'] ?>'>
          </li>

          <li><input type='submit'></li>
        </ul>

      </form>
    </div>

<?php
require '../lib/main_container_end.php';
mysqli_close($con);
?>
