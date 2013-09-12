<?php
/* url : /view_pain_management.php?PainManagementID=n */
/* TODO: handle invalid PainManagementID error. */

//require '../lib/login_check.php';
require '../lib/mysql_connect.php';
require '../lib/main_container_start.php';

$id = $_GET['PainManagementID'];
$result = mysqli_query($con, "SELECT * FROM PainManagement WHERE PainManagementID = $id");
$row = mysqli_fetch_array($result);

echo "
  <div id='content_top'>
      <h2>Pain Management</h2>
    <div id='delete_edit_container'>
      <div id='delete_edit_btns'>
        <ul>
      <li><input type='button' name='delete' value='Delete'
        onclick=\"location='delete_pain_management.php?PainManagementID=" . $id . "'\"></li>
      <li><input type='button' name='edit' value='Edit'
        onclick=\"location='edit_pain_management.php?PainID=" . $row['PainID'] .
        "&PainManagementID=" . $id . "'\"></li>
        </ul>
        </div>
    </div>
      <ul class='info'>";

  echo "<li><label>Date/Time</label>" . $row['DateTime'] . "</li>";
  echo "<li><label>Location of Pain</label>" . $row['LocationOfPain'] . "</li>";
  echo "<li><label>Type of Pain</label>" . $row['TypeOfPain'] . "</li>";
  echo "<li><label>Intensity</label>" . $row['Intensity'] . "</li>";
  echo "<li><label>Opioids</label>" . $row['Opioids'] . "</li></tr>";
  echo "<li><label>Other Medications</label>" . $row['InfoOtherMed'] . "</li></tr>";
  echo "<li><label>Side Effects</label>" . $row['SideEffects'] . "</li></tr>";
  echo "<li><label>Comments</label>" . $row['Comments'] . "</li></tr>";
  echo "
      </ul>
    </div>
      ";

require '../lib/side_bar/pain_management_buttons.php';
require '../lib/main_container_end.php';
mysqli_close($con);
?>
