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
        .s {
            background-color: #907895;
        }
        .b{
            color:#743232;
        }
    </style>
</head>

<body>
<?php
include 'core/init.php';
protect_page();
$searchq=$_POST['search'];
include 'core/header.php';

//echo $page=isset($_GET['page'])?$_GET['page']:1;
$perpage=isset($_GET['perpage']) && $_GET['perpage']<=50 ?$_GET['per-page']:10;

?>
   
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 jumbotron text-danger">
                <div class="col-md-8">
                    <h4><span class="glyphicon glyphicon-search text-danger">&nbsp;</span>You Searched for: <?php echo $searchq?></h4>
                </div>
               <div class="col-md-4">
                    <label for="sort">Sort By:</label>
                    <select class="form-control" id="sort" name="sort">
                        <option value="1">name</option>
                        <option value="2">Price</option>
                    </select>
                </div></br></br></br></br> 
                <div class="panel panel-default">
                    <div class="panel-heading">
					

                        <div class="row">
						<?php

							if(isset($_POST['search'])){
								$searchq = $_POST['search'];
								$searchq = preg_replace("#[^0-9a-z]#i"," ",$searchq);
								$query = mysql_query("SELECT * FROM books WHERE title LIKE '%$searchq%' OR author LIKE '%$searchq%' OR isbn LIKE '%$searchq%'");
								$count = mysql_num_rows($query);
								if($count == 0){
									
									$errors='no book found';
									
								}else {
								 while($row = mysql_fetch_array($query))
								{ ?>
                            <div class="col-md-2">
                                <img src="<?php echo $row['cover'];?>" width="130" height="180" />
                            </div>
                            <div class="col-md-8">
                                <a href="bookdetail.php?book_id=<?php echo $row['book_id'];?>"><u><h3><?php echo $row['title'];?></h3></u></a>
                                <div class="b"><h5><?php echo $row['author'];?></h5></div>
                            </div>
                            <div class="col-md-2">
                                <div class="container">
                                    <h2>Price</h2>
                                    <div class="panel panel-default">
                                        <div class="panel-body"><b>Rs <?php echo $row['price'];?><b></div>
                                    </div>
                                </div>
                            </div>  </br></br></br></br></br></br></br></br> </br></br>
							<?php
		
							}	
						}}
						?>                   
						</div>
					</div>
				   </div>
			<!--	<div>
						 <ul class="pagination">
						<li><a href="#">1</a></li>
						<li class="active"><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
					  </ul>
					</div> -->
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
