</head><body>
<?php echo '<p><a href="editor">Logi sisse</a></p><hr><br>' ?>
<?php foreach ($uudis as $news_item): ?>

    <h2><a href="news/<?php echo $news_item['uudise_ID'] ?>"><?php echo $news_item['uudise_PEALKIRI'] ?></a></h2>
    <div class="main">
		<a href="news/<?php echo $news_item['uudise_ID'] ?>"><?php echo $news_item['uudise_PILT'] ?></a><br>
        <?php echo $news_item['uudise_EELVAADE']?><br>
        <?php echo $news_item['uudise_KUUPAEV']?>
    </div>

<?php endforeach ?>

<?php echo '<hr><h2>Kommenteeritumad uudised</h2>' ?>

<?php foreach ($news_stats as $news_stats): ?>
	<a href="news/<?php echo $news_stats['uudise_ID'] ?>"><?php echo $news_stats['uudise_PEALKIRI']?></a>
	<?php echo ' | '.$news_stats['count'].'<br>'?>
<?php endforeach ?>


<?php /*echo '<br><hr><p><a href="editor/create">Lisa uudis</a></p>'  */ ?>
