<!DOCTYPE>
<?php
require "includes/configur.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Училка</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/med.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <a href="nov.php">Новости</a>
        <a class="active" href="med.php">Методические материалы</a>
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
          <h3>Методические данные</h3>
          <div class="item">
            <!-- блоки -->
                <?php
                        $articles = mysqli_query($connection, "SELECT * FROM `doki` ORDER BY `id`");
                    ?>
                    <?php
                  while( $art = mysqli_fetch_assoc($articles) )
                  {
                   ?>
<div class="iconblock-5">
  <a href="<?php echo $art['ss']; ?>">
    <div class="icon">
                <i class="fa fa-file-word-o" aria-hidden="true"></i>
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" viewBox="0 -10 300 320" xml:space="preserve">           
            <polygon points="22.3,223.7 22.3,76.3 150,2.5 277.7,76.3 277.7,223.7 150,297.5"/>
            <path d="M150,4.8l125.7,72.6v145.2L150,295.2L24.3,222.6V77.4L150,4.8 M150,0.2L20.3,75.1v149.8L150,299.8l129.7-74.9V75.1L150,0.2 L150,0.2z"/>            
        </svg>
    </div>
    <br><br>
    <p><?php echo $art['naz']; ?></p>
    </a>
</div>
<?php
        }
    ?> 
              <!-- блоки -->
            <div class="cl">&nbsp;</div>
          </div>
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