<?php
/* url : /view_all_medicine.php?PainID=n */

echo "
<html>
  <head>
    <link href='../style.css' rel='stylesheet' type='text/css'>
  </head>
    <div>
";

$con=mysqli_connect("localhost", "php_app", "admin000", "patient_management");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$painid = $_GET['PainID'];
$result = mysqli_query($con, "
  SELECT MedicineID, Opioids FROM Medicine where PainID = $painid");

while ($row = mysqli_fetch_array($result)) {
  echo "<a href='view_medicine.php?MedicineID=" .
    $row['MedicineID'] . "'\" target='_blank'>" .
    $row['Opioids'] . "<br></a>";
}
mysqli_close($con);
echo "
    </div>
  </body>
</html>
";
?>
