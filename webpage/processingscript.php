<?php
if(isset($_POST['updateMsg'])) {
    $data = $_POST['updateMsg'];
    $ret = file_put_contents('msg/mydata.txt', $data, LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
        echo "$ret bytes written to file";
    }
}
else {
   die('no post data to process');
}
header('Location: index.html');
exit;
