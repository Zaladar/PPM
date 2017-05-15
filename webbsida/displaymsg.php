<?php
  $file = file_get_contents('msg/mydata.txt');
  $message = explode('|', $file);
  echo '<div id="activeMsgBox">'.$message[0].'</div>';
?>
