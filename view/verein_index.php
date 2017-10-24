<script src="/js/jquery-3.2.1.min.js">
  $(document).ready(function() {
    $(".evenElement").click(function() {
        window.location = $(this).data("href");
    });
  });
</script>


<?php
  $counter = 2;
  echo "<table class='vereinList'>";
  foreach($vereine as $verein) {
    if($counter % 2 == 0) {
        echo "<tr class='evenElement'><td data-id=".$verein->id."><a href='/verein/detail?id=". $verein->id."'>" . $verein->name . " </a></td><td><a href='/verein/detail?id=". $verein->id."'> " . $verein->kategorie . "</a></td><td ><a href='/verein/detail?id=". $verein->id."'>". $verein->gründungsjahr ."</a></td><td><a href='/verein/delete?id=". $verein->id ."'>Löschen</a> | <a href='/verein/update?id=". $verein->id ."'>Bearbeiten</a></td></tr>";
    }
    else {
        echo "<tr><td class='clickable-row'><a href='/verein/detail?id=". $verein->id."'>" . $verein->name . "</a></td><td class='clickable-row'><a href='/verein/detail?id=". $verein->id."'>" . $verein->kategorie . "</a></td><td class='clickable-row''><a href='/verein/detail?id=". $verein->id."'>". $verein->gründungsjahr . "</a></td><td><a href='/verein/delete?id=". $verein->id ."'>Löschen</a> | <a href='/verein/update?id=". $verein->id ."'>Bearbeiten</a></td></tr>";
    }
    $counter++;
  }
  echo "</table>";
?>
