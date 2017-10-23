<?php
  $counter = 2;
  echo "<table class='vereinList'>";
  foreach($vereine as $verein) {
    if($counter % 2 == 0) {
        echo "<tr class='evenElement'><td>" . $verein->name . " </td><td> " . $verein->kategorie . "</td><td>". $verein->gründungsjahr ."</td><td><a href='/verein/delete?id=". $verein->id ."'>Löschen</a></td></tr>";
    }
    else {
        echo "<tr><td>" . $verein->name . " </td><td> " . $verein->kategorie . "</td><td>". $verein->gründungsjahr . "</td><td><a href='/verein/delete?id=". $verein->id ."'>Löschen</a></td></tr>";
    }
    $counter++;
  }
  echo "</table>";
?>
