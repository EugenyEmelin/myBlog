<?php
require_once "db.php";
function articles_list() {
	global $dbh, $topics;
	$sql = "SELECT `id`,`title`,`image`,`text`,`topic_id`,`pubdate`,`views` FROM articles";
	$sth = $dbh->prepare($sql);
	$sth->execute();
	while ($article = $sth->fetch(PDO::FETCH_ASSOC)) {
	?>
	<div class="item">
 	 <div class="image">
 	 	<?php 
 	 		$article_img = !empty($article['image']) ? $article['image'] : 'article_default.png';
    		echo "<img src=\"img/$article_img\">"
 	 	?>
 	 </div>
  	 <div class="content">
  	   <a class="header"><?php echo $article['title']; ?></a>
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
?>
