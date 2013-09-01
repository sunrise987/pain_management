<html>
  <head>
    <link href="../style.css" rel="stylesheet" type="text/css">
  </head>

  <body>
    <header><div><h2>Pain Information</h2><div></div></div></header>
    <div id="Container">
    <form action="process_insert_pain.php" method="post">

      <ul class="info">
        <li><label>Location Of Pain</label><input type="text"
        name="lop"></li>
        <li><label>Pattern</label><select name="pattern">
            <option>Constant</option>
            <option>Intermittent</option>
          </select>
        </li>

        <li><label>Intensity</label>
            <input type="number" name="intensity" min="0" max="100" step="1" value="0">
            <label>At this moment: </label>
            <input type="radio" name="atmoment" value="best">Best
            <input type="radio" name="atmoment" value="worst">Worst
            </li>
        <li><label>Character</label><select multiple="multiple" name="character">
            <option>Shooting</option>
            <option>Pricking</option>
            <option>Throbbing</option>
            <option>Aching</option>
            <option>Pulling</option>
            <option>Dull</option>
            <option>Burning</option>
            <option>Sharp</option>
            <option>Other</option>
          </select>
          <label>Other</label><input type="text" name="other">
        </li>


        <li><label>Type Of Pain</label><select name="tp">
            <option>Somatic</option>
            <option>Visceral</option>
            <option>Neuropathic</option>
            <option>Mixed</option>
          </select>
          <input type="checkbox" name="radiation[]" value="1">Radiation
        </li>
        <li><label>What relieves the pain?</label><input type="text" name="relieve"></li>
        <li><label>What causes pain to increase?</label><input type="text" name="cause"></li>
        <li><label>Indicate if pain affects</label>
            <input type="checkbox" name="effects[]" value="sleep" /> Sleep
            <input type="checkbox" name="effects[]" value="mood" /> Mood
            <input type="checkbox" name="effects[]" value="activity" /> Activity
            <input type="checkbox" name="effects[]" value="nutrition" /> Nutrition
            <input type="checkbox" name="effects[]" value="social" /> Social Interaction
        </li>

        <li>
          <label>Further comments about the pain</label>
          <input type="text" name="comments">
        </li>
        <li><label>Plan</label><input type="text" name="plan"></li>
        <li>
          <?php
          echo "<input type=\"hidden\" name=\"PatientID\" value=\"" . $_GET['PatientID']              . "\">";
          ?>
          <input type="submit">
        </li>
      </ul>

    </form>
    </div>
  </body>
</html>
