<?php  
require_once "config.php";
$dsn = $config['db']['db_type'].':dbname='.$config['db']['dbname'].';host='.$config['db']['server'];
$user = $config['db']['username'];
$password = $config['db']['password'];

try {
	$dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_FOUND_ROWS => true));
} catch (PDOException $e) {
	echo $error_connect = '<br><br><br>Подключение не удалось:' . $e->getMessage();
	exit();
}
function topic($article) {
	global $topics;
	foreach ($topics as $topic) {
  		if ($topic['id'] == $article['topic_id']) {
  			echo $topic['topic_name'];
  			break;
  		}
  	}
}
function disinfect($var) {
	$var = trim($var);
	$var = strip_tags($var);
	$var = htmlentities($var);
	$var = stripslashes($var);
	return $var;
}


?>