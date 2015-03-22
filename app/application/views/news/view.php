<?php
echo '<h2>'.$news_item['uudise_PEALKIRI'].'</h2>';
echo $news_item['uudise_TEKST'].'<br>';
echo 'Autor: '.$news_author['kasutaja_EESNIMI'].' '.$news_author['kasutaja_PERENIMI'].' '.$news_author['kasutaja_EMAIL'].'<br>';
//echo '<input type="button" name="Edit" value="Muuda"/><br>';
//echo '<input type="submit" name="Delete" value="Kustuta"<br>';

$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<a href='$url'>Kõik uudised</a><br>";

