<?php
session_start();
ini_set('default_charset', 'UTF-8');
mb_internal_encoding("UTF-8");

// if (!isset($_SESSION['user_id'])) { //Если переменные сессий не имеют значений
//   if (isset($_COOKIE['user_id'])) { #Если в куки записан id пользователя
//     $_SESSION['user_id'] = $_COOKIE['user_id']; #присваиваем переменной сессии аналогичное значение куки
//   }
// }

$config = [
	'main_page' => 'index.php',
	'title' => 'BLOG',
	'vk_link' => 'https://vk.com/id17150827',
	'github_link' => 'https://github.com/EugenyEmelin',
	'db' => [
		'db_type' => 'mysql',
		'server' => '127.0.0.1',
		'username' => 'root',
		'password' => '151190qqq',
		'dbname' => 'blog'
	]
];
$main_page = $config['main_page'];
?>