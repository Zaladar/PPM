<?php
  $file = file_get_contents('msg/mydata.txt');
  $message = explode('|', $file);
  echo $message[0];
?>
