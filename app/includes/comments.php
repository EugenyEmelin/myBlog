<?php
require_once "db.php";
$article_id = $_GET['article'];
?>
<div class="ui comments">
  	<h3 class="ui header">Комментарии</h3>
	<!-- Form -->
  	<form class="ui reply form" method="POST" id="comment_guest_form">
  	  <div class="field">
  	 	 <div class="two fields">
			<div class="field">
  	  			<label>Ваше имя</label>
  	  			<input type="text" name="guest_name" placeholder="Ваше имя" id="guest_name">
			</div>
			<div class="field">
				<label>Email</label>
				<input type="text" name="guest_email" placeholder="email" id="guest_email">
			</div>
		</div>
  	    <textarea placeholder="Оставьте комментарий" name="comment_text" id="comment_text"></textarea>
  	  </div>
  	  <div class="ui submit icon button comment_guest_submit">Отправить комментарий</div>
  	  <input type="hidden" name="article_id" value="<?php echo $article_id; ?> ">
  	</form>
  	<!-- Comments -->
	<br>
	<div class="article_comments">
	<?php  
		$sql = "SELECT *
				FROM comments
				LEFT JOIN users
				ON comments.author_id = users.id
				WHERE article_id = :article_id
				ORDER BY comments.pubdate DESC";
		$sth = $dbh->prepare($sql);
		$sth->bindParam(':article_id', $article_id, PDO::PARAM_INT);
		$sth->execute();
		while ($comment = $sth->fetch(PDO::FETCH_ASSOC)) {
			$name = $comment['nickname'] != null ? $comment['nickname'].' (Гость)' : $comment['Имя'];
			$pubdate = $comment['pubdate'];
			$text = $comment['text'];
			$avatar = $comment['Аватар'] ?? 'elliot.jpg';
			?>
			<div class="comment">
  	  			<a class="avatar">
  	  			  <img src="img/<?php echo $avatar; ?>">
  	  			</a>
  	  			<div class="content">
  	  			  <a class="author"><?php echo $name; ?></a>
  	  			  <div class="metadata">
  	  			    <span class="date"><?php echo $pubdate; ?></span>
  	  			  </div>
  	  			  <div class="text"><?php echo $text; ?></div>
  	  			  <div class="actions">
  	  			    <a class="reply">Reply</a>
  	  			  </div>
  	  			</div>
  			</div>
			<?php
		}
	?>
  		</div>
	</div>
<?php
?>