<?php

/* Output select options from array and mark $str as selected (default value.) */
function output_options_from_array($arr, $str) {
  for ($x = 0; $x < sizeof($arr); $x++) {
    echo "<option ";
    if (strcmp($str, $arr[$x]) == 0) {
      echo "selected ";
    }
    echo "value='" . $arr[$x] . "'>" .  $arr[$x] . "</option>";
  }
}

?>
