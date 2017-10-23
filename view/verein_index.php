<?php
  $counter = 0;
  echo "<table class='vereinList'>";
  foreach($vereine as $verein) {
    echo "<tr><td>" . $verein->name . " </td><td> " . $verein->kategorie . "</td><td>". $verein->gründungsjahr ."</td></tr>";
  }
  echo "</table>";
?>
