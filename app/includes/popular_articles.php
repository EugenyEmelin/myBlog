<?php 
require_once "db.php";
function popular_articles($crit, $limit) {
	global $dbh, $topics;
	$sql = "SELECT `id`,`title`,`image`,`article_text`,`topic_id`,`pubdate`,`views` FROM articles ORDER BY $crit LIMIT $limit";
	$sth = $dbh->prepare($sql);
	$sth->execute();
	while ($article = $sth->fetch(PDO::FETCH_ASSOC)) {
		?>
		<div class="event pop_article">
    		<div>
    		  <img src="img/<?php echo $article['image']?$article['image']:'article_default.png' ?>" class="ui mini right spaced rounded image">
    		</div>
    		<div class="content">
    		  <div class="summary"><a href="?article=<?php echo $article['id'] ?> "><?php echo $article['title'] ?></a></div>
    		  <span class="meta">Категория: <a href=""><?php topic($article) ?></a></span>
    		</div>
 		</div>
 		<?php
	}
}

	
?>
