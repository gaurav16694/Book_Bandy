<?php
include 'core/init.php';
protect_page();
$user_id = $_GET['user_id'];
mysql_query("update users set active= 0 where user_id= $user_id");
header('Location: adminuserdetail.php');
exit();



?>