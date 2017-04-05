<?php
  $file = file_get_contents('msg/mydata.txt');
  $message = explode('|', $file);
  $i = 0;
  $ipo = 0;
  foreach($message as $msg){
    if($i+2 <= count($message)){
      $ipo = $i + 1;
      echo "<p id='timestamp'>$message[$ipo]</p>" . "<p>$message[$i]</p>" . "<br><br>";
      $i = $i + 2;
    }
  }
?>
