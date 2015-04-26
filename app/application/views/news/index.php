<p><a href="login">Logi sisse</a></p>
<script type="text/javascript" src="<?php echo base_url("assets/js/ajaxCall.js"); ?>"></script>

<hr>

<div class="row">
	<div id="uudised" class="col-sm-8 blog-main">

<?php foreach ($uudis as $news_item): ?>
		<div id="<?php echo $news_item['uudise_ID'] ?>" class="blog-post">
			<h2 class="blog-post-title"><a href="news/<?php echo $news_item['uudise_ID'] ?>"><?php echo $news_item['uudise_PEALKIRI'] ?></a></h2>
			<div class="row">
				<div class="col-sm-4">
					<a href="news/<?php echo $news_item['uudise_ID'] ?>"><img src="<?php echo $news_item['uudise_PILT'] ?>" alt="Uudise pilt" class="img-thumbnail" style="min-height:200px;height:200px;">
				</div>
			<p class="text-justify"><?php echo $news_item['uudise_EELVAADE']?></p>
			</div>
			<br><p class="blog-post-meta"><p class="text-right"><?php echo $news_item['uudise_KUUPAEV']?></p>
			<hr>
		</div>
<?php endforeach ?>
	</div>
