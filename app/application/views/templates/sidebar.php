	<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
		<div class="sidebar-module">
			<h4>Kommenteeritumad uudised</h4>

			<?php foreach ($news_stats as $news_stats): ?>
				<ol class="list-unstyled">
					<li>
						<a href="<?php echo base_url(); ?>news/<?php echo $news_stats['uudise_ID'] ?>"><?php echo $news_stats['uudise_PEALKIRI']?></a>
						<?php echo ' '.$news_stats['count'].'<br>'?>
					</li>
				</ol>
			<?php endforeach ?>
		</div>
	</div>
