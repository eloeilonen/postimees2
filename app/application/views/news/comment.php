<?php echo validation_errors(); ?>
		<hr>
		<h4>Kommenteeri uudist</h4>
		<div class="well"><?php $attributes = array("class" => "form-horizontal", "id" => "addform", "name" => "addform");
		echo form_open('comment/'.$news_item['uudise_ID'], $attributes);?>
		
				<div class="form-group">
					<input type="hidden" id="id" name="id" value="<?php echo $news_item['uudise_ID']?>">
					<input type="hidden" id="date" name="date" value="<?php echo date("Y-m-d") ?>">
					<label for="nimi">Nimi:</label>
					<input id="nimi" name="nimi" placeholder="Sinu nimi" type="text" class="form-control" value="<?php echo set_value('nimi'); ?>" />
					<span class="text-danger"><?php echo form_error('nimi'); ?></span>
					<label for="email">Email:</label>
					<input id="email" name="email" placeholder="sinu.email@example.com" type="text" class="form-control" value="<?php echo set_value('email'); ?>" />
					<span class="text-danger"><?php echo form_error('email'); ?></span>
					<label for="kommentaar">Kommentaar:</label>
					<textarea id="kommentaar" name="kommentaar" class="form-control" rows="3"></textarea>
					<span class="text-danger"><?php echo form_error('kommentaar'); ?></span>
					<input type="checkbox" id="uudiskirjad" name="uudiskirjad" value="uudiskirjad"><label>Soovin saada Postimees2 uudiskirju.</label><br>
					<button class="btn btn-primary" type="submit">Lisa</button>
				</div>
			<?php echo form_close(); ?>
			<?php echo $this->session->flashdata('msg'); ?>
		</div>
		<hr>
		<?php foreach ($comment as $comm): ?>
			<div class="media">
				<div class="media-body well"><?php echo $comm['kommenteerija_NIMI'] ?>
					<h4 class="media-heading">
					<small><?php echo $comm['kommentaari_KUUPAEV'] ?></small></h4>
					<p class="text-justify"><?php echo $comm['kommentaari_TEKST'] ?></p>
				</div>
				<hr>
			</div>
		<?php endforeach ?>
	</div>
