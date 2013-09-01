<html>
  <head>
    <link href="../style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <header><h2>Patient Information</h2><div></div></header>
    <div id="Container">
        <ul class="info">
<?php
$con=mysqli_connect("localhost","php_app","admin000","patient_management");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['PatientID'];
$result = mysqli_query($con, "SELECT * FROM Patient where PatientID=$id");
$row = mysqli_fetch_array($result);

echo "<li><label>Name</label>" . $row['Name'] . "</li>";
echo "<li><label>Date Of Birth</label>" . $row['DateOfBirth'] . "</li>";
echo "<li><label>Gender</label>" . $row['Gender'] . "</li>";
echo "<li><label>Nationality</label>" . $row['Nationality'] . "</li>";
echo "<li><label>Date Of Addmission</label>" . $row['DateOfAddmission'] . "</li>";
echo "<li><label>Medical History</label>" . $row['PastMedicalHistory'] . "</li>";
echo "<li><label>Surgical History</label>" . $row['PastSurgicalHistory'] . "</li>";
echo "<li><label>Diagnosis</label>" . $row['Diagnosis'] . "</li>";
echo "
  </ul>
  </div>
  <button type=\"button\" onclick=\"location='view_all_patients.php'\">View All Patients</button>
  <button type=\"button\" onclick=\"location='../pain/insert_pain.php?PatientID=" . $id . "'\">Add Pain Information</button>
  </body>
  </html>";
mysqli_close($con);
?>
