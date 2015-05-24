	<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
		<div class="sidebar-module">
			<h4>Vaadatuimad uudised</h4>

			<?php foreach ($news_stats2 as $news_stats2): ?>
				<ol class="list-unstyled">
					<li>
						<a href="<?php echo base_url(); ?>news/<?php echo $news_stats2['uudise_ID'] ?>"><?php echo $news_stats2['uudise_PEALKIRI']?></a>
						<?php echo ' '.$news_stats2['uudise_vaatamised'].'<br>'?>
					</li>
				</ol>
			<?php endforeach ?>
		</div>
	</div>
