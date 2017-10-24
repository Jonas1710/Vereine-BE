
<div class="container-detail">
		<div class="details-image">
    		<img class="image" src="/images/NoImage.png" alt="Bild konnte nicht geladen werden" />
		</div>
		<div class="info-container">
			<h1><?php echo $verein->name; ?></h1>
			<p>
				Anzahl Mitgieder: <?php echo $verein->mitgliederanzahl; ?>
			</p>
			<p>
				Gründungsjahr: <?php echo $verein->gründungsjahr; ?>
			</p>
			<p>
				Kategorie: <?php echo $verein->kategorie; ?>
			</p>
		</div>
			<p id="beschreibung">
				<?php echo $verein->beschreibung; ?>
			</p>
			<?php
				echo "<a href=\"javascript:history.go(-1)\">zurück</a>";
			 ?>

</div>
