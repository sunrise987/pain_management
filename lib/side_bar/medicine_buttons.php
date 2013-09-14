<?php

$id = $_GET['MedicineID'];
$row = mysqli_fetch_array(mysqli_query($con, "
  SELECT Medicine.PainID, Pain.PatientID
  FROM Medicine
  JOIN Pain ON Medicine.PainID
  WHERE MedicineID=$id
  "));
require 'medicine_and_pain_management_buttons.html';
?>
