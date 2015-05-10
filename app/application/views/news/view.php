<div class="row">
	<div class="col-sm-8 blog-main">
		<div class="blog-post">
			<h2 class="blog-post-title"><?php echo $news_item['uudise_PEALKIRI'] ?></h2>
			<img src="<?php echo $news_item['uudise_PILT'] ?>" alt="Uudise pilt" class="img-thumbnail" style="min-height:500px;height:500px;">
			<br><br><p class="text-justify"><?php echo $news_item['uudise_TEKST'] ?></p>
			<hr>
			<p class="blog-post-meta"><?php echo $news_author['kasutaja_EESNIMI'].' '.$news_author['kasutaja_PERENIMI'].' '.$news_author['kasutaja_EMAIL'] ?></p>
			<p class="blog-post-meta"><p class="text-right"><?php echo $news_item['uudise_KUUPAEV']?></p>
		</div>
	</div>


