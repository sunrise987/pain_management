<?php

$timezone = "Asia/Qatar";
if (function_exists('date_default_timezone_set')) {
  if (!date_default_timezone_set($timezone)) {
    echo date('d-m-Y H:i:s');
    echo "Failed to set timezone to Qatar.";
  }
}

function output_month_options($selected_month) {
  $months = array("January", "February", "March", "April", "May", "June", "July", "August",
    "September", "October", "November", "December");

  for ($x = 1; $x <= 12; $x++) {
    echo "<option ";
    if ($selected_month == $x) {
      echo "selected ";
    }
    echo "value='" . $x . "'>" . $months[$x - 1] . "</option>";
  }
}

function output_day_options($selected_day) {
  for ($x = 1; $x < 32; $x++) {
    echo "<option";
    if ($selected_day == $x)
      echo " selected";
    echo ">" . $x . "</option>";
  }
}

/*
 * ouputs a date form and fills fields with data given in input $date.
 * Expects parameter $date to be an array of date variables as returned
 * by function date_parse(). */
function output_date_fields($date) {
  echo "
  <input name='year' type='number' min='1920' step='1'
    value='" . $date['year'] . "'>
    <select name='month'>";
  output_month_options($date['month']);
  echo "
    </select>
    <select name='day'>";
  output_day_options($date['day']);
  echo "
    </select>";
}
?>
