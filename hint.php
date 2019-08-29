<?php
include 'core/init.php';
$q = $_REQUEST["q"];

if (user_exists($q)== true)
	echo 'email already exists.please try another email';
else
	echo ' ';
	

?>