<?php
require_once "db.php";
$article_id = $_GET['article'];
// $entered = false;
?>

<div class="ui comments">
  	<h3 class="ui dividing header">Комментарии</h3>
	<!-- Form -->
	<?php 
	if (!isset($_SESSION['user_id'])) { //для гостей выводить такую форму
	?>
  		<form class="ui reply form" id="comment_guest_form">
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
  		  <div class="ui tiny error message"></div>
  		</form>
  	<?php
  	} else { //для пользователей выводить такую форму
  	?>
  		<form class="ui reply form" method="POST" id="comment_user_form">
  		<div class="two fields">	
			<div class="field user_avatar_comment">
				<a href="" class="avatar">
					<img src="img/elliot.jpg">
				</a>
			</div>
			<div class="field user_text_area">
				<textarea name="comment_text" id="comment_text"></textarea>
			</div>
		</div>
		<div class="button_wrap">
			<div class="ui submit icon right floated button comment_user_submit" 
				data-userid="<?php echo $_SESSION['user_id'] ?? '' ?>"
				data-articleid="<?php echo $article_id ?? '' ?>">
				Отправить комментарий
			</div>	
		</div>
  		<input type="hidden" name="article_id" value="<?php echo $article_id; ?> ">
  		<input type="hidden" name="user_id" value="<?php echo $user_id ?? ''; ?> ">
  		</form>
  	<?php
  	}
  	?>
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
			$name = $comment['nickname'] != null ? $comment['nickname'].' (Гость)' : $comment['Имя']. ' '. $comment['Фамилия'];
			$pubdate = $comment['pubdate'];
			$text = $comment['text'];
			$avatar = $comment['Аватар'] ?? 'default.png';
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