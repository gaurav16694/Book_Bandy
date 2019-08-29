<html>
<head>
<title>delete book</title>
</head>
<body>
<?php
include 'core/init.php';
protect_page();
$book_id = $_GET['book_id'];
mysql_query("delete from books where book_id= $book_id");
header('Location: dashboard.php');
exit();



?>
</body>
</html>