<?php
require "includes/configur.php";
?>
<?php

  $image = $_POST['image'];
  $zagl = $_POST['zagl'];
  $krat = $_POST['krat'];
  $sod = $_POST['sod'];
  $id = $_POST['id'];

  mysqli_query($connection, "UPDATE `novosti` SET `image` = '$image', `zagl` = '$zagl', `krat` = '$krat', `sod` = '$sod' WHERE id = '$id'");
  $new_url = 'https://teach19.ru/cmsland.php?mode=13';
header('Location: '.$new_url);
?>