
<div class="container-detail">
		<div class="details-image">
    		<img class="image" <?php
				if($verein->bild==  "uploads/"){
					echo "src='/images/NoImage.png'";
				}
				else {
					echo "src='/".$verein->bild."'";
				}
				?> alt="Bild konnte nicht geladen werden" />
		</div>
		<div class="info-container">
			<h1><?php echo $verein->name; ?></h1>
			<p>
				Anzahl Mitglieder: <?php echo $verein->mitgliederanzahl; ?>
			</p>
			<p>
				Gründungsjahr: <?php echo $verein->gründungsjahr; ?>
			</p>
			<p>
				Kategorie: <?php echo $verein->kategorie; ?>
			</p>
		</div>
			<p id="DetailBeschreibung">
				<?php echo $verein->beschreibung; ?>
			</p>
</div>
<?php
	echo "<a href=\"javascript:history.go(-1)\">zurück</a>";
 ?>
