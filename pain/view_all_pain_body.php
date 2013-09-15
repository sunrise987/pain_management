<?php
/* Notes:
 * */

$patientid = $_GET['PatientID'];
$row = mysqli_fetch_array(mysqli_query($con, "
  SELECT Name FROM Patient WHERE PatientID = $patientid"));
?>

  <div id='content_bottom'>
    <h2>Pain Information for <?php echo $row['Name']?></h2>
    <div class='CSSTableGenerator'>
      <table>
        <tr>

          <th class='lop'>Location of Pain</td>
          <th class='pattern'>Pattern</td>
          <th class='intensity'>Intensity</td>
          <th class='character'>Character Of Pain</td>
          <th class='radiation'>Radiation</td>
          <th class='top'>Type of Pain</td>
          <th class='relives'>What relieves pain</td>
          <th class='increase'>What increases pain</td>
          <th class='comments'>Comments</td>
          <th class='plan'>Plan</td>
          <th class='view_edit_delete'></td>
      </tr>

<?php
$result = mysqli_query($con, "
  SELECT * FROM Pain WHERE PatientID= $patientid");
while ($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['LocationOfPain'] . "</td>";
  echo "<td>" . $row['Pattern'] . "</td>";
  echo "<td>" . $row['Intensity'] . "</td>";
  echo "<td>" . $row['CharacterOfPain'] . "</td>";
  echo "<td>" . $row['Radiation'] . "</td>";
  echo "<td>" . $row['TypeOfPain'] . "</td>";
  echo "<td>" . $row['WhatRelievesPain'] . "</td>";
  echo "<td>" . $row['WhatIncreasesPain'] . "</td>";
  echo "<td>" . $row['Comments'] . "</td>";

  $painid = $row['PainID'];
  $medicine_result = mysqli_query($con, "
    SELECT MedicineID, Opioids FROM Medicine where PainID = $painid");
  echo "<td>";
    while ($medicine_row = mysqli_fetch_array($medicine_result)) {
      echo "<a href='../medicine/view_medicine.php?MedicineID=" .
        $medicine_row['MedicineID'] . "'\" target='_blank'>" .
        $medicine_row['Opioids'] . "<br></a>";
    }
  echo "</td>";

  echo "<td><input type='button' value='View'
    onclick=\"location='../pain/view_pain.php?PainID="
    . $painid . "'\">";
  echo "<input type='button' value='Edit'
    onclick=\"location='../pain/edit_pain.php?PainID="
    . $painid . "&PatientID=" . $row['PatientID'] . "'\">";
  echo "<input type='button' value='Delete'
    onclick=\"location='../pain/delete_pain.php?PainID="
    . $painid . "'\"></td>";
  echo "</tr>";

}
?>
    </table>
    </div>
    <button class='add' type='button'
      onclick="location='../pain/edit_pain.php?PatientID=<?php echo $patientid?>&PainID='">Add Pain Information</button>
  </div>
