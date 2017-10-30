<form class="form-horizontal" action="/verein/doUpdate" method="post" enctype="multipart/form-data">
	<div class="component" data-html="true">
		<div class="form-group">
		  <label class="col-md-2 control-label"></label>
		  <div class="col-md-4">
		  	<input id="id" name="id" type="hidden" class="form-control input-md" value="<?php echo $verein->id ?>">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="name">Vereins Name</label>
		  <div class="col-md-4">
		  	<input id="name" name="name" type="text" placeholder="Vereins Name" class="form-control input-md" value="<?php echo $verein->name ?>" required maxlength="30">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="kategorie">Kategorie</label>
		  <div class="col-md-4">
		  	<input id="kategorie" name="kategorie" type="text" placeholder="Kategorie (z.B. Fussball)" class="form-control input-md" value="<?php echo $verein->kategorie ?>" required maxlength="30">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="mitgliederanzahl">Anzahl Mitglieder</label>
		  <div class="col-md-4">
		  	<input id="mitgliederanzahl" name="mitgliederanzahl" type="number" placeholder="Anzahl Mitglieder" class="form-control input-md" value="<?php echo $verein->mitgliederanzahl ?>" max="10000000" min="1">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="bild">Bild</label>
		  <div class="col-md-4">
				<p class="currentImg"><?php echo substr($verein->bild, 8) ?></p>
		  	<input id="bild" name="img" type="file" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="gründungsjahr">Gründungsjahr</label>
		  <div class="col-md-4">
		  	<input id="gründungsjahr" name="gründungsjahr" type="number" placeholder="Gründungsjahr" class="form-control input-md" value="<?php echo $verein->gründungsjahr ?>" min="0" max="9999">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="beschreibung">Beschreibung</label>
		  <div class="col-md-4">
		  	<textarea id="beschreibung" name="beschreibung" placeholder="Beschreibung" class="form-control input-md"><?php echo $verein->beschreibung ?></textarea>
		  </div>
		</div>
		<div class="form-group">
	      <label class="col-md-2 control-label">&nbsp;</label>
		  <div class="col-md-4">
		    <input id="safe" name="safe" type="submit" value="Speichern" class="btn btn-primary">
		  </div>
		</div>
	</div>
</form>
