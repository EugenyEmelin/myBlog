<?php
require_once "db.php";
$isAuthorized = isset($_SESSION['user_id']) ? true : false;
?>
<header class="main-header">
  <div class="header_left_wrape">
    <a href="<?php echo $_SERVER['PHP_SELF'] ?> "><div class="logo-wrap header-item">
      <i class="big spy icon"></i>
      <span id="blogname">BLOGGY</span>
    </div></a>
    <div class="ui fluid category search header-item">
      <div class="ui icon input">
        <input id="header-search" class="prompt" type="text" placeholder="Поиск . . .">
        <i class="search icon"></i>
      </div>
      <div class="results"></div>
    </div>
  </div>

  <div class="header_right_wrape">
  <?php 
  if ($isAuthorized) { //для авторизованных пользователей
  ?>
    <div class="user_header_interface">
      <!-- <div class="header-item"><i class="large grey alarm icon"></i> </div> -->
      <div class="header-item" id="user-item">
        <span><?php echo $_SESSION['user_name'] ?? 'username' ?>
          <img class="ui avatar image user_mini_avatar" src="img/<?php echo $_SESSION['user_img'] ?? 'default.png'?>">
        </span>
      </div>
      <?php include "mini_profile.php"; ?>
    </div>
  <?php 
  } else { //для гостей
  ?>
  <div class="guest_header_interface">
      <i class="add user large icon" id="reg_button"></i>
      <i class="sign in big icon" id="login_button"></i>
   </div>
  <?php
  }
  ?>
  </div>

  <div class="ui mini modal" id="login_modal">
    <div class="header">Вход</div>
    <div class="content">
      <form class="ui form" id="login_form">
        <div class="field">
          <label>E-mail</label>
          <input type="email" name="user_log_email" placeholder="Email">
        </div>
        <div class="field">
          <label>Пароль</label>
          <input type="password" name="user_log_password" placeholder="Пароль">
        </div>
        <br>
        <!-- <div class="actions"> -->
        <div class="ui primary approve button" id="login">Войти</div>
        <div class="ui checkbox">
          <input type="checkbox" name="remember" value="me">
          <label>Запомнить</label>
        </div>
        <div class="ui error message"></div>
        <!-- </div> -->
      </form>
    </div>
  </div>
  
  <div class="ui tiny modal" id="reg_modal">
    <div class="header">Регистрация</div>
    <div class="content">
      <form class="ui form" id="registration_form">
        <div class="field">
          <div class="two fields">
            <div class="field">
              <label>Имя</label>
              <input type="text" name="user_fname" placeholder="Ваше имя">
            </div>
            <div class="field">
              <label>Фамилия</label>
              <input type="text" name="user_lname" placeholder="Фамилия">
            </div>
          </div>
        </div>
        <div class="field">
          <label>Email</label>
          <input type="email" name="user_email" placeholder="Email">
        </div>
        <div class="field">
          <label>Пароль</label>
          <input type="password" name="user_password" placeholder="Пароль (мин. 6 символов)">
        </div>
        <div class="field">
          <label>Повторите пароль</label>
          <input type="password" name="re_user_password" placeholder="Введите пароль ещё раз">
        </div>
        <div class="field">
          <div class="ui checkbox">
            <input type="checkbox" tabindex="0" class="hidden">
            <label>Согласен с <a><i>условиями</i></a></label>
          </div>
        </div>
        <div class="ui primary submit button" id="registration">Регистрация</div>
        <div class="ui error message"></div>
      </form>
    </div>
  </div>
</header>