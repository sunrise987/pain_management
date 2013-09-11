<?php
/* url : /edit_patient.php?PatientID=n */
/* TODO:
 *  1. enforce name format. No spaces. One name, one last name.
 *  2. DateOfAdmission can't be in future.
 *  */

require '../lib/main_container_start.php';
require '../lib/mysql_connect.php';
require '../lib/country_list.php';
require '../lib/generate_options.php';
require '../lib/date.php';

$id = $_GET['PatientID'];

$result = mysqli_query($con, "SELECT * FROM Patient WHERE PatientID = $id");
if ($result != false)
  $row = mysqli_fetch_array($result);

else {
  $row = array("Name"=> "", "DateOfBirth"=> "", "Gender"=> "", "Nationality"=> "",
    "DateOfAdmission"=> "", "PastMedicalHistory"=> "", "PastSurgicalHistory"=> "",
    "Diagnosis"=> "");
}

if (strcmp($row['Name'], "") == 0) {
  $fname = "";
  $lname = "";

} else {
  $name_array = explode(" ", $row['Name']);
  if (sizeof($name_array) >= 2) {
    $fname = $name_array[0];
    $lname = $name_array[1];

  } else
    $fname = $row['Name'];
    $lname = "";
}
?>

    <div id='content_top'>
      <h2>Patient </h2>
      <form action='process_edit_patient.php' method='post'>

        <ul class='info'>
          <li><input type='hidden' name='id' value='<?php echo $id ?>'>
          <li>
              <label>First Name</label>
              <input type='text' name='fname' value='<?php echo $fname ?>'>
              <label>Last Name</label>
              <input type='text' name='lname' value='<?php echo $lname ?>'>
          </li>

          <li><label>Date Of Birth</label>
            <?php
            output_date_fields_with_name(
              date_parse($row['DateOfBirth']),
              'birth_year', 'birth_month', 'birth_day');
            ?>
          </li>

          <li><label>Gender</label>
              <input type='radio' name='gender' value='male'<?php
                if (strcmp($row['Gender'], "male") == 0)
                  echo " checked";
                ?>>Male
              <input type='radio' name='gender' value='female'<?php
  if (strcmp($row['Gender'], "female") == 0) {echo " checked";}?>>Female
          </li>
          <li><label>Nationality</label>
              <select name='nationality'>


  <?php output_options_from_array($country_list, $row['Nationality']); ?>
              </select>
          </li>

          <li><label>Date Of Admission</label>
            <?php
            output_date_fields_with_name(
              date_parse($row['DateOfAdmission']),
              'addm_year', 'addm_month', 'addm_day');
            ?>
          </li>
          <li><label>Medical History</label>
          <input type='text' value='<?php echo $row['PastMedicalHistory'] ?>' name='pmh'>
          </li>
          <li><label>Surgical History</label>
              <input type='text' value='<?php echo $row['PastSurgicalHistory'] ?>' name='psh'>
          </li>
          <li><label>Diagnosis</label>
              <input type='text' name='diagnosis' value='<?php echo $row['Diagnosis'] ?>'>
          </li>
          <li><input type='submit'></li>
        </ul>

      </form>
    </div>

<?php
require '../lib/main_container_end.php';
mysqli_close($con);
?>
