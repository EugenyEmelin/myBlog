<div class="sidebar"> 
   <div class="ui vertical text menu">
     <div class="header item">Сортировка</div>
     <a class="item">Новые </a>
     <a class="item active">Самые обсуждаемые</a>
     <a class="item">Самые читаемые</a>
   </div>
   <br>
   <div class="ui feed">
      <h5>Популярные статьи</h5>
     <?php popular_articles('views', 5) ?>
   </div>
   <!-- Последние комментарии -->
   <br>
   <div class="ui small feed">
     <h5>Последние комментарии</h5>
     <div class="ui comments last_comments_wrape">
      <?php include "last_comments.php"; ?>
     </div>
   </div>

  </div>
