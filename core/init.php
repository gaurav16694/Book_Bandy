<?php
session_start();
error_reporting(0);
$connection = mysql_connect("localhost","root","") or die("could not connect");
mysql_select_db("book",$connection) or die ("database not available");
require 'functions/user.php';
require 'functions/general.php';

if(logged_in()===true)
	{
		$session_user_id = $_SESSION['user_id'];
		$user_data = user_data($session_user_id,'user_id','first_name','last_name','email','password','phone','gender','address','profile','type');
		$book_data = book_data('book_id','title','author','publication','category','price','pages','language','condition','isbn','edition','quantity');
		if( user_active($user_data['email'] === false))
		{
			session_destroy();
			header('Location: index.php');
			exit();
		}
	} 

$errors=array();
?>