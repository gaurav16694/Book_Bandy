<?php

include 'core/init.php';
protect_page();
$message_id = $_GET['message_id'];
mysql_query("delete from message where message_id= $message_id");
header('Location: showmessage.php');
exit();



?>