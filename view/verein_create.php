<form class="form-horizontal" action="/verein/doCreate" method="post" enctype="multipart/form-data">
	<div class="component" data-html="true">
		<div class="form-group">
		  <label class="col-md-2 control-label" for="name">Vereins Name</label>
		  <div class="col-md-4">
		  	<input id="name" name="name" type="text" placeholder="Vereins Name" class="form-control input-md" required maxlength="30">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="kategorie">Kategorie</label>
		  <div class="col-md-4">
		  	<input id="kategorie" name="kategorie" type="text" placeholder="Kategorie (z.B. Fussball)" class="form-control input-md" required maxlength="30">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="mitgliederanzahl">Anzahl Mitglieder</label>
		  <div class="col-md-4">
		  	<input id="mitgliederanzahl" name="mitgliederanzahl" type="number" placeholder="Anzahl Mitglieder" class="form-control input-md" max="10000000" min="1">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="bild">Bild</label>
		  <div class="col-md-4">
		  	<input id="bild" name="img" type="file" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="gründungsjahr">Gründungsjahr</label>
		  <div class="col-md-4">
		  	<input id="gründungsjahr" name="gründungsjahr" type="number" placeholder="Gründungsjahr" value="2000" class="form-control input-md" min="0" max="9999">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="beschreibung">Beschreibung</label>
		  <div class="col-md-4">
		  	<textarea id="beschreibung" name="beschreibung" type="text" placeholder="Beschreibung" class="form-control input-md"></textarea>
		  </div>
		</div>
		<div class="form-group">
	      <label class="col-md-2 control-label" for="send">&nbsp;</label>
		  <div class="col-md-4">
		    <input id="send" name="submit" type="submit" class="btn btn-primary">
		  </div>
		</div>
	</div>
</form>
