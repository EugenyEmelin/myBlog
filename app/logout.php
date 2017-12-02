<?php 
session_start();

if (isset($_SESSION['user_id'])) {
	session_unset();
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time() - 3600);
	}
}
session_destroy();
// $home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php';
$home_url = 'index.php';
header('Location: '.$home_url);
?>