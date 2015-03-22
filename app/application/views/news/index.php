<?php echo '<p><a href="editor">Logi sisse</a></p><hr><br>' ?>
<?php foreach ($uudis as $news_item): ?>

    <p><a href="news/<?php echo $news_item['uudise_ID'] ?>"><h2><?php echo $news_item['uudise_PEALKIRI'] ?></h2></a></p>
    <div class="main">
		<a href="news/<?php echo $news_item['uudise_ID'] ?>"><?php echo $news_item['uudise_PILT'] ?></a><br>
        <?php echo $news_item['uudise_EELVAADE']?>
    </div>

<?php endforeach ?>

<?php echo '<hr><p><h2>Kommenteeritumad uudised</h2></p>' ?>

<?php foreach ($news_stats as $news_stats): ?>
	<a href="news/<?php echo $news_stats['uudise_ID'] ?>"><?php echo $news_stats['uudise_PEALKIRI']?></a>
	<?php echo ' | '.$news_stats['count'].'<br>'?>
<?php endforeach ?>

<?php echo '<br><hr><p></p><a href="editor/create">Lisa uudis</a></p>' ?>
