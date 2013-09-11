<?php
/* url : edit_medicine.php?PainID=n&MedicineID=m for editing Medicine m.
 * url : edit_medicine.php?PainID=n&MedicineID= for inserting new Medicine.
 *       MedicineID will be automatically asigned. */

/* TODO : handle error cases (for insert):
 * 1. MedicineID in url is not valid.
 *
 * TODO : handle error cases (for insert or edit):
 * 1. PainID is not valid.
 */

require '../lib/main_container_start.php';
//require '../lib/login_check.php';
require '../lib/mysql_connect.php';
require '../lib/date.php';

$id = $_GET['MedicineID'];

$result = mysqli_query($con, "SELECT * FROM Medicine WHERE MedicineID = $id");
if ($result != false)
  $row = mysqli_fetch_array($result);
else
  $row = array("DateTime" => "", "Opioids" => "", "Dose" => "", "Frequency" => "", "RouteOfAdmission" => "", "SideEffects" => "", "Comments" => "");

echo "
  <div id='content_top'>
    <h2>Medicine Information</h2>
      <form action='process_edit_medicine.php' method='post'>

        <ul class='info'>
          <li><input type='hidden' name='id' value='" . $id . "'>
          <li><input type='hidden' name='painid' value='" . $_GET['PainID'] . "'>
          <li><label>Date</label>";
            output_date_fields(date_parse($row['DateTime']));
            echo "
          </li>

          <li><label>Opioids</label>
              <input type='text' name='opioids' value='" . $row['Opioids'] . "'></li>
          <li><label>Dose</label>
              <input type='text' name='dose' value='" . $row['Dose'] . "'></li>
          <li><label>Frequency</label>
              <input type='text' name='frequency' value='" . $row['Frequency'] . "'></li>
          <li><label>Route Of Admission</label>
              <input type='text' name='route' value='" . $row['RouteOfAdmission'] . "'></li>
          <li><label>Side Effects</label>
              <input type='text' name='sideeffects' value='" . $row['SideEffects'] . "'></li>
          <li><label>Comments</label>
              <input type='text' name='comments' value='" . $row['Comments'] . "'></li>
          <li><input value='Save' type='submit'></li>
        </ul>

      </form>
    </div>
  ";

require '../lib/main_container_end.php';
mysqli_close($con);
?>
