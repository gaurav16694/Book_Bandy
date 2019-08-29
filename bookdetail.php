<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <link href="Content/bootstrap-theme.css" rel="stylesheet" />
    <link href="Content/bootstrap.css" rel="stylesheet" />
    <link href="Content/body.css" rel="stylesheet" />
	<style>
	nav {
            background-color:#e9e0d6;
        }
</style>
</head>
<body>
<?php

include 'core/init.php';
$book_id =  $_GET['book_id'];
$query=mysql_query("SELECT * from books where book_id = $book_id" );
$result=mysql_fetch_assoc($query);
include 'core/header.php';
?>
    <!--details-->
    <div class="container">
        <div class="row">
            <!--Image Code-->
            <div class="col-md-3 col-sm-3 col-xs-10"><br><br><br>
                <img src="<?php echo $result['cover'];?>" width="200" height="250" /></br></br></br>
                &nbsp<a href="profile.php?user_id=<?Php echo $result['user_id'];?>" class="btn btn-primary">View book owner</a>
            </div>
            <!--Book Details-->
            <div class="jumbotron col-md-8 col-sm-8 col-xs-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><span class="glyphicon glyphicon-book">&nbsp;</span>Book Details</h3>
                    </div><br>
                    <h4>&nbsp;<b>Title : </b> <?php echo $result['title'];?></h4></br>
                    <h4>&nbsp;<b>Author :</b> <?php echo $result['author'];?></h4></br>
                    <h4>&nbsp;<b>Publication :</b> <?php echo $result['publication'];?></h4></br>
                    <h4>&nbsp;<b>book category :</b> <?php echo strtoupper($result['category']);?></h4></br>
					<h4>&nbsp;<b>Edition :</b> <?php echo $result['edition'];?></h4></br>
					<h4>&nbsp;<b>Quantity :</b> <?php echo $result['quantity'];?></h4></br>
                    <h4>&nbsp;<b>ISBN :</b> <?php echo $result['isbn'];?></h4></br>                    
                    <h4>&nbsp;<b>Language :</b> <?php echo $result['language'];?></h4></br>
                    <h4>&nbsp;<b>Price :</b> <?php echo $result['price'];?></h4></br>
                    <h4>&nbsp;<b>Number Of Pages :</b> <?php echo $result['pages'];?></h4></br>
                    <h4>&nbsp;<b>Condition :</b> <?php echo $result['condition'];?></h4></br>
                </div>
            </div>      
       </div>
    </div>
    <!--footer-->
    <div class="list-inline">
        <div id="footer_outer">
            <div id="footer">
                <div class="colum1">
                    <h4>Explore Categories</h4>
                    <ul>

                        <li><a href="#">Engineering</a></li>
                        <li><a href="#">Management</a></li>
                        <li><a href="#">Enterance Exams</a></li>
                        <li><a href="#">Literature & Fiction</a></li>
                        <li><a href="#">Computers &amp; Internet</a></li>
                    </ul>
                </div>
                <div class="colum2">
                    <h4>Help</h4>
                    <ul>
                        <li><a href="#">Book Bandy : Home</a></li>
                        <li><a href="#">Book Bandy : Help</a></li>
                    </ul>
                </div>
                <div class="colum3">
                    <h4>Contact Us</h4>

                    <ul>
                        <li>0000000000</li>
                        <li class="last">
                            <a href="#">
                                Email:abc@bookbandy.com
                            </a>
                        </li>
                    </ul>
                </div>
                <!--Copyright Starts-->
                <div class="copyright">
                    <p>Copyright &copy;2012-2016 AGSB. All Rights Reserved</p>
                </div>
                <span class="clear"></span>
                <!--Copyright Ends-->
            </div>
        </div>
    </div>
    <script src="dropdown.js"></script>
    <script src="Scripts/bootstrap.js"></script>
    <script src="Scripts/jquery-1.10.2.js"></script>
</body>
</html>
