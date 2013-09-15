<?php
require '../lib/mysql_connect.php';
require '../lib/main_container_start.php';
?>

  <div id='content_bottom'>
    <h2>list of patients</h2>
    <div class='CSSTableGenerator'>
      <table>
        <tr>
          <th class='name'>Name</td>
          <th class='phone'>Phone Number</td>
          <th class='email'>Email</td>
        </tr>

<?php
$result = mysqli_query($con, "SELECT * FROM Users");
while ($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "<td>" . $row['Phone'] . "</td>";
  echo "<td>" . $row['Email'] . "</td>";
  echo "</tr>";
}
mysqli_close($con);
?>
      </table>
    </div>
    <button type='button' class='add' onclick="location='edit_user.php?UserID='">Add User</button>
</div>

<?php require '../lib/main_container_end.php'; ?>
