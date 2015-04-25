<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="<?php echo base_url("assets/jquery-ui-1.11.4/jquery-ui.min.js"); ?>"></script>
<link href="<?php echo base_url('assets/jquery-ui-1.11.4/jquery-ui.min.css'); ?>" rel="stylesheet" type="text/css" />

    <style type="text/css">
    .colbox {
        margin-left: 0px;
        margin-right: 0px;
    }
    </style>

</head>
<body>
<?php echo validation_errors(); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-offset-3 col-lg-6 col-sm-6 well">
		<legend><h2>Lisa uus uudis</h2></legend>
		<?php $attributes = array("class" => "form-horizontal", "id" => "addform", "name" => "addform");
		echo form_open('editor/create', $attributes);?>
		<fieldset>

	<div class="form-group">
	<div class="row colbox">
	<div class="col-lg-4 col-sm-4">
		<label for="pealkiri" class="control-label">Uudise pealkiri</label></div>
	<div class="col-lg-8 col-sm-8">
		<input id="pealkiri" name="pealkiri" placeholder="Uudise pealkiri" type="text" class="form-control" value="<?php echo set_value('pealkiri'); ?>" />
		<span class="text-danger"><?php echo form_error('pealkiri'); ?></span>
	</div></div></div>

	<div class="form-group">
		<div class="row colbox">
		<div class="col-lg-4 col-sm-4">
		<label for="department" class="control-label">Teema</label></div>
            <div class="col-lg-8 col-sm-8">
                <?php $attributes = 'class = "form-control" id = "teema"';
                echo form_dropdown('teema',$teema,set_value('teema'),$attributes);?>
                <span class="text-danger"><?php echo form_error('teema'); ?></span>
	</div></div></div>


	<div class="form-group">
	<div class="row colbox">
	<div class="col-lg-4 col-sm-4">
		<label for="tekst" class="control-label">Uudise tekst</label></div>
	<div class="col-lg-8 col-sm-8">
		<textarea id="tekst" name='tekst' class="form-control" rows="10"></textarea>
		<span class="text-danger"><?php echo form_error('tekst'); ?></span>
	</div></div></div>

	<div class="form-group">
	<div class="row colbox">
	<div class="col-lg-4 col-sm-4">
		<label for="pilt" class="control-label">Link uudise pildile</label></div>
	<div class="col-lg-8 col-sm-8">
		<input type="pilt" name="pilt" id="pilt" placeholder="http://" class="form-control"/>
		<span class="text-danger"><?php echo form_error('tekst'); ?></span>
	</div></div></div>

	<div class="form-group">
	<div class="row colbox">
	<div class="col-lg-4 col-sm-4">
		<label for="eelvaade" class="control-label">Uudise eelvaate tekst</label></div>
	<div class="col-lg-8 col-sm-8">
		<textarea id="eelvaade" name='eelvaade' class="form-control" rows="3"></textarea>
		<span class="text-danger"><?php echo form_error('eelvaade'); ?></span>
	</div></div></div>

	<hr>
	<div class="form-group">
	<div class="row colbox">
	<div class="col-lg-4 col-sm-4">
		<label for="lat_coord" class="control-label">Asukoha pikkuskraad</label></div>
	<div class="col-lg-8 col-sm-8">
		<input type="number" id="lat_coord" name="lat_coord" value="58.378355" type="text" class="form-control"  value="<?php echo set_value('lat_coord'); ?>" />
		<span class="text-danger"><?php echo form_error('lat_coord'); ?></span>
	</div></div></div>
	<div class="form-group">
	<div class="row colbox">
	<div class="col-lg-4 col-sm-4">
		<label for="lon_coord" class="control-label">Asukoha laiuskraad</label></div>
	<div class="col-lg-8 col-sm-8">
		<input type="number" id="lon_coord" name="lon_coord" value="26.714663" type="text" class="form-control"  value="<?php echo set_value('lon_coord'); ?>" />
		<span class="text-danger"><?php echo form_error('lon_coord'); ?></span>
	</div></div></div>

	<hr>
	<div class="form-group">
	<div class="row colbox">
	<div class="col-lg-4 col-sm-4">
		<label for="date" class="control-label">Kuupäev</label></div>
	<div class="col-lg-8 col-sm-8">
		<input id="date" name="date" placeholder="2015-01-01" type="text" class="form-control"  value="<?php echo set_value('date'); ?>" />
		<span class="text-danger"><?php echo form_error('date'); ?></span>

	<script type="text/javascript">
     $(function() {
        $( "#date" ).datepicker({dateFormat: "yy-mm-dd"});
    });
    </script>

	</div></div></div>

	<div class="form-group">
	<div class="row colbox">
	<div class="col-lg-4 col-sm-4">
		<label for="autor" class="control-label">Autori ID</label></div>
	<div class="col-lg-8 col-sm-8">
		<input type="number" name="autor" id="autor" value="1"  class="form-control" READONLY/>
		<span class="text-danger"><?php echo form_error('autor'); ?></span>
	</div></div></div>

	<div class="form-group">
	<div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
		<input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Salvesta" />
		<input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Puhasta väljad"/>
	</div></div>
	</fieldset>
        <?php echo form_close(); ?>
        <?php echo $this->session->flashdata('msg'); ?>
    </div>
    </div>
</div>
