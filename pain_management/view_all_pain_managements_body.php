<?php

$painid = $_GET['PainID'];
$array = mysqli_query($con, "
  SELECT Name FROM Patient JOIN Pain USING (PatientID) WHERE PainID = $painid");
$row = mysqli_fetch_array($array);

echo "
  <div id='content_bottom'>
  <h2>Pain Management for " . $row['Name'] . "</h2>
    <div class=\"CSSTableGenerator\">
      <table>
        <tr>

          <th class=\"datetime\">Date/Time</td>
          <th class=\"lop\">Location of Pain</td>
          <th class=\"top\">Type of Pain</td>
          <th class=\"intensity\">Intensity</td>
          <th class=\"opioids\">Opioids</td>
          <th class=\"infoothermed\">Other Medications</td>
          <th class=\"sideeffects\">Side Effects</td>
          <th class=\"comments\">Comments</td>
          <th class='view_edit_delete'></td>
        </tr>";

$result = mysqli_query($con, "SELECT * FROM PainManagement where PainID = $painid");
while ($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['DateTime'] . "</td>";
  echo "<td>" . $row['LocationOfPain'] . "</td>";
  echo "<td>" . $row['TypeOfPain'] . "</td>";
  echo "<td>" . $row['Intensity'] . "</td>";
  echo "<td>" . $row['Opioids'] . "</td>";
  echo "<td>" . $row['InfoOtherMed'] . "</td>";
  echo "<td>" . $row['SideEffects'] . "</td>";
  echo "<td>" . $row['Comments'] . "</td>";

  echo "<td><input type='button' value='View'
    onclick=\"location='../pain_management/view_pain_management.php?PainManagementID="
    . $row['PainManagementID'] . "'\">";
  echo "<input type='button' value='Edit'
    onclick=\"location='../pain_management/edit_pain_management.php?PainID=" . $painid
    . "&PainManagementID=" . $row['PainManagementID'] . "'\">";
  echo "<input type='button' value='Delete'
    onclick=\"location='../pain_management/delete_pain_management.php?PainManagementID="
    . $row['PainManagementID'] . "'\"></td>";
  echo "</tr>";

}
?>
    </table>
  </div>
  <button type='button' class='add'
  onclick="location='../pain_management/edit_pain_management.php?PainID=<?php echo $id ?>&PainManagementID='">Add Pain Management Entry</button>
</div>
