<?php
require_once "db.php"; 
	$comment_text = disinfect($_POST['comment_text']);
	$article_id = disinfect($_POST['article_id']);
	$author_id = $user->id;

	$sql = "INSERT INTO `comments` (author_id, , text, pubdate, article_id) VALUES (:author_id, :text, NOW(), :article_id)";

	$sth = $dbh->prepare($sql);
	$sth->bindParam(':author_id', $author_id, PDO::PARAM_STR);
	$sth->bindParam(':text', $comment_text, PDO::PARAM_STR);
	$sth->bindParam(':article_id', $article_id);
	$sth->execute();
	// echo $_GET['article'];
	$select_sql = "..."
?>