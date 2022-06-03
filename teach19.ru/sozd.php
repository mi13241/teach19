<?php
  include_once('functions.php')
?>
<?php
require "includes/configur.php";
?>
<!DOCTYPE HTML>
<html>
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
<script src="https://cdn.tiny.cloud/1/qs1zty0go4dnepvy0q0defkvvv9b40b8a2avh9ssdnjgtbm8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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
        <a href="index.html">Главная</a>
        <a href="nov.html">Новости</a>
        <a href="med.html">Методические материалы</a>
        <a href="moi.html">Мой класс</a>
        <a href="rod.html">Родителям</a> 
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
        <section id="contact2" class="white-bg">
              <div class="container">
                <div class="row">
                  <div class="col-md-9 content-right">
                  <div class="col-md-3">
                    <h3 class="title-small">
                      <span>Загрузите изображение, которое будет отображаться в блоке статьи:</span>
                    </h3>
                  </div>

                    <form method="post" enctype="multipart/form-data" id="formika">
                      <input type="file" name="file">
                      <input type="submit" value="Загрузить файл!">
                    </form>
                    <?php
                    // если была произведена отправка формы
                    if(isset($_FILES['file'])) {
                      // проверяем, можно ли загружать изображение
                      $check = can_upload($_FILES['file']);
                    
                      if($check === true){
                        // загружаем изображение на сервер
                        $name = make_upload($_FILES['file']);
                        echo "<strong>Файл успешно загружен!</strong>";
                      }
                      else{
                        // выводим сообщение об ошибке
                        echo "<strong>$check</strong>";  
                      }
                    }
                    ?>
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-md-9 content-right">
                    <form method="POST" action="vikl.php">  
                      <div class="col-md-3">
                        <h3 class="title-small">
                          <span>Введите заголовок статьи:</span>
                        </h3>
                        <input type="text" name="zagl">
                      </div>   
                      <div class="col-md-3">
                        <h3 class="title-small">
                          <span>Введите краткое описание статьи:</span>
                        </h3>
                        <input type="text" name="krat" id="uct">
                      </div>
                      <div class="col-md-3">
                        <h3 class="title-small">
                          <span>Заполните вашу новость:</span>
                        </h3>
                      </div>  
                      <textarea name="sod">
                      </textarea>
                      <input type = "hidden" name = "image" value ="css/images/<?php echo "$name" ?>"/>
                      <input type="submit" name="go" value="Выложить!">
                    </form>
                    <script>
                      tinymce.init({
                        selector: 'textarea',
                        plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
                        toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
                        toolbar_mode: 'floating',
                        tinycomments_mode: 'embedded',
                        tinycomments_author: 'Author name',
                        images_upload_url: 'postAcceptor.php',
                      });
                    </script>
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
    <p class="right">Все права защищены</p>
    <div class="cl"></div>
  </div>
</div>
<script type="text/javascript" src="js/menu.js"></script>
</body>
</html>