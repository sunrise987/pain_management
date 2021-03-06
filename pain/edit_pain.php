<?php
/* url : edit_pain.php?PatientID=n&PainID=m */

/* TODO:
 * - Handle invalid input errors.
 * - Allow user to save, edit or retrieve multiple values of 'CharacterOfPain'.
 *   (Not sure this is necessary. Ask for feedback from client.)
 */
require '../lib/main_container_start.php';
require '../lib/mysql_connect.php';
require '../lib/generate_options.php';

$id = $_GET['PainID'];
$array = mysqli_query($con, "SELECT * FROM Pain WHERE PainID = $id");

if ($array != false) {
  $row = mysqli_fetch_array($array);
  //echo "We are editing.";
  $editing = true;

} else {
  $row = array("LocationOfPain" => "", "Pattern" => "",
  "Intensity" => "", "AtThisMoment" => "", "CharacterOfPain" => "",
  "CharacterOther" => "", "Radiation" => "",
  "TypeOfPain" => "",
  "WhatRelievesPain" => "", "WhatIncreasesPain" => "",
  "PainAffectsSleep" => "", "PainAffectsMood" => "",
  "PainAffectsActivity" => "", "PainAffectsNutrition" => "",
  "PainAffectsSocialInteraction" => "",
  "Comments" => "");
  echo "We are inserting.";
  $editing = false;
}

$character = array ("Shooting", "Pricking", "Throbbing",
  "Aching", "Pulling", "Dull", "Burning", "Sharp", "Other");
$tp = array("Somatic", "Visceral", "Neuropathic", "Mixed");
$pattern = array("Constant", "Intermittent");

function output_current_value($var) {
  // check value of var
  if (strcmp($var, "1") == 0)
    echo " checked";
}
echo "
<div id='content_top'>
  <h2>Pain Information</h2>
    <form action='process_edit_pain.php' method='post'>

      <ul class='info'>
        <li><label>Location Of Pain</label><input type='text'
        name='lop' value='" . $row['LocationOfPain'] . "'></li>
        <li><label>Pattern</label><select name='pattern'>";
          output_options_from_array($pattern, $row['Pattern']);
          echo "
        </select>
        </li>

        <li><label>Intensity</label>
            <input type='number' name='intensity' min='0' max='100' step='1'
                value='" . $row['Intensity'] . "'>

            <label>At this moment: </label>
            <input type='radio' name='atmoment' value='Better'";
              if (strcmp($row['AtThisMoment'], "Better") == 0)
                echo " checked";
              echo "
            >Better
            <input type='radio' name='atmoment' value='Worse'";
              if (strcmp($row['AtThisMoment'], "Worse") == 0)
                echo " checked";
              echo "
            >Worse
            </li>
        <li><label>Character</label><select name='character'>";
          output_options_from_array($character, $row['CharacterOfPain']);
          echo "
        </select>
        <label>Other</label><input type='text' name='other' value='" .
          $row['CharacterOther'] . "'>
        </li>


        <li><label>Type Of Pain</label><select name='tp'>";
          output_options_from_array($tp, $row['TypeOfPain']);
          echo "
          </select>
          <input type='checkbox' name='radiation[]' value='1'";
            output_current_value($row['Radiation']);
            echo "
          >Radiation
          </li>
        <li><label>What relieves the pain?</label><input type='text' name='relieve'
          value='" . $row['WhatRelievesPain'] . "'></li>
        <li><label>What causes pain to increase?</label><input type='text' name='cause'
          value='" . $row['WhatIncreasesPain'] . "'></li>
        <li><label>Indicate if pain affects</label>
            <input type='checkbox' name='sleep' value='1'";
              output_current_value($row['PainAffectsSleep']);
              echo "
            />Sleep
            <input type='checkbox' name='mood' value='1'";
              output_current_value($row['PainAffectsMood']);
              echo "
            />Mood
            <input type='checkbox' name='activity' value='1'";
              output_current_value($row['PainAffectsActivity']);
              echo "
            />Activity
            <input type='checkbox' name='nutrition' value='1'";
              output_current_value($row['PainAffectsNutrition']);
              echo "
            />Nutrition
            <input type='checkbox' name='social' value='1'";
              output_current_value($row['PainAffectsSocialInteraction']);
              echo "
            />Social Interaction
        </li>

        <li>
          <label>Further comments about the pain</label>
          <input type='text' name='comments'value='" . $row['Comments'] . "'>
        </li>";
         echo "
        <li><label>Plan </label>";
            include '../medicine/view_all_medicine_body.php';
            if ($editing) {
              echo "
            <input type='button' name='add_medicine' value='Add Medicine'
              onclick=\"location='../medicine/edit_medicine.php?PainID="
              . $id . "&MedicineID='\">";
            }
        echo "
        </li>
        <li>
            <input type='hidden' name='id'
              value='" . $_GET['PainID'] . "'>
            <input type='hidden' name='patientid'
              value='" . $_GET['PatientID'] . "'>
          <input type='submit'>
        </li>
      </ul>

    </form>
    </div>
  ";

require '../lib/main_container_end.php';
mysqli_close($con);
?>
