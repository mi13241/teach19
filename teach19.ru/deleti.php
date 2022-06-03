<?php
require "includes/configur.php";
?>
<?php
  $id = $_GET['id'];
  mysqli_query($connection, "DELETE FROM `doki` WHERE id = '$id'");
  $new_url = 'https://teach19.ru/cmsland.php?mode=20';
header('Location: '.$new_url);
?>