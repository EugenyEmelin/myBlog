<?php 
require_once "db.php";

function topics_list() {
	global $dbh, $topics;
	$sql = "SELECT `id`,`topic_name` FROM topics";
	$sth = $dbh->prepare($sql);
	$sth->execute();
	echo "<a href=\"?topic=all\" class=\"item active topic_item\">Все категории</a>";
	while ($topic = $sth->fetch(PDO::FETCH_ASSOC)) {
		$topics[] = $topic;
	?>
		 <a href="?topic=<?php echo $topic['id']; ?>" class="item topic_item"><?php echo $topic['topic_name']; ?></a>
	<?php
	}
	return $topics;
}
?>

