<?php

$painid = $_GET['PainID'];
$array = mysqli_query($con, "
  SELECT Name FROM Patient JOIN Pain USING (PatientID) WHERE PainID = $painid");
$row = mysqli_fetch_array($array);

echo "
  <header><h2>Pain Management for " . $row['Name'] . "</h2></header>
    <div class=\"CSSTableGenerator\">
      <table>
        <tr>

          <td class=\"datetime\">Date/Time</td>
          <td class=\"lop\">Location of Pain</td>
          <td class=\"top\">Type of Pain</td>
          <td class=\"intensity\">Intensity</td>
          <td class=\"opioids\">Opioids</td>
          <td class=\"infoothermed\">Other Medications</td>
          <td class=\"sideeffects\">Side Effects</td>
          <td class=\"comments\">Comments</td>
          <td class='view_edit_delete'></td>
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
  echo "<td>" . $row['Comments'] . "</td></tr>";

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
echo "
      </table>
    </div>";

?>
