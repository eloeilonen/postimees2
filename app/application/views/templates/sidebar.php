<div class="col-sm-3 col-sm-offset-1 blog-sidebar" style="background-color:lavender;">
	<div class="sidebar-module">
		<h2>Kommenteeritumad uudised</h2>

<?php foreach ($news_stats as $news_stats): ?>
	<ol class="list-unstyled">
		<li>
			<a href="news/<?php echo $news_stats['uudise_ID'] ?>"><?php echo $news_stats['uudise_PEALKIRI']?></a>
			<?php echo ' | '.$news_stats['count'].'<br>'?>
		</li>
	</ol>
<?php endforeach ?>
	</div>
</div>
</div>
