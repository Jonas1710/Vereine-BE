  <div class="col-md-4">
      <input id="searchTerm" type="search" placeholder="Suchbegriff" class="form-control input-md"><button id="searchButton" type="button" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
  </div>

<?php
  $counter = 2;
  echo "<table class='vereinList'>";
  echo "<tr><th>Vereinsname</th><th>Kategorie</th><th>Gründungsjahr</th><th></th></tr>";
  foreach($vereine as $verein) {
    if($counter % 2 == 0) {
        echo "<tr class='evenElement clickableElement' data-href='/verein/detail?id=".$verein->id."'><td data-id=".$verein->id."><a href='/verein/detail?id=". $verein->id."'>" . $verein->name . " </a></td><td>". $verein->kategorie . "</td><td>". $verein->gründungsjahr ."</td><td><a href='/verein/delete?id=". $verein->id ."'>Löschen</a> | <a href='/verein/update?id=". $verein->id ."'>Bearbeiten</a></td></tr>";
    }
    else {
        echo "<tr class='clickableElement' data-href='/verein/detail?id=".$verein->id."'><td><a href='/verein/detail?id=". $verein->id."'>" . $verein->name . "</a></td><td>" . $verein->kategorie . "</td><td>". $verein->gründungsjahr . "</td><td><a href='/verein/delete?id=". $verein->id ."'>Löschen</a> | <a href='/verein/update?id=". $verein->id ."'>Bearbeiten</a></td></tr>";
    }
    $counter++;
  }
  echo "</table>";
?>
<script>
  $(document).ready(function() {
      $(".clickableElement").click(function() {
        window.location = $(this).data("href");
      });

      $("#searchButton").click(function() {
        window.location = "/verein/search?searchTerm=" + $("#searchTerm").val();
      });
  });
</script>
