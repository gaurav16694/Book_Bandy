<html>
<head>
<title>image</title>
</head>
<body>

<?php
include 'core/init.php';
?>
<h1> profile update<h1>
	<?php
	if(isset($_FILES['profile'])=== true)
	{
		if(empty($_FILES['profile']['name'])===true)
		{
			echo 'plz choose a file';
		}else {
			$allowed=array('jpg','jpeg','gif','png');
			
			$file_name = $_FILES['profile']['name'];
			$file_extn = strtolower(end(explode('.',$file_name)));
			$file_temp = $_FILES['profile']['tmp_name'];
			if(in_array($file_extn,$allowed)=== true)
			{
				change_profile_image($session_user_id , $file_temp, $file_extn);
				header('Location: image.php');
				exit();
			}else{
				echo'incorrect file format';
			}
	}
	}
	
	
	if(empty($user_data['profile'])=== false){
		echo '<img src = '.$user_data['profile'].'>';
		
		
	}
	?>
	<form action="" method="post" enctype="multipart/form-data">
	<input type="file" name="profile">
	<input type="submit" value="upload">
	</form>
</body>
</html>