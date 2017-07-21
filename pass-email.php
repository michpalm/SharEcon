<?php
 session_start();
//$json = '{"foo-bar": 12345}';
//
//$obj = json_decode($_POST['data']);
$_SESSION['toEmail'] = $_POST['data'];

 $ret = $_SESSION['toEmail'];

echo $ret;
//$_SESSION['toEmail'] = $_POST['data'];


 ?>
