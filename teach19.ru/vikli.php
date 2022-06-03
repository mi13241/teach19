<?php
require "includes/configur.php";
?>
<?php

  $naz = $_POST['naz'];
  $ss = $_POST['ss'];
  mysqli_query($connection, "INSERT INTO `doki` (`naz`, `ss`) VALUES ('$naz', '$ss')");
  $new_url = 'https://teach19.ru/cmsland.php?mode=20';
header('Location: '.$new_url);
?>