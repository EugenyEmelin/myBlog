<div class="sidebar"> 
   <div class="ui vertical text menu">
     <div class="header item">Сортировка</div>
     <a class="item">Новые </a>
     <a class="item active">Самые обсуждаемые</a>
     <a class="item">Самые читаемые</a>
   </div>
   <div class="ui sub header">Тэги</div>
   <div class="ui fluid multiple search selection dropdown">
     <input name="tags" type="hidden">
     <i class="dropdown icon"></i>
     <div class="default text">Все тэги</div>
     <div class="menu">
       <div class="item" data-value="angular">Angular</div>
       <div class="item" data-value="css">CSS</div>
       <div class="item" data-value="design">Graphic Design</div>
       <div class="item" data-value="ember">Ember</div>
       <div class="item" data-value="html">HTML</div>
       <div class="item" data-value="ia">Information Architecture</div>
       <div class="item" data-value="javascript">Javascript</div>
       <div class="item" data-value="mech">Mechanical Engineering</div>
       <div class="item" data-value="meteor">Meteor</div>
       <div class="item" data-value="node">NodeJS</div>
       <div class="item" data-value="plumbing">Plumbing</div>
       <div class="item" data-value="python">Python</div>
       <div class="item" data-value="rails">Rails</div>
       <div class="item" data-value="react">React</div>
       <div class="item" data-value="repair">Kitchen Repair</div>
       <div class="item" data-value="ruby">Ruby</div>
       <div class="item" data-value="ui">UI Design</div>
       <div class="item" data-value="ux">User Experience</div>
     </div>
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
   <div class="ui feed">
      <h5>Популярные статьи</h5>
     <?php popular_articles('views', 5) ?>
   </div>
  </div>
