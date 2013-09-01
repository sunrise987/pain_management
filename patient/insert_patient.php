<html>
  <head>
    <link href="../style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <header><h2>Patient Information</h2><div></div></header>
    <div id="Container">
      <form action="process_insert_patient.php" method="post">

        <ul class="info">
          <li><label>First Name</label><input type="text" name="fname">
              <label>Last Name</label><input type="text" name="lname"></li>

          <li><label>Date Of Birth</label>
              <input name="birth_year" type="number" min="1920" step="1" value="1970">
              <select name="birth_month">
                <option value="1">January</option><option value="2">February</option>
                <option value="3">March</option><option value="4">April</option>
                <option value="5">May</option><option value="6">June</option>
                <option value="7">July</option><option value="8">August</option>
                <option value="9">September</option><option value="10">October</option>
                <option value="11">November</option><option value="12">December</option>
              </select>
              <select name="birth_day">
                <?php
                  for ($x = 1; $x < 32; $x++)
                    echo "<option>" . $x . "</option>";
                ?>
              </select>
          </li>
          <li><label>Gender</label>
              <input type="radio" value="male" name="gender">Male
              <input type="radio" value="female" name="gender">Female</li>
          <li><label>Nationality</label>
              <select name="nationality">
                <?php
$country_list = array("Afghanistan","Albania","Algeria","Andorra","Angola","AntiguaandBarbuda","Argentina","Armenia","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bhutan","Bolivia","BosniaandHerzegovina","Botswana","Brazil","Brunei","Bulgaria","BurkinaFaso","Burundi","Cambodia","Cameroon","Canada","CapeVerde","CentralAfricanRepublic","Chad","Chile","China","Colombi","Comoros","Congo(Brazzaville)","Congo","CostaRica","Coted'Ivoire","Croatia","Cuba","Cyprus","CzechRepublic","Denmark","Djibouti","Dominica","DominicanRepublic","EastTimor(TimorTimur)","Ecuador","Egypt","ElSalvador","EquatorialGuinea","Eritrea","Estonia","Ethiopia","Fiji","Finland","France","Gabon","Gambia,The","Georgia","Germany","Ghana","Greece","Grenada","Guatemala","Guinea","Guinea-Bissau","Guyana","Haiti","Honduras","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Israel","Italy","Jamaica","Japan","Jordan","Kazakhstan","Kenya","Kiribati","Korea,North","Korea,South","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","MarshallIslands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Morocco","Mozambique","Myanmar","Namibia","Nauru","Nepal","Netherlands","NewZealand","Nicaragua","Niger","Nigeria","Norway","Oman","Pakistan","Palau","Panama","PapuaNewGuinea","Paraguay","Peru","Philippines","Poland","Portugal","Qatar","Romania","Russia","Rwanda","SaintKittsandNevis","SaintLucia","SaintVincent","Samoa","SanMarino","SaoTomeandPrincipe","SaudiArabia","Senegal","SerbiaandMontenegro","Seychelles","SierraLeone","Singapore","Slovakia","Slovenia","SolomonIslands","Somalia","SouthAfrica","Spain","SriLanka","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Togo","Tonga","TrinidadandTobago","Tunisia","Turkey","Turkmenistan","Tuvalu","Uganda","Ukraine","UnitedArabEmirates","UnitedKingdom","UnitedStates","Uruguay","Uzbekistan","Vanuatu","VaticanCity","Venezuela","Vietnam","Yemen","Zambia","Zimbabwe");
                  foreach($country_list as $country) {
                    echo "<option>" . $country . "</option>";
                  }
                ?>
              </select>
          </li>

          <li><label>Date Of Addmission</label>
              <input name="addm_year" type="number" min="2000" step="1" value="2013">
              <select name="addm_month">
                <option value="1">January</option><option value="2">February</option>
                <option value="3">March</option><option value="4">April</option>
                <option value="5">May</option><option value="6">June</option>
                <option value="7">July</option><option value="8">August</option>
                <option value="9">September</option><option value="10">October</option>
                <option value="11">November</option><option value="12">December</option>
              </select>
              <select name="addm_day">
                <?php
                  for ($x = 1; $x < 32; $x++)
                    echo "<option>" . $x . "</option>";
                ?>
              </select>
          </li>
          <li><label>Medical History</label><input type="text"
            name="pmh"></li>
          <li><label>Surgical History</label><input type="text"
            name="psh"></li>
          <li><label>Diagnosis</label><input type="text" name="diagnosis"></li>
          <li><input type="submit"></li>
        </ul>

      </form>
    </div>
  </body>
</html>
