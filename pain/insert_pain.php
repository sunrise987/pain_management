<html>
  <head>
    <link href="../style.css" rel="stylesheet" type="text/css">
  </head>

  <body id="body">
    <div id="PatientContainer">
    <form action="process_insert_pain.php" method="post">
      <header id="header"><div><h2>Pain Data</h2><div></div></div></header>

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

        <li><label>Radiation</label><input type="text" name="radiation"></li>
        <li><label>Type Of Pain</label><select name="tp">
            <option>Somatic</option>
            <option>Visceral</option>
            <option>Neuropathic</option>
            <option>Mixed</option>
          </select>
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
          <input type="submit"><input type="hidden" name="PainID">
        </li>
      </ul>

    </form>
    </div>
  </body>
</html>
