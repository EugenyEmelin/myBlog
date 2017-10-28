<div class="sidebar"> 
  
  <?php if (!isset($_GET['article'])): ?>

   <div class="ui vertical text menu">
     <div class="header item">Сортировка</div>
     <a class="item">Новые </a>
     <a class="item active">Самые обсуждаемые</a>
     <a class="item">Самые читаемые</a>
   </div>

   <br>
  <?php endif ?>

   <div class="ui feed">
      <h5>Популярные статьи</h5>
     <?php popular_articles('views', 5) ?>
   </div>
   <!-- Последние комментарии -->
   <br>
   <div class="ui small feed">
     <div class="ui comments last_comments_wrape">
      <?php if (!isset($_GET['article'])) include "last_comments.php"; ?>
     </div>
   </div>

  </div>
