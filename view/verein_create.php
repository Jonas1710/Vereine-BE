<form class="form-horizontal" action="/verein/doCreate" method="post">
	<div class="component" data-html="true">
		<div class="form-group">
		  <label class="col-md-2 control-label" for="name">Vereins Name</label>
		  <div class="col-md-4">
		  	<input id="name" name="name" type="text" placeholder="Vereins Name" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="kategorie">Kategorie</label>
		  <div class="col-md-4">
		  	<input id="kategorie" name="kategorie" type="text" placeholder="Kategorie" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="mitgliederanzahl">Anzahl Mitglieder</label>
		  <div class="col-md-4">
		  	<input id="mitgliederanzahl" name="mitgliederanzahl" type="number" placeholder="Anzahl Mitglieder" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="bild">Bild</label>
		  <div class="col-md-4">
		  	<input id="bild" name="bild" type="file" placeholder="bild" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="gründungsjahr">Gründungsjahr</label>
		  <div class="col-md-4">
		  	<input id="gründungsjahr" name="gründungsjahr" type="number" placeholder="Gründungsjahr" value="2000" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="beschreibung">Beschreibung</label>
		  <div class="col-md-4">
		  	<input id="beschreibung" name="beschreibung" type="textarea" placeholder="Beschreibung" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
	      <label class="col-md-2 control-label" for="send">&nbsp;</label>
		  <div class="col-md-4">
		    <input id="send" name="send" type="submit" class="btn btn-primary">
		  </div>
		</div>
	</div>
</form>
