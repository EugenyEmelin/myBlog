<?php  
require_once "db.php";
// require_once "comments.php";	
function show_article() {
	global $dbh, $topics, $config;
	$article_id = $_GET['article'];
	$sql = "SELECT `id`,`title`,`image`,`article_text`,`topic_id`,`pubdate`,`views` FROM articles WHERE id = :article_id";
	$sth = $dbh->prepare($sql);
	$sth->bindParam(':article_id', $article_id, PDO::PARAM_INT);
	$sth->execute();
	$article = $sth->fetch(PDO::FETCH_ASSOC);
	$title = $article['title'];
	foreach ($topics as $topic) {
  		if ($topic['id'] == $article['topic_id']) {
  			$topic_name = $topic['topic_name'];
  			break;
  		}
  	}
?>
	<div class="segment article_wrap">
		<div class="ui small breadcrumb article_navigation">
			<a href="<?php echo $config['main_page']; ?>" class="section">Категории</a>
  			<i class="right angle icon divider"></i>
  			<a href="index.php?topic=<?php echo $topic['id']; ?>" class="section"><?php echo $topic_name; ?></a>
  			<i class="right angle icon divider"></i>
  			<div class="active section"><?php echo $article['title']; ?></div>
		</div>
		<h3 class="ui header"><?php echo $title; ?></h3>
		<img class="ui medium image" src="img/<?php echo $article['image'] ? $article['image'] : 'article_default.png'; ?>"> 
		<br>
		<p><?php echo $article['article_text']; ?></p>
		<p>`Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Букв всемогущая все дороге за составитель толку. Вскоре до, составитель однажды. Однажды заманивший ipsum жаренные первую большой послушавшись, от всех семантика страна заголовок языком вскоре силуэт до продолжил путь себя правилами курсивных, осталось, текста своих. Взгляд, рыбного щеке страна послушавшись живет. Букв несколько грамматики, безорфографичный запятой переписали коварный подпоясал точках предупреждал! Единственное, над сбить, бросил выйти дал путь возвращайся использовало курсивных, точках взобравшись безопасную подпоясал послушавшись о меня своего речью, осталось большой. Меня, большой. Все, собрал ipsum оксмокс, свою, вскоре, жаренные от всех имеет проектах моей они свой сбить снова вопроса маленький.</p>
		<p>Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Lorem его запятых использовало рот? Продолжил, своего, она. Прямо которой это до всемогущая необходимыми грустный щеке своего lorem приставка. Даже пунктуация, ipsum подпоясал своих, вопроса, текста что по всей, моей дороге деревни злых силуэт путь он реторический рот первую переулка послушавшись предложения единственное толку. Речью сбить пояс, города прямо коварный осталось!</p>
	</div>	
	<!-- Комментарии -->
<?php

	include "comments.php";
	// comments();
}
?>