<?php
if(!empty($_POST['updateMsg'])) {
  $file_data = $_POST['updateMsg'];
  $file_data .= "|" . date("Y-m-d H:i:s") . "|\r\n";
  $file_data .= file_get_contents('msg/mydata.txt');
  file_put_contents('msg/mydata.txt', $file_data);

  $last_line = system('./test', $retval);
  echo $retval;
}
//header('Location: index.html');
//exit;
?>
