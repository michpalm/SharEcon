<?php
 session_start();

//Saves the posted information to an email session
//(in this case its the email of the user!)
$_SESSION['toEmail'] = $_POST['data'];

//Echos the session value
$ret = $_SESSION['toEmail'];
echo $ret;

?>
