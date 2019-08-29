<html>
<head>
<title>message</title>
</head>
<body>
<?php
include 'core/init.php';
protect_page();
$user_id=$_GET['user_id'];
$qr=mysql_query("select email from users where user_id= $user_id");
$res=mysql_fetch_array($qr);
?>
<?php
	if (isset($_GET['success'])&& empty($_GET['success'])) {
		echo 'message sent succesfully';
	}else { 
	if(empty($_POST)==false && empty($errors)==true){
		
		$message_data=array(
		'user_id'   => $user_id,
		'subject'    => $_POST['subject'],
		'message'    =>$_POST['message']);
		 array_walk ($message_data, 'array_sanitize'); 
		  $fields = '`'.implode('`, `', array_keys($message_data)) .'`' ;
		  $data  = '\'' .implode('\', \'', $message_data) . '\'';
		  mysql_query("INSERT INTO message ($fields) VALUES ($data)");
		header('Location: message.php?success');
	exit();}}
		?>

<form action="" method="post" >
to:
<input type="text" name="" value="<?php echo $res['email']?>"><br><br>
subject:
<input type="text" name="subject"><br><br>
message:
<textarea name="message" rows="10" cols="20">
</textarea><br><br>
<input type="submit" value="send">
</form>
</body>

</html>