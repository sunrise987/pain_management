<?php

$painid = $_GET['PainID'];
$result = mysqli_query($con, "
  SELECT MedicineID, Opioids FROM Medicine where PainID = $painid");

if ($result != false) {
  while ($row = mysqli_fetch_array($result)) {
    echo "<a href='../medicine/view_medicine.php?MedicineID=" .
      $row['MedicineID'] . "'\" target='_blank'>" .
      $row['Opioids'] . "<br></a>";
  }
} else {
  echo "No medicine prescribed yet.";
}
?>
