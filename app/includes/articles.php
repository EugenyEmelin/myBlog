<?php
require_once "db.php";
function articles_list() {
	global $dbh, $topics;
	// var_dump($topics);
	if (isset($_GET['topic']) && $_GET['topic'] != 'all') {
		$topic_get = $_GET['topic'];
		$sql = "SELECT `id`,`title`,`image`,`text`,`topic_id`,`pubdate`,`views` FROM articles WHERE topic_id = :topic ORDER BY `pubdate`";
	} else {
		$sql = "SELECT `id`,`title`,`image`,`text`,`topic_id`,`pubdate`,`views` FROM articles ORDER BY `pubdate`";
	}
	$sth = $dbh->prepare($sql);
	$sth->bindParam(':topic', $topic_get, PDO::PARAM_INT);
	$sth->execute();
	while ($article = $sth->fetch(PDO::FETCH_ASSOC)) {
 	 	$article_id = $article['id'];
	?>
	<div class="item">
 	 <div class="image">
    	<img src="img/<?php echo $article['image'] ? $article['image'] : 'article_default.png'; ?>">
 	 </div>
  	 <div class="content">
  	   <a href="?article=<?php echo $article_id; ?>" class="header"><?php echo $article['title']; ?></a>
  	   <div class="meta">

  	     	<!-- вывод категории -->
  	     <span class="cinema">Категория:
  	     <?php
  	     	foreach ($topics as $topic) {
  	     		if ($topic['id'] == $article['topic_id']) {
  	     			echo $topic['topic_name'];
  	     			break;
  	     		}
  	     	}
  	     ?>	
  	     </span>
  	     <!-- конец вывода категории-->
  	   </div>
  	   <div class="description">
  	     <p>Описание статьи</p>
  	   </div>
  	   <div class="extra">
  	     <div class="ui label">Тэг 1</div>
  	     <div class="ui label">Тэг 2</div>
  	   </div>
  	 </div>
	</div>
<?php
	}
}
// articles_list();
?>
