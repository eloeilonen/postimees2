<h2>Lisa uus uudis</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('editor/create') ?>

	<label for="pealkiri-id">Pealkiri</label>
	<input type="text" name="pealkiri" /><br />

	<label for="teema-id">Teema</label>
	<input type="text" name="teema" value="2"/><br />

	<p>Asukoha andmed</p>
	<label for="lat_coord-id">Asukoha pikkuskraad</label>
	<input type="number" name="lat_coord" value="58.378355"/>
	<label for="lon_coord-id">Asukoha laiuskraad</label>
	<input type="number" name="lon_coord" value="26.714663"/><br />

	<label for="tekst-id">Tekst</label>
	<textarea name="tekst"></textarea><br />

	<label for="eelvaade-id">Eelvaade</label>
	<textarea name="eelvaade"></textarea><br />

	<label for="date">Kuupäev-id</label>
	<input type="date" name="date" value="2015-01-01"/><br />

	<label for="autor">Autor-id</label>
	<input type="number" name="autor" value="1"/><br />

	<input type="submit" name="submit" value="Salvesta" />

</form>

	<?php
	  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
	  echo "<a href='$url'>Katkesta</a><br>";
	?>
