<html>
<head>
<title>admin panel</title>
</head>
<body>
<?php
include 'core/init.php';
$user_id=$session_user_id;
$query =mysql_query("SELECT type from users where user_id = $user_id") or die();
$result=mysql_fetch_assoc($query);
if($result['type']== 0)
{
	header('Location:index.php');
	exit();
}else{	
?>
<h1> welcome to admin panel</h1>
<?php
$queryy =mysql_query("select * from feedback");
$count=mysql_num_rows($queryy);


	?>
	<h2>feedback count= &nbsp<?php echo $count;?><b></h2>
	<table border="3" cellpadding="10">
	<caption><h3> feedback</h3></caption>
	<tr>
	<th> user_id</th>
	<th>feedback_id</th>
	<th>subject</th>
	<th>description</th>
	<th>action</th>
	</tr>
	<tr>
	<?php
	while($row=mysql_fetch_array($queryy))
{?>
	<td><?php echo $row['user_id'];?></td>
	<td><?php echo $row['feedback_id'];?></td>
	<td><?php echo $row['subject'];?></td>
	<td><?php echo $row['description'];?> </td>
	<td><a href="deletefeedback.php?feedback_id=<?php echo $row['feedback_id'];?>"  onclick = "if (! confirm('do you want to delete the file')) { return false; }"><img src="download.png" width="45" height="45"/></a>
	 </td>
	</tr>	
	<?php
}
?>
	</table>
	




<?php
}
?>
</body>
</html>