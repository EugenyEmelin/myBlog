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

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($pass1) && !empty($pass2)) {
	if ($pass1 != $pass2) {$pass_err = "Пароли не совпадают!"; $error = true;}
	elseif (!preg_match('/^\w{2,20}+$/', $fname)) {$fname_err = "Имя не должно содержать цифр и быть менее 2 и более 20 символов. "; $fname = ""; $error = true;} 
	elseif (!preg_match('/^\w{2,25}$/', $lname)) {$lname_err = "Фамилия не должна содержать цифр и быть менее 2 и более 25 символов. "; $lname = ""; $error = true;}
	elseif (!preg_match('/^\w+[\w._]*@/', $email)) {$email_err = "Некорректный формат email. "; $email = ""; $error = true;}
	elseif (!preg_match('/^\d{6,}$/', $pass1)) {$pass_err = "Пароль должен быть более 5 символов. "; $pass1 = ""; $pass2 = ""; $error = true;}
	else {$error = false;}
	if (!$error) {
		$sql = "SELECT email FROM users WHERE email = :email";
		$sth = $dbh->prepare($sql);
		$sth->bindParam(':email', $email, PDO::PARAM_STR);
		$sth->execute();
		if (!$sth->fetch()) { //есои запрос не извлёк ниодной строки
			$sql2 = "INSERT INTO users (Имя, Фамилия, email, Пароль)
					 VALUES (:fname, :lname, :email, :pass)";
			$sth2 = $dbh->prepare($sql2);
			$sth2->bindParam(':fname', $fname, PDO::PARAM_STR);
			$sth2->bindParam(':lname', $lname, PDO::PARAM_STR);
			$sth2->bindParam(':email', $email, PDO::PARAM_STR);
			$sth2->bindParam(':pass', $pass1, PDO::PARAM_STR);
			$sth2->execute();
			// echo "Пользователь добавлен";
		} else {
			// echo "Пользователь с таким email уже существует";
			$err_msg .= "Пользователь с таким email уже существует";
		}
	} else {
		// echo $fname_err.$lname_err.$email_err.$pass_err;
		$err_msg .= $fname_err.$lname_err.$email_err.$pass_err;
	}
} else {
	$err_msg .= "Заполните все поля. ";
}


?>