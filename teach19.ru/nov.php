<!DOCTYPE>
<?php
require "includes/configur.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Училка</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/nov.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/jquery.jcarousel.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/menu.css" type="text/css" media="all" />
<!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
<link rel="shortcut icon" href="css/images/favicon.ico" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.pack.js"></script>
<script type="text/javascript" src="js/func.js"></script>
</head>
<body>
<div class="shell">
  <div class="border">
    <div id="header">
      <h1 id="logo"><a href="#" class="notext">Училка</a></h1>
      <h1 id="logo2">Сайт учителя русского языка</h1>
      <div class="cl">&nbsp;</div>
    </div>
     <div class="menu" id="menu"> <!--Меню-->
        <a href="index.php">Главная</a>
        <a class="active" href="nov.php">Новости</a>
        <a href="med.php">Методические материалы</a>
        <a href="moi.php">Мой класс</a>
        <a href="rod.php">Родителям</a> 
    </div>
    <div class="slider">
      <div class="slider-nav"> <a href="#" class="left notext">1</a> <a href="#" class="left notext">2</a> <a href="#" class="left notext">3</a>
        <div class="cl">&nbsp;</div>
      </div>
      <ul>
        <li>
          <div class="item">
            <div class="text">
              <h3><em>Обучайся</em></h3>
              <h2><em> ________</em></h2>
            </div>
            <img src="css/images/i.jpg" alt="" /> </div>
        </li>
        <li>
          <div class="item">
            <div class="text">
              <h3><em>Познавай</em></h3>
              <h2><em> ________</em></h2>
            </div>
            <img src="css/images/i1.jpg" alt="" /> </div>
        </li>
        <li>
          <div class="item">
            <div class="text">
              <h3><em>Удивляйся</em></h3>
              <h2><em> ________</em></h2>
            </div>
            <img src="css/images/i2.jpg" alt="" /> </div>
        </li>
      </ul>
    </div>
    <div id="main">
      <div id="content" class="left">
        <div class="projects">
          <h3 id="nov">Новости</h3>
          <section class="grid">
    <!-- Еще блоки -->
    <?php
        $articles = mysqli_query($connection, "SELECT * FROM `novosti` ORDER BY `id`");
    ?>
    <?php
                  while( $art = mysqli_fetch_assoc($articles) )
                  {
                   ?>
    <article class="grid-item">                          
        <div class="image">
            <img src="<?php echo $art['image']?>" />
        </div>
        <div class="info">
            <h2><?php echo $art['zagl']; ?></h2>
            <div class="info-text">
                <p><?php echo $art['krat']; ?></p>
            </div>
            <div class="button-wrap">
                <a class="atuin-btn" href="news.php?id=<?php echo $art['id']; ?>">Подробнее</a>
            </div>
            <div><?php echo $art['pubdate']; ?></div>
        </div>
    </article>  
    <?php
        }
    ?>   
    </section>  
        </div>
        <div class="containerB">
            <a href="obr.php" class="button"><span>✓</span>Свяжись со мной</a>
        </div>
      </div>
      
      <div class="cl">&nbsp;</div>
    </div>

  </div>
  <div id="footer">
    <p class="left">Школа №19</p>
    <p class="right"><a href="cmsland.php?mode=30">Для учителя</p>
    <div class="cl"></div>
  </div>
</div>
<script type="text/javascript" src="js/menu.js"></script>
</body>
</html>