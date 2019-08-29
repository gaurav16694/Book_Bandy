<?php

include 'core/init.php';
protect_page();
$feedback_id = $_GET['feedback_id'];
mysql_query("delete from feedback where feedback_id= $feedback_id");
header('Location: adminfeedback.php');
exit();



?>