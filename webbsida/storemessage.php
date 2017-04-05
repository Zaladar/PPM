<?php
if(isset($_POST['updateMsg'])) {
  $file_data = $_POST['updateMsg'];
  $file_data .= "|" . date("Y-m-d h:i:sa") . "|\r\n";
  $file_data .= file_get_contents('msg/mydata.txt');
  file_put_contents('msg/mydata.txt', $file_data);
}
else {
   die('no post data to process');
}
header('Location: index.html');
exit;
?>
