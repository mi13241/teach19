<?php
require "includes/configur.php";
?>
<?php
  $ss = $_POST['ss'];
  $naz = $_POST['naz'];
  $id = $_POST['id'];
  mysqli_query($connection, "UPDATE `doki` SET `ss` = '$ss', `naz` = '$naz' WHERE id = '$id'");
  $new_url = 'https://teach19.ru/cmsland.php?mode=20';
header('Location: '.$new_url);
?>