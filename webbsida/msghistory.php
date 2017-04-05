<?php
  $file = file_get_contents('msg/mydata.txt');
  $message = explode('|', $file);
  $i = 0;
  foreach($message as $msg){
    if($i+2 <= count($message)){
      echo $message[$i+1] . " - " . $message[$i] . "<br>";
      $i = $i + 2;
  }
  else{}
  }
?>
