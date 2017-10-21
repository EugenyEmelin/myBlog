<?php  
require 'includes/config.php';
require 'includes/topics.php';
require 'includes/articles.php';
require 'includes/article.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $config['title']; ?></title>
	<link rel="stylesheet" type="text/css" href="../semantic/out/semantic.min.css">
  <link rel="stylesheet" href="css/app.css">
	<script src="libs/jquery/dist/jquery.min.js"></script>
	<script src="../semantic/out/semantic.min.js"></script>
  <script src="js/ui-activator.js"></script>

</head>
<?php include "includes/header.php"; ?>
<section class="content">
  <!-- categories -->
  <div class="categories">
      <div class="ui small secondary fluid vertical menu">
        <?php 
          $topics = [];
          topics_list(); 
        ?>
      </div>
  </div>

  <!-- articles -->
  <div class="ui fluid articles-bar">
      <div class="ui divided fluid articles_wrap items">
        <?php
          if (isset($_GET['article'])) {
            show_article();
          } else {
            articles_list(); 
          }
        ?>
      </div>
  </div>

   <!-- sidebar -->
  <?php include "includes/sidebar.php"; ?> 
    
</section>