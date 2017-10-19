<?php 
require_once "db.php";

function topics_list() {
	global $dbh, $topics;
	$sql = "SELECT `id`,`topic_name` FROM topics";
	$sth = $dbh->prepare($sql);
	$sth->execute();
	// $topics = [];
	echo "<a href=\"?allcategories\" class=\"item active topics_list\">Все категории</a>";
	while ($topic = $sth->fetch(PDO::FETCH_ASSOC)) {
		$topics[] = $topic;
	?>
		 <a href="?<?php echo $topic['topic_name']; ?>" class="item topics_list"><?php echo $topic['topic_name']; ?></a>
	<?php
	}
	return $topics;
}
?>

