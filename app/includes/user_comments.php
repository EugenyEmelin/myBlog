<?php
require_once "db.php"; 
	$comment_text = disinfect($_POST['comment_text']);
	$article_id = disinfect($_POST['article_id']);
	$author_id = disinfect($_SESSION['user_id']);
	$err_msg = "";

	if ($comment_text && $article_id && $author_id) {
		$sql = "INSERT INTO `comments` (id, author_id, , text, pubdate, article_id) VALUES (0, :author_id, :text, NOW(), :article_id)";
		$sth = $dbh->prepare($sql);
		$sth->bindParam(':author_id', $author_id, PDO::PARAM_STR);
		$sth->bindParam(':text', $comment_text, PDO::PARAM_STR);
		$sth->bindParam(':article_id', $article_id);
		$sth->execute();
		$row =  $sth->fetch();
		echo $row['id'];
	} else {
		$err_msg = "Упс, ошибочка :( Не получилось добавить комментарий";
	}
?>