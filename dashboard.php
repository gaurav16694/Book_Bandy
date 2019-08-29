<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <link href="Content/bootstrap-theme.css" rel="stylesheet" />
    <link href="Content/bootstrap.css" rel="stylesheet" />
    <link href="Content/body.css" rel="stylesheet" />
   
</head>

<body>
<?php
	include 'core/init.php';
	protect_page();
	$user_id = $user_data['user_id'];
	include 'core/header.php'
	?>
  
    <!--Book Details-->
    <div class="container">
        <div class="row">
          <div class="col-md-1"></div>  
            <div class="col-md-10 jumbotron text-danger">
                <h2><span class="glyphicon glyphicon-book text-danger">&nbsp;</span>Manage Your Post</h2></br>
					<?php
					$query = mysql_query("SELECT * FROM books WHERE user_id = $user_id ");
					$count = mysql_num_rows($query);
					if($count == 0)
					{
						echo '<h3>You dont have posted any book..!!</h3>';

					}else{?>
						 
           
                <div class="panel panel-default">
				
                    <div class="panel-heading"> 
											
                        <div class="row">
						
						<?php
						while($row = mysql_fetch_array($query))
						 { ?>
						
							<div class="col-md-6">
                                <a href="bookdetail.php?book_id=<?php echo $row['book_id'];?>"><h4><u><?php echo strtoupper($row['title']);?></u></h4></a>
                            </div>
                            <div class="col-md-2">
                                <a href="bookupdate.php?book_id=<?php echo $row['book_id'];?>"><h4><img src="edit.png" width="50" height="50"/></h4></a>&nbsp;&nbsp;&nbsp;
                            </div>
                            
                            <div class="col-md-2">
                                <a href="deletebook.php?book_id=<?php echo $row['book_id'];?>"onclick = "if (! confirm('do you want to delete the file')) { return false; }"><h4><img src="delete.png" width="45" height="45"/></h4></a></br></br>
                            </div>
						
							<?php 
							}	
							}
							?>
                        </div>
							<hr>
                    </div>
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
