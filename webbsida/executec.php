<?php
  function startc{
  //$file = file_get_contents('msg/mydata.txt');
  $i = "test";
  exec("testcode $i", $out);
  echo $out;
}
?>
