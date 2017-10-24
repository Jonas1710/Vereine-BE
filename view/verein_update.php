<form class="form-horizontal" action="/verein/doUpdate" method="post">
	<div class="component" data-html="true">
		<div class="form-group">
		  <label class="col-md-2 control-label" for="id"></label>
		  <div class="col-md-4">
		  	<input id="id" name="id" type="hidden" class="form-control input-md" value="<?php echo $verein->id ?>" maxlength="30">
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
		  	<input id="mitgliederanzahl" name="mitgliederanzahl" type="number" placeholder="Anzahl Mitglieder" class="form-control input-md" value="<?php echo $verein->mitgliederanzahl ?>">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="bild">Bild</label>
		  <div class="col-md-4">
		  	<input id="bild" name="bild" type="file" placeholder="bild" class="form-control input-md" value="<?php echo $verein->bild ?>">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="gründungsjahr">Gründungsjahr</label>
		  <div class="col-md-4">
		  	<input id="gründungsjahr" name="gründungsjahr" type="number" placeholder="Gründungsjahr" class="form-control input-md" value="<?php echo $verein->gründungsjahr ?>">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="beschreibung">Beschreibung</label>
		  <div class="col-md-4">
		  	<textarea id="beschreibung" name="beschreibung" type="text" placeholder="Beschreibung" class="form-control input-md"><?php echo $verein->beschreibung ?></textarea>
		  </div>
		</div>
		<div class="form-group">
	      <label class="col-md-2 control-label" for="send">&nbsp;</label>
		  <div class="col-md-4">
		    <input id="safe" name="safe" type="submit" value="Speichern" class="btn btn-primary">
		  </div>
		</div>
	</div>
</form>
