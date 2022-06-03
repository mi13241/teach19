<?php
require "includes/configur.php";
?>
<?php
  $id = $_GET['id'];
  mysqli_query($connection, "DELETE FROM `novosti` WHERE id = '$id'");
  $new_url = 'https://teach19.ru/cmsland.php?mode=13';
header('Location: '.$new_url);
?>