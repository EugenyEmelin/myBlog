<?php
require_once "db.php"; 
	$author_id = disinfect($_POST['id']);
	$comment_text = disinfect($_POST['text']);
	$article_id = disinfect($_POST['articleid']);
	$err_msg = "";

	if ($comment_text && $article_id && $author_id) {
		$sql = "INSERT INTO `comments` (author_id, text, pubdate, article_id) VALUES (:author_id, :text, NOW(), :article_id)";
		$sth = $dbh->prepare($sql);
		$sth->bindParam(':author_id', $author_id, PDO::PARAM_STR);
		$sth->bindParam(':text', $comment_text, PDO::PARAM_STR);
		$sth->bindParam(':article_id', $article_id);
		$sth->execute();
	} else {
		$err_msg = "Не получилось добавить комментарий";
	}
	// var_dump($_POST);
	var_dump($_SESSION);
	?>
	<div class="comment">
		<a class="avatar">
			<img src="img/<?php echo $_SESSION['user_img'] ?? 'default.png'?>">
		</a>
		<div class="content">
			<a class="author">
				<?php echo $_SESSION['user_name'] ?? 'User'?>
			</a>
			<div class="metadata">
				<span class="date">
					<?php
						date_default_timezone_set('Europe/Moscow');
						echo date("Y-m-d H:i:s"); 
					?>
				</span>
			</div>
			<div class="text">
				<?php echo $comment_text ?>
			</div>
			<div class="actions">
				<a class="reply">Reply</a>
			</div>
		</div>
	</div>
	<?php

?>