<?php
// book functions

function post_book($posting_data) 
     {
		  array_walk ($posting_data, 'array_sanitize'); 
		  $fields = '`'.implode('`, `', array_keys($posting_data)) .'`' ;
		  $data  = '\'' .implode('\', \'', $posting_data) . '\'';
		  mysql_query("INSERT INTO books ($fields) VALUES ($data)") or die();
	 }

function book_data($book_id)
	{
		$data = array();
		$book_id = (int)$book_id;
		
		$func_num_args = func_num_args();
		$func_get_args = func_get_args();
		if($func_num_args >1)
			{
				unset($func_get_args[0]);
				$fields = '`' .implode('`, `', $func_get_args) . '`';
				$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM books WHERE book_id = $book_id"));
				return $data;
			}
	}		




//user functions


function change_profile_image($user_id,$file_temp,$file_extn)
{
	$file_path = 'images/profile/'.substr(md5(time()),0,10) . '.'.$file_extn;
	move_uploaded_file($file_temp , $file_path);
	echo $file_path;
	mysql_query("update users set profile ='".$file_path."' where user_id = $user_id");

	
}


 







function exists($user_id)
   {   
	$user_id=sanitize($user_id);
	$query=mysql_query("SELECT COUNT(*)FROM users WHERE user_id = $user_id");
	return (mysql_result($query,0) == 1) ? true : false ;
  }





function update_user($update_data) 
     {
		 global $session_user_id;
		  array_walk ($update_data, 'array_sanitize');
			foreach($update_data as $field =>$data)
			{
				$update[] = '`'. $field .'`=\'' . $data . '\'';
			}
			mysql_query("UPDATE users SET ". implode(', ', $update) . "WHERE user_id = $session_user_id ") or die();

	 }
	 
function change_password($user_id , $password)
	{
	$user_id = (int)$user_id;
	$password = encrypt($password);
	mysql_query ("UPDATE users SET password='$password' WHERE user_id = $user_id ");

	}

function register_user($register_data) 
     {
		  array_walk ($register_data, 'array_sanitize'); 
		  $register_data['password'] = encrypt($register_data['password']);	 
		  $fields = '`'.implode('`, `', array_keys($register_data)) .'`' ;
		  $data  = '\'' .implode('\', \'', $register_data) . '\'';
		  mysql_query("INSERT INTO users ($fields) VALUES ($data)");
	 }
	
function user_data($user_id)
	{
		$data = array();
		$user_id = (int)$user_id;
		
		$func_num_args = func_num_args();
		$func_get_args = func_get_args();
		if($func_num_args >1)
			{
				unset($func_get_args[0]);
				$fields = '`' .implode('`, `', $func_get_args) . '`';
				$data = mysql_fetch_assoc(mysql_query("SELECT $fields from users where user_id = $user_id"));
				return $data;
			}
	}			

function logged_in()
     {
		return(isset($_SESSION['user_id'])) ? true : false;
     }
	 
function user_exists($username)
    {   
		$username=sanitize($username);
		$query=mysql_query("SELECT COUNT('user_id')FROM users WHERE email = '$username'");
		return (mysql_result($query,0) == 1) ? true : false ;
    }
	
function user_active($username)
    {   
		$username=sanitize($username);
		$query=mysql_query("SELECT COUNT('user_id')FROM users WHERE email = '$username' AND active = 1 ");
		return(mysql_result($query, 0) == 1) ? true : false ;
    }
	
function user_id_from_username($username)
    {
		$username=sanitize($username);
		return mysql_result(mysql_query("SELECT user_id FROM users WHERE email='$username'"),0,'user_id');
	}
	
function login($username,$password)
    {
		$user_id = user_id_from_username($username);
		$username=sanitize($username);
		$password=encrypt($password);
		$query=mysql_query("SELECT COUNT('user_id')FROM users WHERE email = '$username' AND password = '$password' ");
		return(mysql_result($query, 0) == 1) ? $user_id : false ;
    }

?>