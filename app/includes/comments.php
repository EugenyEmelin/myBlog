<?php
require_once "db.php";
?>
<div class="ui comments">
  		<h3 class="ui header">Комментарии</h3>

		<!-- Form -->
  		<form class="ui reply form">
  		  <div class="field">
  		 	 <div class="two fields">
				<div class="field">
  		  			<label>Ваше имя</label>
  		  			<input type="text" name="guestname" placeholder="Ваше имя">
				</div>
				<div class="field">
					<label>Email</label>
					<input type="text" name="guestemail" placeholder="email">
				</div>
			</div>
  		    <textarea placeholder="Оставьте комментарий"></textarea>
  		  </div>
  		  <div class="ui submit icon button">Отправить комментарий</div>
  		</form>

  		<!-- Comments -->
		<br>
		<?php  
		function comments() {
			global $dbh;
			$article_id = $_GET['article'];
			$sql = "SELECT *
					FROM comments
					LEFT JOIN users
					ON comments.author_id = users.id
					WHERE article_id = :article_id;
					ORDER BY pubdate";
			$sth = $dbh->prepare($sql);
			$sth->bindParam(':article_id', $article_id, PDO::PARAM_INT);
			$sth->execute();
			while ($comment = $sth->fetch(PDO::FETCH_ASSOC)) {
				$name = $comment['nickname'] != null ? $comment['nickname'].' (Гость)' : $comment['Имя'];
				$pubdate = $comment['pubdate'];
				$text = $comment['text'];
				$avatar = $comment['Аватар'] != null ? $comment['Аватар'] : 'elliot.jpg';
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
		}
		comments();
		?>
  		
	</div>
<?php
?>