<?php 
require_once "db.php";
$err_msg = "";
$fname_err = "";
$lname_err = "";
$email_err = "";
$pass_err = "";
$error = false;

$fname = disinfect($_POST['user_fname']);
$lname = disinfect($_POST['user_lname']);
$email = disinfect($_POST['user_email']);
$pass1 = disinfect($_POST['user_password']);
$pass2 = disinfect($_POST['re_user_password']);
//debug
echo var_dump($_POST);
echo $_POST['user_fname']??'Нет user_fname ';
echo $_POST['user_lname']??'Нет user_lname ';
echo $_POST['user_email']??'Нет user_email ';
echo $_POST['re_user_password']??'Нет re_user_password ';

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($pass1) && !empty($pass2)) {
	if ($pass1 != $pass2) {$pass_err = "\n Пароли не совпадают!"; $error = true;}
	elseif (!preg_match('/^\w{2,20}+$/u', $fname)) {
		$fname_err = "\n Имя не должно содержать цифры и быть менее 2 и более 20 символов. "; $fname = ""; $error = true;
	} 
	elseif (!preg_match('/^\w{2,25}$/u', $lname)) {
		$lname_err = "\n Фамилия не должна содержать цифры и быть менее 2 и более 25 символов. "; $lname = ""; $error = true;
	}
	elseif (!preg_match('/^\w+[\w._]*@/', $email)) {
		$email_err = "\n Некорректный формат email. "; $email = ""; $error = true;
	}
	elseif (!preg_match('/^\w{6,}$/', $pass1)) {
		$pass_err = "\n Пароль должен быть более 5 символов. Из букв допускаются только латинские символы"; $pass1 = ""; $pass2 = ""; $error = true;
	} else {
		$error = false;
	}
	if (!$error) {
		$sql = "SELECT email FROM users WHERE email = :email";
		$sth = $dbh->prepare($sql);
		$sth->bindParam(':email', $email, PDO::PARAM_STR);
		$sth->execute();
		if (!$sth->fetch()) { //если запрос не извлёк ни одной строки
			$sql2 = "INSERT INTO users (Имя, Фамилия, email, Пароль)
					 VALUES (:fname, :lname, :email, :pass)";
			$sth2 = $dbh->prepare($sql2);
			$sth2->bindParam(':fname', $fname, PDO::PARAM_STR);
			$sth2->bindParam(':lname', $lname, PDO::PARAM_STR);
			$sth2->bindParam(':email', $email, PDO::PARAM_STR);
			$sth2->bindParam(':pass', password_hash($pass1, PASSWORD_DEFAULT), PDO::PARAM_STR);
			$sth2->execute();
			// echo "Пользователь добавлен";
		} else {
			$err_msg .= "Пользователь с таким email уже существует";
			echo "Пользователь с таким email уже существует";
		}
	} else {
		// echo $fname_err.$lname_err.$email_err.$pass_err;
		$err_msg .= $fname_err.$lname_err.$email_err.$pass_err;
	}
} else {
	$err_msg .= "Заполните все поля. ";
}
echo $err_msg;

?>