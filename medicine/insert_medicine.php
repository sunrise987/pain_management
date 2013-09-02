<html>
  <head>
    <link href="../style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <header><h2>Medicine Information</h2></header>
    <div id="Container">
      <form action="process_insert_medicine.php" method="post">

        <ul class="info">
          <li><label>Date</label>
              <input name="year" type="number" min="1920" step="1" value="2013">
              <select name="month">
                <option value="1">January</option><option value="2">February</option>
                <option value="3">March</option><option value="4">April</option>
                <option value="5">May</option><option value="6">June</option>
                <option value="7">July</option><option value="8">August</option>
                <option value="9">September</option><option value="10">October</option>
                <option value="11">November</option><option value="12">December</option>
              </select>
              <select name="day">
                <?php
                  for ($x = 1; $x < 32; $x++)
                    echo "<option>" . $x . "</option>";
                ?>
              </select>
          </li>

          <li><label>Opioids</label><input type="text" name="opioids"></li>
          <li><label>Dose</label><input type="text" name="dose"></li>
          <li><label>Frequency</label><input type="text" name="frequency"></li>
          <li><label>Route Of Addmission</label><input type="text" name="route"></li>
          <li><label>Side Effects</label><input type="text" name="sideeffects"></li>
          <li><label>Comments</label><input type="text" name="comments"></li>
          <li><input type="submit"></li>
        </ul>

      </form>
    </div>
  </body>
</html>
