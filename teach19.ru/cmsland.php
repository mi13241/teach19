<?php
session_start();
  include_once('functions.php');
  require "includes/configur.php";
$pass='password'; // Пароль для входа в CMS
$adm=0; // Если в переменной $adm==1 то мы успешно авторизованы

if((isset($_POST['slovo'])||isset($_POST['sekret']))||($_SESSION['sekret']==md5($pass))){
	if (($_POST['slovo']==$pass)||($_SESSION['sekret']==md5($pass))){
		$_SESSION['sekret']=md5($pass); // Если пароль совпадает добавляем в сессию переменную secret с его md5 хэшем
		$adm=1;
		}
		else{
			echo('
			<!doctype html>
			<html lang="ru">
			<head>
			<title>Админка</title>
			<link rel="shortcut icon" href="css/images/favicon.ico" />
			<meta charset="UTF-8">
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			</head>
			<body>
			<center><form method="POST" action="cmsland.php?mode=30" style="margin-top: 30px;">
			<div style="background: linear-gradient(white, gray 68%, gray, black); color: black; width: 500px; height: 100px; line-height: 100px; font-size: 24px; letter-spacing: 1px;">Панель администратора</div>
			<input type="text" placeholder="Введите пароль" name="slovo" size="100" style="margin-top: 10px; background: #eee; color: black; font-size: 18px; width: 494px; height: 30px; line-height: 30px; "><br>
			<input type=submit name="save" value="Войти в систему" style="width: 340px; background: linear-gradient(#FB9575, #F45A38 48%, #EA1502 52%, #F02F17); color: white; width: 505px; margin-top: 5px; font-size: 16px; display: block; height: 37px; line-height: 25px; text-decoration: none; cursor: pointer; border-radius: 5px; box-shadow: 0px 0px 15px #eee; letter-spacing: 0.5px; vertical-align: middle; text-align: center; text-decoration: none; text-shadow: 0 -1px 1px #777; border: 2px solid #F64C2B; border-radius: 5px; box-shadow: 0 0 0 60px rgba(0,0,0,0) inset, .1em .1em .2em #800;">
			</form></center></body></html>');
		}
		} else{
			// Если пароля нет показываем форму входа
			echo('
			<!doctype html>
			<html lang="ru">
			<head>
			<title>Админка</title>
			<link rel="shortcut icon" href="css/images/favicon.ico" />
			<meta charset="UTF-8">
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			</head>
			<body>
			<center><form method="POST" action="cmsland.php?mode=30" style="margin-top: 30px;">
			<div style="background: linear-gradient(white, gray 68%, gray, black); color: black; width: 500px; height: 100px; line-height: 100px; font-size: 24px; letter-spacing: 1px;">Панель администратора</div>
			<input type="text" placeholder="Введите пароль" name="slovo" size="100" style="margin-top: 10px; background: #eee; color: black; font-size: 18px; width: 494px; height: 30px; line-height: 30px; "><br>
			<input type=submit name="save" value="Войти в систему" style="width: 340px; background: linear-gradient(#FB9575, #F45A38 48%, #EA1502 52%, #F02F17); color: white; width: 505px; margin-top: 5px; font-size: 16px; display: block; height: 37px; line-height: 25px; text-decoration: none; cursor: pointer; border-radius: 5px; box-shadow: 0px 0px 15px #eee; letter-spacing: 0.5px; vertical-align: middle; text-align: center; text-decoration: none; text-shadow: 0 -1px 1px #777; border: 2px solid #F64C2B; border-radius: 5px; box-shadow: 0 0 0 60px rgba(0,0,0,0) inset, .1em .1em .2em #800;">
			</form></center></body></html>');
		}
if($adm==1){
if(isset($_POST['pagename'])){
	$_SESSION['pagename']=$_POST['pagename']; // Получаем имя страницы для редактирования
};	
if(isset($_SESSION['pagename'])){	
	$pagename=$_SESSION['pagename'];
} else {
	$pagename='index.php';	// Если его нет в куках и нет в POST запросе то ставим его=index.html	
};

// В переменную $template поместим код редактируемой странички
$template=file_get_contents($pagename);

// Выводим шапку админки
echo('
<!DOCTYPE html>
<head>
<style>
	body, html {
	padding: 0px; margin: 0px;
	background: #eee; 
	text-align: center;
}
textarea {
	padding: 10px; 
	width: 600px; height: 400px;
}
a {
	text-decoration: none;
}
.kartinka {
	display: inline-block; 
	text-decoration: none;
	padding: 20px; padding-bottom: 5px;
	text-align: center; 
	cursor: pointer;
}
.kartinka:hover {
	background: #fffff0; 
	border-radius: 5px;
}
.kartinka img {
	height: 100px; 
	margin-bottom: 10px;
}
.bigkartinka {
	height: 300px; 
	padding: 50px;
}
#menu {
	background: #fffff0;
	padding-top: 15px; padding-bottom: 10px; padding-left: 10px;
	margin-bottom: 30px;
	height: 50px;
	line-height: 50px;
	text-align: center;
	font-size: 20px;
	border-bottom: 1px solid silver;
}
#myform {
	height: 40px; line-height: 40px;
	display: inline-block;
	vertical-align: top;
	padding-left: 20px; padding-right: 20px;
	margin-right: 3px;
	text-align: center;
	font-size: 90%;
}
#menu a {
	height: 40px; line-height: 40px;
	text-decoration: none;
	display: inline-block;
	vertical-align: top;
	background: #558;
	padding-left: 10px; padding-right: 10px;
	color: white;
	margin-right: 3px;
	text-align: center;
	width: 85px;
	font-size: 90%;
	-webkit-box-shadow: 0 10px 6px -6px #777;
	-moz-box-shadow: 0 10px 6px -6px #777;
	box-shadow: 0 10px 6px -6px #777;
}
.mytext, .cssjs {
	display: block;
	border-radius: 5px;
	padding: 10px; padding-left: 20px; padding-right: 20px;
	margin: 20px;
	background: #fffff9;
	color: black;
}
.mytext:hover, .cssjs:hover {
	background: #fffff0;
	cursor: pointer;
}
#help {
	max-width: 700px; margin: 0 auto; text-align: left; font-size: 120%;
}
</style>
<title>Админка</title>
<link rel="shortcut icon" href="css/images/favicon.ico" />
</head>
<body>
<div id="menu">
<form action="cmsland.php?mode=13" id="myform" method="POST">
<select name="pagename">');
// Создаем список страниц в корневой папке доступных для редактирования
$filelist1 = array(
    0 => "index.php",
    1 => "nov.php",
    2 => "med.php",
    3 => "moi.php",
    4 => "rod.php",
    5 => "obr.html",
);
$filelist2 = array(
    0 => "Главная",
    1 => "Новости",
    2 => "Документы",
    3 => "Класс",
    4 => "Родителям",
    5 => "Связь",
);
$ddd=0;
$ssss='';
for ($j=0; $j<count($filelist1); $j++) {
	if($filelist1[$j]==$_SESSION['pagename']){
		$ssss.=('<option selected value = '.$filelist1[$j].'>'.$filelist2[$j].'</option>');
		$ddd=1;
	} else {
		$ssss.=('<option value = '.$filelist1[$j].'>'.$filelist2[$j].'</option>');
	};
};
if($ddd==0){
	$ssss='';
	for ($j=0; $j<count($filelist1); $j++) {
		if($filelist1[$j]=='index.php'){
			$ssss.=('<option selected value = '.$filelist1[$j].'>'.$filelist2[$j].'</option>');
			$ddd=1;
		} else {
			$ssss.=('<option value = '.$filelist1[$j].'>'.$filelist2[$j].'</option>');
		};
	};
};
echo($ssss);
echo('</select>
<input type="submit" value="Редактировать" title="Редактировать">
</form>
<a href="cmsland.php?mode=0">Тексты</a>
<a href="cmsland.php?mode=7">Картинки</a>
<a href="cmsland.php?mode=5">HTML</a>
<a href="cmsland.php?mode=8">CSS и JS</a>
<a href="https://teach19.ru" target="_blank">На сайт</a>
<a href="cmsland.php?mode=20">Документы</a>
<a href="cmsland.php?mode=13">Новости</a>
<a href="cmsland.php?mode=11">Выход</a>
</div>
');

//******************************************************************************************
// Список картинок
if($_GET['mode']=='7'){
	// Вытаскиваем список картинок из HTML кода
	$imgreg = "/[\"|\(']((.*\\/\\/|)([\\/a-z0-9_%]+\\.(jpg|png|gif)))[\"|\)']/"; 
	preg_match_all($imgreg, $template, $imgmas);
	for ($j=0; $j< count($imgmas[1]); $j++) {
		$imgname=trim($imgmas[1][$j]);
		echo('<div class="kartinka"><a href="cmsland.php?mode=1&img='.$imgname.'"><img src="'.$imgname.'?'.rand(1, 32000).'"></a><br>'.$imgname.'<br>');
		if(file_exists($imgname)){
			$size = getimagesize ($imgname); echo "Размер картинки: $size[0] * $size[1]"."<p>";
		} else { echo("Картинка не загружена"); };
		echo("</div>");
	};
	// Получаем список CSS файлов в массив $mycss	
	$mycss = array();
	$cssreg = "/[\"']((.*\\/\\/|)([\\/a-z0-9_%]+\\.(css)))[\"']/"; 
	preg_match_all($cssreg, $template, $cssmas);
	for ($j=0; $j< count($cssmas[1]); $j++) {
		array_push($mycss, trim($cssmas[1][$j]));
	};
	echo('<hr>');
	// Вытаскиваем с каждого CSS файла адреса картинок
	for ($i=0; $i< count($mycss); $i++) {
		$template=file_get_contents($mycss[$i]);
		$imgreg = "/[.\(]((.*\\/\\/|)([\\/a-z0-9_%]+\\.(jpg|png|gif)))[\)]/"; 
		preg_match_all($imgreg, $template, $imgmas);
		for ($j=0; $j< count($imgmas[1]); $j++) {
			$imgname=trim($imgmas[1][$j]);
			echo('<div class="kartinka"><a href="cmsland.php?mode=1&img='.$imgname.'"><img src="'.$imgname.'?'.rand(1, 32000).'"></a><br>'.$imgname.'<br>');
			if(file_exists($imgname)){
				$size = getimagesize ($imgname); echo "Размер картинки: $size[0] * $size[1]"."<p>";
			} else { 
				if(file_exists(substr($imgname,1))){
					$size = getimagesize(substr($imgname,1)); echo "Размер картинки: $size[0] * $size[1]"."<p>";
				} else { 
					echo("Картинка не загружена"); 
				};		
			};
			echo("</div>");
		};
	};
};
//******************************************************************************************
// Список картинок
if($_GET['mode']=='11'){
	session_destroy();
	header("Location: https://teach19.ru");
};

//******************************************************************************************
// Одна картинка
if($_GET['mode']=='1'){
	$imgname=$_GET['img'];
	if($imgname[0]=='/'){
		$imgname=substr($imgname,1);
	};
	echo('<center><img src="'.$imgname.'" class="bigkartinka"><br>'.$imgname.'<p>');
	if(file_exists($imgname)){
		$size = getimagesize ($imgname); echo "Размер картинки: $size[0] * $size[1]"."<p>";
	} else { 
		if(file_exists(substr($imgname,1))){
			$size = getimagesize(substr($imgname,1)); echo "Размер картинки: $size[0] * $size[1]"."<p>";
		} else { 
			echo("Картинка не загружена"); 
		};		
	};
	echo('<form enctype="multipart/form-data" action="cmsland.php?mode=2&img='.$imgname.'" method="POST">Загрузить картинку с компьютера: <p><input name="userfile" type="file" required><p><input type="submit" style="width: 250px; height: 40px;" value="Начать загрузку" /></form>');	
};
//******************************************************************************************
// Одна картинка
if($_GET['mode']=='13'){
	?>
		<section id="contact2" class="white-bg">
  <?php
        $articles = mysqli_query($connection, "SELECT * FROM `novosti` ORDER BY `id`");
    ?>
    				<style type="text/css">
    					p {
						    text-align: left;
						}
                   	.notify__wrapper{width:40%;  padding: 0.7rem; padding-bottom:30px;
  box-shadow: 0 15px 30px 0 rgba(0,0,0,0.11),
    0 5px 15px 0 rgba(0,0,0,0.08);
  background-color: #ffffff;
  border-radius: 0.5rem;
  
  border-left: 0 solid #00ff99;
  transition: border-left 300ms ease-in-out, padding-left 300ms ease-in-out;} p {margin:0 0;} .effect {border:3px solid #666; -moz-box-shadow: 0px 0px 3px #333; -webkit-box-shadow: 3px 3px 3px #333; -moz-border-radius: 15px; -webkit-border-radius: 15px; background: -moz-linear-gradient(center bottom , #CACACA 9%, #ECECEC 92%) repeat scroll 0 0 transparent; background: -webkit-gradient(linear, left bottom, left top, color-stop(0.09, rgb(202,202,202)), color-stop(0.92, rgb(236,236,236)))} .title__wrapper{ justify-content: space-between; display: flex; align-items: center; padding-bottom: 20px;}
                   		.title__wrapper div, .title__wrapper h3 { display: inline-block;}
                   		.white-bg {  text-align: center; text-align: -webkit-center;}
                   		p.ui-title-3 {
						    font-size: 25px;
						    font-weight: bold;
						}
						a.knopka {
						  color: #fff; /* цвет текста */
						  text-decoration: none; /* убирать подчёркивание у ссылок */
						  user-select: none; /* убирать выделение текста */
						  background: #558; /* фон кнопки */
						  padding: .7em 1.5em; /* отступ от текста */
						  outline: none; /* убирать контур в Mozilla */
						} 
						a.knopka:hover { background: rgb(232,95,76); } /* при наведении курсора мышки */
						a.knopka:active { background: rgb(152,15,0); } /* при нажатии */
                   </style>
    <?php
                  while( $art = mysqli_fetch_assoc($articles) )
                  {
                   ?>
              <div class="notify__wrapper" >
                <div class="title__wrapper">
                  <p class="ui-title-3"><?php echo $art['zagl']; ?></p>
                <div>
                  <a href="cmsland.php?id=<?php echo $art ['id'] ?>"><xml version="1.0"><svg height="19px" viewBox="0 0 48 48" width="19px" xmlns="http://www.w3.org/2000/svg" cursor="pointer"><path d="M6 34.5v7.5h7.5l22.13-22.13-7.5-7.5-22.13 22.13zm35.41-20.41c.78-.78.78-2.05 0-2.83l-4.67-4.67c-.78-.78-2.05-.78-2.83 0l-3.66 3.66 7.5 7.5 3.66-3.66z"/><path d="M0 0h48v48h-48z" fill="none"/></svg></a>
                  <a href="delet.php?id=<?php echo $art ['id'] ?>" onclick="return confirm ('Вы действительно хотите удалить новость?'); "><xml version="1.0"><svg data-name="Layer 1" height="20px" id="Layer_1" viewBox="0 0 200 200" width="20px" cursor="pointer" xmlns="http://www.w3.org/2000/svg"><title/><path d="M114,100l49-49a9.9,9.9,0,0,0-14-14L100,86,51,37A9.9,9.9,0,0,0,37,51l49,49L37,149a9.9,9.9,0,0,0,14,14l49-49,49,49a9.9,9.9,0,0,0,14-14Z"/></svg></a>
                </div>
                </div> 
                <div class="notify__content"><!----> <p><?php echo $art['krat']; ?></p> <!---->
                </div>
              </div>
              <br>
              <?php
                  }
              ?>
              <div>
                  <a href="cmsland.php?mode=15" class="knopka">Добавить новость</a>
                </div> 
        </section>
        <?php
};
//******************************************************************************************
// Одна картинка
if($_GET['mode']=='20'){
	?>
		<section id="contact2" class="white-bg">
  <?php
        $articles = mysqli_query($connection, "SELECT * FROM `doki` ORDER BY `id`");
    ?>
    				<style type="text/css">
    					p {
						    text-align: left;
						}
                   	.notify__wrapper{width:40%;  padding: 0.7rem;
  box-shadow: 0 15px 30px 0 rgba(0,0,0,0.11),
    0 5px 15px 0 rgba(0,0,0,0.08);
  background-color: #ffffff;
  border-radius: 0.5rem;
  
  border-left: 0 solid #00ff99;
  transition: border-left 300ms ease-in-out, padding-left 300ms ease-in-out;} p {margin:0 0;} .effect {border:3px solid #666; -moz-box-shadow: 0px 0px 3px #333; -webkit-box-shadow: 3px 3px 3px #333; -moz-border-radius: 15px; -webkit-border-radius: 15px; background: -moz-linear-gradient(center bottom , #CACACA 9%, #ECECEC 92%) repeat scroll 0 0 transparent; background: -webkit-gradient(linear, left bottom, left top, color-stop(0.09, rgb(202,202,202)), color-stop(0.92, rgb(236,236,236)))} .title__wrapper{ justify-content: space-between; display: flex; align-items: center;}
                   		.title__wrapper div, .title__wrapper h3 { display: inline-block;}
                   		.white-bg {  text-align: center; text-align: -webkit-center;}
                   		p.ui-title-3 {
						    font-size: 25px;
						    font-weight: bold;
						}
						a.knopka {
						  color: #fff; /* цвет текста */
						  text-decoration: none; /* убирать подчёркивание у ссылок */
						  user-select: none; /* убирать выделение текста */
						  background: #558; /* фон кнопки */
						  padding: .7em 1.5em; /* отступ от текста */
						  outline: none; /* убирать контур в Mozilla */
						} 
						a.knopka:hover { background: rgb(232,95,76); } /* при наведении курсора мышки */
						a.knopka:active { background: rgb(152,15,0); } /* при нажатии */
                   </style>
    <?php
                  while( $art = mysqli_fetch_assoc($articles) )
                  {
                   ?>
              <div class="notify__wrapper" >
                <div class="title__wrapper">
                  <p class="ui-title-3"><?php echo $art['naz']; ?></p>
                <div>
                  <a href="cmsland.php?idi=<?php echo $art ['id'] ?>"><xml version="1.0"><svg height="19px" viewBox="0 0 48 48" width="19px" xmlns="http://www.w3.org/2000/svg" cursor="pointer"><path d="M6 34.5v7.5h7.5l22.13-22.13-7.5-7.5-22.13 22.13zm35.41-20.41c.78-.78.78-2.05 0-2.83l-4.67-4.67c-.78-.78-2.05-.78-2.83 0l-3.66 3.66 7.5 7.5 3.66-3.66z"/><path d="M0 0h48v48h-48z" fill="none"/></svg></a>
                  <a href="deleti.php?id=<?php echo $art ['id'] ?>" onclick="return confirm ('Вы действительно хотите удалить документ?'); "><xml version="1.0"><svg data-name="Layer 1" height="20px" id="Layer_1" viewBox="0 0 200 200" width="20px" cursor="pointer" xmlns="http://www.w3.org/2000/svg"><title/><path d="M114,100l49-49a9.9,9.9,0,0,0-14-14L100,86,51,37A9.9,9.9,0,0,0,37,51l49,49L37,149a9.9,9.9,0,0,0,14,14l49-49,49,49a9.9,9.9,0,0,0,14-14Z"/></svg></a>
                </div>
                </div> 
              </div>
              <br>
              <?php
                  }
              ?>
              <div>
                  <a href="cmsland.php?mode=22" class="knopka">Добавить документ</a>
                </div> 
        </section>
        <?php
};

//******************************************************************************************
// Создание новости
if($_GET['mode']=='15'){
	?>
	<section id="contact2" class="white-bg">
					<style>
			   .button1 {
			    background: #558; /* Цвет фона */
			    color: #fff; /* Цвет текста */
			    padding: 7px 12px; /* Поля */
			    margin-bottom: 1em; /* Отступ снизу */
			    margin-top: 1em; /* Отступ снизу */
			   }
			   .col-md-9.content-right {
				    text-align: -webkit-center;
				}
				.txa {
					width: 60%;
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
                      <input type="file" name="file" class= "button1">
                      <input type="submit" value="Загрузить файл!" class= "button1">
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
                      <div class="txa"> 
                      <textarea name="sod">
                      </textarea>
                      </div>
                      <input type = "hidden" name = "image" value ="css/images/<?php echo "$name" ?>"/>
                      <input type ="submit" name="go" value="Выложить!" class= "button1">
                    </form>
                    <script src="https://cdn.tiny.cloud/1/qs1zty0go4dnepvy0q0defkvvv9b40b8a2avh9ssdnjgtbm8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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
	<?php
};
//******************************************************************************************
// Создание документов
if($_GET['mode']=='22'){
	?>
	<section id="contact2" class="white-bg">
					<style>
			   .button1 {
			    background: #558; /* Цвет фона */
			    color: #fff; /* Цвет текста */
			    padding: 7px 12px; /* Поля */
			    margin-bottom: 1em; /* Отступ снизу */
			    margin-top: 1em; /* Отступ снизу */
			   }
			   .col-md-9.content-right {
				    text-align: -webkit-center;
				}
				.txa {
					width: 60%;
				}
			 </style>
              <div class="container">
                <div class="row">
                  <div class="col-md-9 content-right">
                    <form method="POST" action="vikli.php">  
                      <div class="col-md-3">
                        <h3 class="title-small">
                          <span>Введите название документа:</span>
                        </h3>
                        <input type="text" name="naz">
                      </div>   
                      <div class="col-md-3">
                        <h3 class="title-small">
                          <span>Введите ссылку на документ:</span>
                        </h3>
                        <input type="text" name="ss" id="uct">
                      </div>
                      <input type ="submit" name="go" value="Выложить!" class= "button1">
                    </form>
                  </div>
                </div>
              </div>
        </section>
	<?php
};
//******************************************************************************************
// Редактирование новости
if($_GET['id']!=null){
	?>
		<?php
	$stat = mysqli_query($connection, "SELECT * FROM `novosti` WHERE `id` = " . (int) $_GET['id']);
	$myrow = mysqli_fetch_array($stat);
	$red = 0;
	?>
	<section id="contact2" class="white-bg">
					<style>
			   .button1 {
			    background: #558; /* Цвет фона */
			    color: #fff; /* Цвет текста */
			    padding: 7px 12px; /* Поля */
			    margin-bottom: 1em; /* Отступ снизу */
			    margin-top: 1em; /* Отступ снизу */
			   }
			   .col-md-9.content-right {
				    text-align: -webkit-center;
				}
				.txa {
					width: 60%;
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
                      <input type="file" name="file" class= "button1">
                      <input type="submit" value="Загрузить файл!" class= "button1">
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
                        $red = 1;
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
                    <form method="POST" action="red.php">  
                      <div class="col-md-3">
                        <h3 class="title-small">
                          <span>Введите заголовок статьи:</span>
                        </h3>
                        <input type="text" name="zagl" value="<?php echo $myrow['zagl'] ?>">
                      </div>   
                      <div class="col-md-3">
                        <h3 class="title-small">
                          <span>Введите краткое описание статьи:</span>
                        </h3>
                        <input type="text" name="krat" id="uct" value="<?php echo $myrow['krat'] ?>">
                      </div>
                      <div class="col-md-3">
                        <h3 class="title-small">
                          <span>Заполните вашу новость:</span>
                        </h3>
                      </div>
                      <div class="txa"> 
                      <textarea name="sod">
                      	<?php echo $myrow['sod'] ?>
                      </textarea>
                      </div>
                      <?php
                      if($red == 0){
                        // загружаем изображение на сервер
                        ?>
                        <input type = "hidden" name = "image" value ="<?php echo $myrow['image'] ?>"/>
                        <?php
                      }
                      else{
                        // выводим сообщение об ошибке
                        ?>
                         <input type = "hidden" name = "image" value ="css/images/<?php echo $myrow['image'] ?>"/>
                         <?php 
                      }
                    ?>
                      <input type = "hidden" name = "id" value ="<?php echo $myrow['id'] ?>"/>
                      <input type ="submit" name="go" value="Отредактировать!" class= "button1">
                    </form>
                    <script src="https://cdn.tiny.cloud/1/qs1zty0go4dnepvy0q0defkvvv9b40b8a2avh9ssdnjgtbm8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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
	<?php
};
//******************************************************************************************
// Редактирование документов
if($_GET['idi']!=null){
	?>
		<?php
	$stat = mysqli_query($connection, "SELECT * FROM `doki` WHERE `id` = " . (int) $_GET['idi']);
	$myrow = mysqli_fetch_array($stat);
	$red = 0;
	?>
	<section id="contact2" class="white-bg">
					<style>
			   .button1 {
			    background: #558; /* Цвет фона */
			    color: #fff; /* Цвет текста */
			    padding: 7px 12px; /* Поля */
			    margin-bottom: 1em; /* Отступ снизу */
			    margin-top: 1em; /* Отступ снизу */
			   }
			   .col-md-9.content-right {
				    text-align: -webkit-center;
				}
				.txa {
					width: 60%;
				}
			 </style>
              <div class="container">
                <div class="row">
                  <div class="col-md-9 content-right">
                    <form method="POST" action="redi.php">  
                      <div class="col-md-3">
                        <h3 class="title-small">
                          <span>Введите название документа:</span>
                        </h3>
                        <input type="text" name="naz" value="<?php echo $myrow['naz'] ?>">
                      </div>   
                      <div class="col-md-3">
                        <h3 class="title-small">
                          <span>Введите ссылку на документ:</span>
                        </h3>
                        <input type = "hidden" name = "id" value ="<?php echo $myrow['id'] ?>"/>
                        <input type="text" name="ss" id="uct" value="<?php echo $myrow['ss'] ?>">
                      </div>
                      <input type ="submit" name="go" value="Выложить!" class= "button1">
                    </form>
                  </div>
                </div>
              </div>
        </section>
	<?php
};

//******************************************************************************************
// Замена картинки
if($_GET['mode']=='2'){
	$imgname=$_GET['img'];
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $imgname)) {
		echo "<br><br><center>Файл был успешно загружен.<p><a href='cmsland.php'>Вернуться к списку картинок</a><p>ПРИ ПРОСМОТРЕ ИЗМЕНЕНИЙ НА САЙТЕ НЕ ЗАБУДЬТЕ ОБНОВИТЬ ЕГО СТРАНИЦУ В БРАУЗЕРЕ";
	};
};


//******************************************************************************************
// Список текстовых фрагментов
if($_GET['mode']=='0'){
	// Помещаем в массив $ff все тексты из HTML кода
	$ff=array(); $content=preg_replace('/<[^>]+>/', '^', $template); $teksta = explode('^', $content);
	for ($j=0; $j< count($teksta); $j++) { if(strlen(trim($teksta[$j]))>1) $ff[]=(trim($teksta[$j])); };
	for ($j=0; $j< count($ff); $j++) { 
		echo('<a href="cmsland.php?mode=3&j='.$j.'" class="mytext">'.$ff[$j].'</a>');
	};
};


//******************************************************************************************
// Текстовый фрагмент
if($_GET['mode']=='3'){
	// Помещаем в массив $ff все текстовые фрагменты из HTML кода
	$ff=array(); $content=preg_replace('/<[^>]+>/', '^', $template); $teksta = explode('^', $content);
	for ($j=0; $j< count($teksta); $j++) { if(strlen(trim($teksta[$j]))>1) $ff[]=(trim($teksta[$j])); };
	$jj=$_GET['j'];
	$tektekst=$ff[$jj];
	$kol=1;
	for ($j=0; $j<$jj; $j++) { 
		$kol=$kol + substr_count($ff[$j],$tektekst);
	};
	echo('<div style="margin: 0 auto; text-align: center;"><form method="POST" action="cmsland.php?mode=4&j='.$jj.'"><br><br><h2>Редактирование текстового фрагмента</h2><br><br><textarea name="mytext">'.$tektekst.'</textarea><br><input style="width: 600px; margin-top: 10px; height: 50px;" type="submit" value="Заменить текст" title="Заменить текст"></form></div>');
};


//******************************************************************************************
// Редактирование текстового фрагмента
if($_GET['mode']=='4'){
	// Помещаем в массив $ff все текста из HTML кода
	$ff=array(); $content=preg_replace('/<[^>]+>/', '^', $template); $teksta = explode('^', $content);
	for ($j=0; $j< count($teksta); $j++) { if(strlen(trim($teksta[$j]))>1) $ff[]=(trim($teksta[$j])); };
	$jj=$_GET['j'];
	$tektekst=$ff[$jj];
	$kol=1;
	for ($j=0; $j<$jj; $j++) { 
		$kol=$kol + substr_count($ff[$j],$tektekst);
	};
	$subject=file_get_contents($pagename);
	function str_replace_nth($search, $replace, $subject, $nth)
	{
		$found = preg_match_all('/'.preg_quote($search).'/', $subject, $matches, PREG_OFFSET_CAPTURE);
		if (false !== $found && $found > $nth) {
			return substr_replace($subject, $replace, $matches[0][$nth][1], strlen($search));
		}
		return $subject;
	};
	$rez=str_replace_nth($tektekst, $_POST['mytext'], $subject, $kol-1);
	file_put_contents($pagename, $rez);
	echo "<br><br><center>Текст был успешно изменен.<p><a href='cmsland.php?mode=0'>Вернуться к списку текстов</a><p>ПРИ ПРОСМОТРЕ ИЗМЕНЕНИЙ НА САЙТЕ НЕ ЗАБУДЬТЕ ОБНОВИТЬ ЕГО СТРАНИЦУ В БРАУЗЕРЕ";
};


//******************************************************************************************
// Форма для HTML кода
if($_GET['mode']=='5'){
	$template=htmlspecialchars(file_get_contents($pagename));
	echo('<div style="margin: 0 auto; text-align: center;"><form method="POST" action="cmsland.php?mode=6"><br><br><h2>Редактирование HTML кода</h2><br><br><textarea name="mytext" style="width: 90%; height: 500px;">'.$template.'</textarea><br><input style="width: 90%; margin-top: 10px; height: 50px;" type="submit" value="Заменить текст" title="Заменить текст"></form></div>');
};


//******************************************************************************************
//Редактирование HTML кода
if($_GET['mode']=='6'){
	file_put_contents($pagename, $_POST['mytext']);
};

//******************************************************************************************
// Получаем список CSS и JS файлов
if($_GET['mode']=='8'){
	echo('<br><h2>CSS и JS файлы относящиеся к '.$pagename.'</h2><p><br>');
	$cssreg = "/[\"']((.*\\/\\/|)([\\/a-z0-9_%]+\\.(css)))[\"']/"; 
	preg_match_all($cssreg, $template, $cssmas);
	for ($j=0; $j< count($cssmas[1]); $j++) {
	$rrr=trim($cssmas[1][$j]);
	if (!(strstr($rrr, "http"))) {
 	echo('<a class="cssjs" href="cmsland.php?mode=9&fl='.$rrr.'">'.$rrr.'</a><p>');
	};
	};
	$cssreg = "/[\"']((.*\\/\\/|)([\\/a-z0-9_%]+\\.(js)))[\"']/"; 
	preg_match_all($cssreg, $template, $cssmas);
	for ($j=0; $j< count($cssmas[1]); $j++) {
	$rrr=trim($cssmas[1][$j]);
	if (!(strstr($rrr, "http"))) {
	echo('<a class="cssjs"  href="cmsland.php?mode=9&fl='.$rrr.'">'.$rrr.'</a><p>');
	};
	};
};

//******************************************************************************************
// Форма для HTML кода
if($_GET['mode']=='9'){
	$template=file_get_contents($_GET['fl']);
	echo('<div style="margin: 0 auto; text-align: center;"><form method="POST" action="cmsland.php?mode=10&fl='.$_GET['fl'].'"><br><br><h2>Редактирование кода</h2><br><br><textarea name="mytext" style="width: 90%; height: 500px;">'.$template.'</textarea><br><input style="width: 90%; margin-top: 10px; height: 50px;" type="submit" value="Заменить текст" title="Заменить текст"></form></div>');
};

//******************************************************************************************
//Редактирование всего HTML кода
if($_GET['mode']=='10'){
	file_put_contents($_GET['fl'], $_POST['mytext']);
};

//******************************************************************************************
// Помощь
if($_GET['mode']==30){
	echo('<div id="help"><p><br><h2>Панель администратора</h2><p>Данная панель предназначена для того, чтобы учитель и разработчик могли редактировать данный сайт.<p>	С помощью данной CMS вы можете редактировать текста, и заменять картинки, изменять HTML код, JS и CSS вашего лэндинга.</div>');
};
echo('</body></html>');
};
?>
