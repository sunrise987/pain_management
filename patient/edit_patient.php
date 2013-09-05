<?php
/* url : /edit_patient.php?PatientID=n */
/* TODO:
 *  1. enforce name format. No spaces. One name, one last name.
 *  2. DateOfAdmission can't be in future.
 *  */

require '../lib/country_list.php';
require '../lib/generate_options.php';
require '../lib/date.php';

$con=mysqli_connect("localhost", "php_app", "admin000", "patient_management");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
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

echo "
<html>
  <head>
    <link href='../style.css' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <header><h2>Patient Information</h2><div></div></header>
    <div id='Container'>
      <form action='process_edit_patient.php' method='post'>

        <ul class='info'>
          <li><input type='hidden' name='id' value='" . $id . "'>
          <li>
              <label>First Name</label>
              <input type='text' name='fname' value='". $fname ."'>
              <label>Last Name</label>
              <input type='text' name='lname' value='". $lname ."'>
          </li>

          <li><label>Date Of Birth</label>";
            output_date_fields_with_name(
              date_parse($row['DateOfBirth']),
              'birth_year', 'birth_month', 'birth_day');

            echo "
          </li>
          <li><label>Gender</label>
              <input type='radio' name='gender' value='male'";
                if (strcmp($row['Gender'], "male") == 0)
                  echo " checked";
                echo "
              >Male
              <input type='radio' name='gender' value='female'";
                if (strcmp($row['Gender'], "female") == 0)
                  echo " checked";
                echo "
              >Female
          </li>
          <li><label>Nationality</label>
              <select name='nationality'>";
                  output_options_from_array($country_list, $row['Nationality']);
                  echo "
              </select>
          </li>

          <li><label>Date Of Admission</label>";
            output_date_fields_with_name(
              date_parse($row['DateOfAdmission']),
              'addm_year', 'addm_month', 'addm_day');

            echo "
          </li>
          <li><label>Medical History</label>
              <input type='text' value='". $row['PastMedicalHistory']."' name='pmh'>
          </li>
          <li><label>Surgical History</label>
              <input type='text' value='". $row['PastSurgicalHistory']."' name='psh'>
          </li>
          <li><label>Diagnosis</label>
              <input type='text' name='diagnosis' value='". $row['Diagnosis']."'>
          </li>
          <li><input type='submit'></li>
        </ul>

      </form>
    </div>
  </body>
  </html>";
?>
