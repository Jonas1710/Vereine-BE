<?php
  $counter = 2;
  echo "<table class='vereinList'>";
  foreach($vereine as $verein) {
    if($counter % 2 == 0) {
        echo "<tr class='evenElement' data-href='/verein/detail?id=".$verein->id."'><td data-id=".$verein->id."><a href='/verein/detail?id=". $verein->id."'>" . $verein->name . " </a></td><td>". $verein->kategorie . "</td><td>". $verein->gründungsjahr ."</td><td><a href='/verein/delete?id=". $verein->id ."'>Löschen</a> | <a href='/verein/update?id=". $verein->id ."'>Bearbeiten</a></td></tr>";
    }
    else {
        echo "<tr data-href='/verein/detail?id=".$verein->id."'><td><a href='/verein/detail?id=". $verein->id."'>" . $verein->name . "</a></td><td>" . $verein->kategorie . "</td><td>". $verein->gründungsjahr . "</td><td><a href='/verein/delete?id=". $verein->id ."'>Löschen</a> | <a href='/verein/update?id=". $verein->id ."'>Bearbeiten</a></td></tr>";
    }
    $counter++;
  }
  echo "</table>";
?>
<script>
  $(document).ready(function() {
      $("tr").click(function() {
          window.location = $(this).data("href");
      });
  });
</script>
