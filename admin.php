<html>
<head>
<title>admin panel</title>

</head>
<style>
body{
		background: url("photo_bg.jpg") no-repeat center center fixed;
		
		
	
	}
	</style>
<body>
<?php
include 'core/init.php';
protect_page();
$user_id=$session_user_id;
if(is_admin($user_id)==false)
{
	header('Location:index.php');
	exit();
}
?>
<h1><b><u> Welcome to admin panel</u></b></h1>
<h2>
<ul>
<?php 
$query=mysql_query("select user_id from users");
$usercount=mysql_num_rows($query);
?>
<?php
$queryy=mysql_query("select user_id from users");
$ac=mysql_num_rows($queryy);?>
<?php
$queryyy=mysql_query("select * from users ");
$bl=mysql_num_rows($querryyy);?>
<?php
$q=mysql_query("select book_id from books");
$po=mysql_num_rows($qu);?>
<?php $cont=0;
$qu=mysql_query("select quantity from books");
while($roww=mysql_fetch_assoc($qu))
{
	$cont=$cont+$roww['quantity'];
	
}?>
<!--
<h3><?php echo $usercount;?></h3>
<h3><?phpecho $activecount; ?></h3>
<h3><?php echo $block;?></h3>
<h3><?php echo $postcount;?></h3>
<h3><?php echo $cont;?></h3> -->

<li><a href="checkfeedback.php">see all the feed back</a></li>
<li><a href="userlist.php">see all users</a></li>
<li><a href="totalbook.php">see all the books</a></li>
<ul>
</h2>







</body>
</html>
