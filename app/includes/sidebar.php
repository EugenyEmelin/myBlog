<div class="sidebar"> 
   <div class="ui vertical text menu">
     <div class="header item">Сортировка</div>
     <a class="item">Новые </a>
     <a class="item active">Самые обсуждаемые</a>
     <a class="item">Самые читаемые</a>
   </div>
   <div class="ui feed">
      <h5>Популярные статьи</h5>
     <?php popular_articles('views', 5) ?>
   </div>
   <div class="ui small feed">
     <h5>Последние комментарии</h5>
     <div class="event">
       <div class="label">
         <img src="img/helen.jpg">
       </div>
       <div class="content">
         <div class="date">3 дня назад </div>
         <div class="summary"><a>Лаура Фокет</a> добавила комментарий</div>
         <div class="extra text">Хочешь посмотреть, что происходит в Израиле? Ты можешь в это поверить. </div>
       </div>
     </div>
   </div>
  </div>
