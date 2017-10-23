<?php 
require_once "db.php";

function topics_list() {
	global $dbh, $topics;
	$sql = "SELECT `id`,`topic_name` FROM topics";
	$sth = $dbh->prepare($sql);
	$sth->execute();
	?>
	<a href="?topic=all" class="item <?php if (isset($_GET['topic'])) echo $_GET['topic']=='all'?'active':''; ?> topic_item">Все категории</a>
	<?php
	while ($topic = $sth->fetch(PDO::FETCH_ASSOC)) {
		$topics[] = $topic;
	?>
		 <a href="?topic=<?php echo $topic['id']; ?>" class="item <?php check_active($topic); ?> topic_item"><?php echo $topic['topic_name']; ?></a>
	<?php
	}
	return $topics;
}
function check_active($arr) {
	if (isset($_GET['topic'])) {
		echo $_GET['topic'] == $arr['id'] ? 'active' : '';
	}
}

?>

