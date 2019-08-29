<?php
function encrypt($q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decrypt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}

function is_admin($user_id)
{
	$query =mysql_query("SELECT * from users where user_id = $user_id") or die();
	$result=mysql_fetch_assoc($query);
	return ($result['type'] == 1) ? true : false ;
}
	
	
	function logged_in_redirect()
	{
	if( logged_in() === true)
		{
			header('Location: userhome.php');
			exit();
		}
	}





function protect_page()
	{
		if(logged_in() === false)
			{   
				header('Location: index.php');
				exit();
			}
	}

function array_sanitize($item)
	{
		$item=mysql_real_escape_string($item);
	}


function sanitize($data)
	{
		return mysql_real_escape_string($data);
	}
function output_errors($errors)
	{
		$output = array();
		foreach($errors as $error)
			{
				$output[] = '<li>'. $error . '</li>';
			}
		return '<ul>' . implode('', $output) . '</ul>';
	}
?>