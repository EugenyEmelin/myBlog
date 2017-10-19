<?php  
require_once "config.php";
$dsn = $config['db']['db_type'].':dbname='.$config['db']['dbname'].';host='.$config['db']['server'];
$user = $config['db']['username'];
$password = $config['db']['password'];

try {
	$dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
	echo $error_connect = '<br><br><br>Подключение не удалось:' . $e->getMessage();
	exit();
}

?>