<script type="text/javascript">
function confirmDialog() {
    return confirm("Oled sa kindel, et soovid selle uudise kustutada?")
}
</script>

<div class="row">
	<div class="col-sm-8 blog-main">
		<div class="blog-post">
			<h2 class="blog-post-title"><?php echo $news_item['uudise_PEALKIRI'] ?></h2>
			<img src="<?php echo $news_item['uudise_PILT'] ?>" alt="Uudise pilt" class="img-thumbnail" style="min-height:500px;height:500px;">
			<br><br><p class="text-justify"><?php echo $news_item['uudise_TEKST'] ?></p>
			<hr>
			<p class="blog-post-meta"><?php echo $news_author['kasutaja_EESNIMI'].' '.$news_author['kasutaja_PERENIMI'].' ' ?> <a href="mailto:"<?php echo $news_author['kasutaja_EMAIL'] ?>><?php echo $news_author['kasutaja_EMAIL'] ?></a></p>
			<p class="blog-post-meta"><p class="text-right"><?php echo $news_item['uudise_KUUPAEV']?></p></p>
			<?php if($this->isAuthenticated): ?><p class="blog-post-meta"><a href="<?php echo base_url()?>editor/update/<?php echo $news_item['uudise_ID']?>">Muuda</a>
			<a href="<?php echo base_url() ?>delete/<?php echo $news_item['uudise_ID']?>" onclick="return confirmDialog();">Kustuta</a></p><?php endif; ?>
		</div>




