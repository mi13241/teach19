<?php
/**
 * WCMS - WEX Simple CMS
 * https://github.com/vedees/wcms
 * Copyright (C) 2018 Evgenii Vedegis <vedegis@gmail.com>
 * https://github.com/vedees/wcms/blob/master/LICENSE
 */
require 'core/initialize.php';
$user = new wcms\classes\auth\Login;
$user->require_login();?>

<?php $page_title = $lang['imagesTitle'];
      $page = 'images';?>
<?php include('includes/header.php') ?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.tiny.cloud/1/qs1zty0go4dnepvy0q0defkvvv9b40b8a2avh9ssdnjgtbm8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <?php
  include_once('functions.php')
?>
<?php
require "includes/configur.php";
?>
</head>
<body>
<section id="contact2" class="white-bg">
                <style>
                 .button {
                  background: #5d8f76; /* Цвет фона */
                  color: #fff; /* Цвет текста */
                  padding: 7px 12px; /* Поля */
                  margin-bottom: 1em; /* Отступ снизу */
                 }
               </style>
              <div class="container">
                <div class="row">
                  <div class="col-md-9 content-right">
                  <div class="col-md-3">
                    <h3 class="title-small">
                      <span>Загрузите изображение, которое будет отображаться в блоке статьи:</span>
                    </h3>
                  </div>

                    <form method="post" enctype="multipart/form-data" id="formika">
                      <input type="file" name="file" class= "button">
                      <input type="submit" value="Загрузить файл!" class= "button">
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
                      <input type = "hidden" name = "image" value ="wex/images/<?php echo "$name" ?>"/>
                      <input type ="submit" name="go" value="Выложить!" class= "button">
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
</body>
</html>
<?php include('includes/footer.php') ?>