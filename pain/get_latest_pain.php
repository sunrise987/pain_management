<?php
/* url : /get_latest_pain.php?PatientID=n */

/*
 This code is not going to be used as long as the relationship
 between Pain and Patient is one-to-one.

 Also, so far, the Pain table does not contain DateTime field.
*/

require '../lib/login_check.php';
require '../lib/mysql_connect.php';

$patientid = $_GET['PatientID'];
$latest_pain_date = '1900-01-01';
$latest_pain_id;
$result = mysqli_query($con, "
  SELECT PainID, DateTime FROM Pain WHERE PatientID = $patientid");
var_dump($result);

while ($row = mysqli_fetch_array($result)) {
  if ($latest_pain_date <= $row['DateTime']) {
    $latest_pain_date = $row['DateTime'];
    $latest_pain_id = $row['PainID'];
  }
}
echo "<html><body><a>";
echo $latest_pain_id;
echo "</a></html></body>";


mysqli_close($con);
?>
