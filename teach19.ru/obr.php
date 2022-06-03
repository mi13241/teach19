<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Училка</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/jquery.jcarousel.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/menu.css" type="text/css" media="all" />
<!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
<link rel="shortcut icon" href="css/images/favicon.ico" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.pack.js"></script>
<script type="text/javascript" src="js/func.js"></script>
<script> function load() {
    window.alert("Сообщение успешно отправлено!");
}</script>";
</head>
<?php
  if($_SERVER['HTTP_REFERER'] == "https://teach19.ru/obr.php")
  {
    ?>
<body onload="load()">
  <?php
  } 
  else
  {
  ?>
  <body>
    <?php
  }
    ?>
<div class="shell">
  <div class="border">
    <div id="header">
      <h1 id="logo"><a href="index.php" class="notext">Училка</a></h1>
      <h1 id="logo2">Сайт учителя русского языка</h1>
      <div class="cl">&nbsp;</div>
    </div>
     <div class="menu" id="menu"> <!--Меню-->
        <a href="index.php">Главная</a>
        <a href="nov.php">Новости</a>
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
        <section id="contact" class="white-bg">
              <div class="container">
                <div class="row">
                  <div class="col-md-3">
                    <h3 class="title-big">
                      <span>Обратная связь</span>
                    </h3>
                    <p class="content-detail">
                      Вы можете связаться со мной и задать свои вопросы.
                    </p>
                  </div>
                  <div class="col-md-9 content-right">
                    <form class="forma" action="send.php" method="post">
                      <div class="group">
                        <input required="" type="text" name="fio"><span class="highlight"></span><span class="bar"></span><label>Имя</label>
                      </div>
                      <div class="group">
                        <input required="" type="email" name="email"><span class="highlight"></span><span class="bar"></span><label>Почта</label>
                      </div>
                      <div class="group">
                        <textarea required="" name="massage"></textarea><span class="highlight"></span><span class="bar"></span><label>Сообщение</label>
                      </div>
                      <input id="sendMessage" name="sendMessage" type="submit" value="Отправить">
                    </form>
                  </div>
                </div>
              </div>
        </section>
      </div>
      <div id="sidebar" class="right">
        
      </div>
      <div class="cl">&nbsp;</div>
    </div>
    <div class="shadow-l"></div>
    <div class="shadow-r"></div>
    <div class="shadow-b"></div>
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