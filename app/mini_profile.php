<?php 
require_once "config.php";
?>
<div class="ui popup bottom right transition mini-profile">
  <div class="card">
      <div class="card-content">
        <div class="meta">emelin1990.eug@ya.ru</div>
        <br>
        <img class="left floated circular tiny ui image" src="img/<?php echo $_SESSION['user_img'] ?? '../img/default.png' ?>">
        <div class="header"><?php echo $_SESSION['user_name'] ?? 'username' ?></div>
        <br>
        <div class="description">Напишите тут коротко о себе...</div>
      </div>
      <div class="extra content">
          <a href="logout.php">
            <button class="ui blue exit button">Выход</button>
          </a>
      </div>
  </div>
</div>