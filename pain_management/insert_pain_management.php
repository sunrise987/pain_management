<html>
  <head>
    <link href="../style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <header><h2>Pain Flow (Management)</h2></header>
    <div id="Container">
      <form action="process_insert_pain_management.php" method="post">

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

          <li><label>Location Of Pain</label><input type="text" name="lop"></li>
          <li><label>Type Of Pain</label><select name="top">
            <option value='Somatic'>Somatic</option>
            <option value='Visceral'>Visceral</option>
            <option value='Neuropathic'>Neuropathic</option>
            <option value='Mixed'>Mixed</option>
          </select></li>
          <li><label>Intensity</label><input type="text" name="intensity"></li>
          <li><label>Opioids</label><input type="text" name="opioids"></li>
          <li><label>Other Medications</label><input type="text" name="othermed"></li>

          <li><label>Side Effects</label><select name="sideeffects">
            <option value='Anxiety'>Anxiety</option>
            <option value='confusion'>Confusion</option>
            <option value='Constipation'>Constipation</option>
            <option value='epigastric'>Epigastric Distress</option>
            <option value='hallucination'>Hallucination</option>
            <option value='sedation'>Increased Sedation</option>
            <option value='weakness'>Motor Weakness</option>
            <option value='nausea'>Nausea</option>
            <option value='pruritus'>Pruritus</option>
            <option value='retention'>Urinary Retention</option>
            <option value='vomiting'>Vomiting</option>
          </select></li>

          <li><label>Comments</label><input type="text" name="comments"></li>
          <li><input type="submit"></li>
        </ul>

      </form>
    </div>
  </body>
</html>
