<?php
require_once "db.php";
$sql = "SELECT * 
		FROM comments
		LEFT JOIN users
		ON comments.author_id = users.id
		LEFT JOIN articles
		ON comments.article_id=articles.id
		ORDER BY comments.pubdate DESC
		LIMIT 6";
$sth = $dbh->prepare($sql);
$sth->execute();
?>
<h5>Последние комментарии</h5>
<?php
while ($comment = $sth->fetch(PDO::FETCH_ASSOC)) {
	// var_dump($comment);
	?>
	<div class="comment">
  	  	<a class="avatar">
  	  	  <img src="img/<?php echo $comment['Аватар']??'elliot.jpg'; ?>">
  	  	</a>
  	  	<div class="content">
  	  	  <a class="author"><?php echo $comment['Имя']??$comment['nickname']; ?></a>
  	  	  <div class="metadata">
  	  	    <span class="date"><a href=?article=<?php echo $comment['article_id']?> ><i class="share icon"></i><?php echo $comment['title'] ?></a></span>
  	  	  </div>
  	  	  <div class="text"><?php echo $comment['text']; ?></div>
<!--   	  	  <div class="actions">
  	  	    <a class="reply">Ответить</a>
  	  	  </div> -->
  	  	</div>
  	</div>
	<?php
}


?>