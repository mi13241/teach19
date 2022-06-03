<?php
require "includes/configur.php";
?>
<?php

  $image = $_POST['image'];
  $zagl = $_POST['zagl'];
  $krat = $_POST['krat'];
  $sod = $_POST['sod'];
  mysqli_query($connection, "INSERT INTO `novosti` (`image`, `zagl`, `krat`, `sod`) VALUES ('$image', '$zagl', '$krat', '$sod')");
  $new_url = 'https://teach19.ru/cmsland.php?mode=13';
header('Location: '.$new_url);
?>