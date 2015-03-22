<h2>Lisa uus uudis</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('editor/create') ?>

	<label for="pealkiri">Pealkiri</label>
	<input type="input" name="pealkiri" /><br />

	<label for="teema">Teema</label>
	<input type="input" name="teema" value="2"/><br />

	<p>Asukoha andmed</p>
	<label for="lat_coord">Asukoha pikkuskraad</label>
	<input type="input" name="lat_coord" value="58.378355"/>
	<label for="lon_coord">Asukoha laiuskraad</label>
	<input type="input" name="lon_coord" value="26.714663"/><br />

	<label for="tekst">Tekst</label>
	<textarea name="tekst"></textarea><br />

	<label for="eelvaade">Eelvaade</label>
	<textarea name="eelvaade"></textarea><br />

	<label for="date">Kuupäev</label>
	<input type="input" name="date" value="2015-01-01"/><br />

	<label for="autor">Autor</label>
	<input type="input" name="autor" value="1"/><br />

	<input type="submit" name="submit" value="Salvesta" />

</form>

	<?php
	  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
	  echo "<a href='$url'>Katkesta</a></br>";
	?>
