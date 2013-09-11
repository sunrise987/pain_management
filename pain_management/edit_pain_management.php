<?php
/* url : edit_pain_management.php?PainManagementID=n&PainID=n */

require '../lib/main_container_start.php';
require '../lib/mysql_connect.php';
require '../lib/date.php';
require '../lib/generate_options.php';

$id = $_GET['PainManagementID'];

$array = mysqli_query($con, "select * from PainManagement where PainManagementID = $id");
if ($array != false)
  $row = mysqli_fetch_array($array);
else
  $row = array("DateTime" => "", "LocationOfPain" => "", "TypeOfPain" => "", "Intensity" => "",
    "Opioids" => "", "InfoOtherMed" => "", "SideEffects" => "", "Comments" => "");

$top = array("Somatic", "Visceral", "Neuropathic", "Mixed");
$sideeffects = array("Anxiety", "Confusion", "Constipation", "Epigastric Distress", "Hallucination",
  "Increased sedation", "Motor Weakness", "Nausea", "pruritus", "Urinary Retention", "Vomiting");

echo "
  <div id='content_top'>
    <h2>Pain Management</h2>
    <div id='Container'>
      <form action='process_edit_pain_management.php' method='post'>

        <ul class='info'>
          <li><input type='hidden' name='id' value='" . $id . "'>
          <li><input type='hidden' name='painid' value='" . $_GET['PainID'] . "'>
          <li><label>Date</label>";
            output_date_fields(date_parse($row['DateTime']));
            echo "
          </li>

          <li>
            <label>Location Of Pain</label>
            <input type='text' name='lop' value='" . $row['LocationOfPain'] . "'>
          </li>
          <li><label>Type Of Pain</label><select name='top'>";
            output_options_from_array($top, $row['TypeOfPain']);
            echo "
          </select></li>
          <li><label>Intensity</label>
            <input type='number' name='intensity' value='" . $row['Intensity'] . "'></li>
          <li><label>Opioids</label>
            <input type='text' name='opioids' value='" . $row['Opioids'] . "'</li>
          <li><label>Other Medications</label>
            <input type='text' name='othermed' value='" . $row['InfoOtherMed'] . "'></li>

          <li><label>Side Effects</label><select name='sideeffects'>";
            output_options_from_array($sideeffects, $row['SideEffects']);
            echo "
          </select></li>

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
