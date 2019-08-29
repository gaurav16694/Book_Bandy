<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <link href="Content/bootstrap-theme.css" rel="stylesheet" />
    <link href="Content/bootstrap.css" rel="stylesheet" />
    <link href="Content/body.css" rel="stylesheet" />
    <style>
	#category{
		background-color:#EBE9D3;
		opacity:0.90;
		color:#556B2F;
	}
    </style>
</head>
<body>
<?php
include 'core/init.php';
protect_Page();
$user_id=$session_user_id;
include 'core/header.php';?>
 <div class="container">
        <div class="row">
   <!--Filter Code-->
            <div class="col-md-3 col-sm-3 col-xs-10 panel panel-default">
                <div class="panel-heading"> <h4><span class="glyphicon glyphicon-filter">&nbsp;</span>Categories</h4></div>
				<div id="category"><br>
                <ul style="list-style-type:square" >
                <h4><li>ENGINEERING BOOKS</h4>
				  <ul>
                    <li><a href="bookcatlog.php?category=cse_it">CSE & IT</a></li>
					<li><a href="bookcatlog.php?category=ece">ECE</a></li>
                    <li><a href="bookcatlog.php?category=eee">EEE</a></li>
					 <li><a href="bookcatlog.php?category=mechanical">MECHANICAL</a></li>
                    <li><a href="bookcatlog.php?category=civil">CIVIL</a></li>
                    <li><a href="bookcatlog.php?category=petroleum">PETROLEUM</a></li>
					 <li><a href="bookcatlog.php?category=engineering_others">Engineering Others</a></li>
					</ul>
					</li>
					<h4><li>MANAGEMENT BOOKS</h4>
					<ul>
                    <li><a href="bookcatlog.php?category=marketing_advertisement">Marketing & Advertisement</a></li>
                    <li><a href="bookcatlog.php?category=taxation_accounting">Taxation & Accounting</a></li>
                    <li><a href="bookcatlog.php?category=economics_finance">Economics & Finanace</a></li>
                    <li><a href="bookcatlog.php?category=management_others">Management Others</a></li>
					</ul>
					</li>
					<h4><li>ENTRANCE EXAM</h4>
					<ul>
                    <li><a href="bookcatlog.php?category=IIT_AIEEE">IIT & AIEEE</a></li>
                    <li><a href="bookcatlog.php?category=CAT_MBA">CAT & MBA</a></li>
					<li><a href="bookcatlog.php?category=UPSC_IAS">IAS & UPSC</a></li>
					<li><a href="bookcatlog.php?category=ssc_bankpo">SSC & BANK PO</a></li>
					<li><a href="bookcatlog.php?category=GATE_IES">GATE/IES</a></li>
					<li><a href="bookcatlog.php?category=IELTS_TOEFL">IELTS/TOEFL</a></li>
					<li><a href="bookcatlog.php?category=GRE_GMAT_SAT">GRE/GMAT/SAT</a></li>
					<li><a href="bookcatlog.php?category=entrance_exam_others">Entrance Exam Others</a></li>
                   
					</ul>
					</li>
					<h4><li>Literature & FICTION</h4>
					<ul>
					 <li><a href="bookcatlog.php?category=Action_Adventure">Action & Adventure</a></li>
                    <li><a href="bookcatlog.php?category=Crime">Crime</a></li>
                    <li><a href="bookcatlog.php?category=mystery">Mystery</a></li>
                    <li><a href="bookcatlog.php?category=horror">Horror</a></li>
                    <li><a href="bookcatlog.php?category=Love_Romance">Love & Romance</a></li>
                    <li><a href="bookcatlog.php?category=classic">Classic</a></li>
                    <li><a href="bookcatlog.php?category=other_Literature_Books">Other Literature Books</a></li>
					</ul>
					</li>
					<h4><li><b><a href="bookcatlog.php?category=other_books">Others Books</a></b></li></h4>
					</ul><br>
				</div><br>
            </div>
			<div class="col-md-1"></div>
            <!--Book List-->
            <div class="jumbotron col-md-8 col-sm-8 col-xs-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><span class="glyphicon glyphicon-book">&nbsp;</span>Recommended Books</h4></br>
						<div class="row">
						<?php
						$query = mysql_query("SELECT * FROM books ORDER BY RAND() LIMIT 9");
						while($row= mysql_fetch_array($query))
						{
                         ?><div class="col-md-4">
                          <a href="bookdetail.php?book_id=<?php echo $row['book_id'];?>"><img src="<?php echo $row['cover'];?>" width="130" height="180" /></a><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RS <b><?php echo $row['price'];?></b></h4><br>
                           </div> 
                           <?php
						   }
						   ?>				
							</div>	
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer-->
    <div class="list-inline">
        <div id="footer_outer">
            <div id="footer">
                
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
                        <li>1800 425 654</li>
                        <li class="last">
                            <a href="feedback.php">
                                feedback
                            </a>
                        </li>
                    </ul>
                </div>
                <!--Copyright Starts-->
                <div class="copyright">
                    <p>Copyright &copy;2012-2016 Book Bandy. All Rights Reserved</p>
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
