<?php
require_once "db.php";
	$guest_name = disinfect($_POST['guest_name']); 
	$guest_email = disinfect($_POST['guest_email']); 
	$comment_text = disinfect($_POST['comment_text']);
	$articleid = disinfect($_POST['article_id']);

	$sql = "INSERT INTO `comments` (nickname, email, text, pubdate, article_id) VALUES (:guest_name, :guest_email, :text, NOW(), :articleid)";

	$sth = $dbh->prepare($sql);
	$sth->bindParam(':guest_name', $guest_name, PDO::PARAM_STR);
	$sth->bindParam(':guest_email', $guest_email, PDO::PARAM_STR);
	$sth->bindParam(':text', $comment_text, PDO::PARAM_STR);
	$sth->bindParam(':articleid', $articleid);
	$sth->execute();
	// echo $_GET['article'];
?>