<?php
$id = $_GET['PainManagementID'];
$row = mysqli_fetch_array(mysqli_query($con, "
  SELECT PainManagement.PainID, Pain.PatientID
    FROM PainManagement
    JOIN Pain ON PainManagement.PainID
    WHERE PainManagementID=$id
    "));
require 'medicine_and_pain_management_buttons.html';
?>
