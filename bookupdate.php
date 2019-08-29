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
    </style>
</head>

<body>
<?php
include 'core/init.php';
protect_page();
$book_id = $_GET['book_id']; 

include 'core/header.php';
?>
    
	<?php
	

	if ( empty($_POST) === false)
	{
	$required_fields = array('title','author','publication','price','quantity','condition','isbn','language','category');
	foreach ($_POST as $key => $value){
	if(empty($value) && in_array($key , $required_fields) === true){
	$errors[] = 'some fields cant be empty';
	break 1;
	} 
	}
	}
	
	?>
	
    <!--update-->
				<?php 
	if (isset($_GET['success'])===true && empty($_GET['success'])===true) {
		echo 'you have successfully updated your data';
	}else {  
	if(empty($_POST) === false && empty($errors) === true)
	{
	   $update_data = array (
		'title'   		=> $_POST['title'],
		'author'    	=> $_POST['author'],
		'publication'   => $_POST['publication'],
		'category'     	=> $_POST['category'],
		'price'       	=> $_POST['price'],
		'language'      => $_POST['language'],
		'pages'      	=> $_POST['pages'],
		'isbn'      	=> $_POST['isbn'],
		'quantity'      => $_POST['quantity'],
		'edition'      	=> $_POST['edition'],
		'condition'     => $_POST['condition'],
	   );
	   array_walk ($update_data, 'array_sanitize');
			foreach($update_data as $field =>$data)
			{
				$update[] = '`'. $field .'`=\'' . $data . '\'';
			}
			mysql_query("UPDATE books SET ". implode(', ', $update) ." WHERE book_id = $book_id ") or die();
	   header('Location: bookupdate.php?success');
	   exit();
	   
	}else if(empty($errors)===false)
	{
		 echo output_errors($errors);
	}
	?>
	<?php
	
	$q=mysql_query("select * from books where book_id= $book_id");
	$res = mysql_fetch_assoc($q);?>
    <form role="form" action="" method="post">
        <div class="container">
            <div class="row">
                <!--Image Code-->
                <div class="col-md-3 col-sm-3 col-xs-10">
                    <img src="<?php echo $res['cover'];?>" width="200" height="250" /></br></br></br>
                    
                </div>
	
                <!--Update-->
                <div class="col-md-2"></div>
                <div class="col-md-9 jumbotron text-danger">
                    <h2>&nbsp;Update Your Details</h2></br>
					
			
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <!--Title-->

                                            <label for="title">Title:</label>
                                           <b> <input type="text" class="form-control" id="title" name="title" value="<?php echo $res['title']?>">
                                        </div>
                                        <div class="form-group">
                                            <!--Author-->

                                            <label for="Author">Author:</label>
                                            <input type="text" class="form-control" id="Author" name="author" value="<?php echo $res['author']?>">
                                        </div>
                                        <div class="form-group">
                                            <!--publication-->

                                            <label for="publication">publication:</label>
                                            <input type="text" class="form-control" id="publication" name="publication" value="<?php echo $res['publication']?>">
                                        </div>
                                        <div class="form-group">
                                            <!--Edition-->

                                            <label for="Edition">Edition:</label>
                                            <input type="text" class="form-control" id="Edition" name="edition" value="<?php echo $res['edition']?>">
                                        </div>
                                        <div class="form-group">
                                            <!--ISBN-->

                                            <label for="ISBN">ISBN:</label>
                                            <input type="text" class="form-control" id="ISBN" name="isbn" value="<?php echo $res['isbn']?>">
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group ">
                                                <!--Language-->

                                                <label for="Language">Language:</label>
                                                <input type="text" class="form-control" id="Language" name="language" value="<?php echo $res['language']?>">
                                            </div>
                                            <div class="form-group">
                                                <!--Quantity-->

                                                <label for="Quantity">Quantity:</label>
                                                <select class="form-control" id="Quantity" name="quantity" value="<?php echo $res['quantity']?>">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="10+">10+</option>

                                                </select>

                                            </div>



                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <!--price-->

                                                <label for="price">price:</label>
                                                <input type="number" class="form-control" id="price" name="price" value="<?php echo $res['price']?>">
                                            </div>
                                            <div class="form-group">
                                                <!--page-->

                                                <label for="page">Total Pages:</label>
                                                <input type="number" class="form-control" id="page" name="pages" value="<?php echo $res['pages']?>">
                                            </div>
                                        </div>
                                        <!--condition-->
                                        <div class="form-group col-md-12">
                                            <label for="condition">Condition</label>
                                            <select class="form-control" id="condition" name="condition" selected="<?php echo $res['condition']?>">
                                                <option value="">Select</option>
                                                <option value="As New">As New</option>
                                                <option value="Fine">Fine</option>
                                                <option value="Good">Good</option>
                                                <option value="Poor">Poor</option>
                                                <option value="Ex library">Ex Library</option>
                                                <option value="Binding Copy">Binding Copy</option>
                                            </select>
                                        </div>
                                        <!--category-->
                                        <div class="form-group col-md-12">
                                            <label for="category">Category</label>
                                             <select class="form-control" id="Category" name="category">
                                <option value="">Select</option>
								<optgroup label="ENGINEERING BOOKS">
                                <option value="cse_it">CSE & IT</option>
								<option value="ece">ECE</option>
                                <option value="eee">EEE</option>
                                <option value="mechanical">MECHANICAL</option>
                                <option value="civil">CIVIL</option>
                                <option value="Petroleum">PETROLEUM</option>
								<option value="engineering_others">ENGINEERING OTHERS</option>
								<optgroup label="MANAGEMENT BOOKS">
                                <option value="marketing_advertisement">MARKETING & ADVERTISEMEMNT</option>
                                <option value="taxation_accounting">TAXATION & ACCOUNTING</option>
								<option value="economics_finance">ECONOMICS & FINANCE</option>
								<option value="management_others">MANAGEMENT OTHERS</option>
								<optgroup label="ENTRANCE EXAM">
                                <option value="IIT_&_AIEEE">IIT & AIEEE</option>
                                <option value="CAT_MBA">CAT & MBA</option>
                                <option value="UPSC_IAS">IAS & UPSC</option>
                                 <option value="ssc_bankpo">SSC & BANK PO</option>
								 <option value="GATE_IES">GATE/IES</option>
								<option value="GRE_GMAT_SAT">GRE/GMAT/SAT</option>
								<option value="IELTS_TOEFL">IELTS/TOEFL</option>
								<option value="entrance_exam_others">ENTRANCE EXAM OTHERS</option>
								<optgroup label="LITERATURE AND FICTION">
								<option value="Action_Adventure">ACTION / ADVENTURE</option>
                                <option value="Crime">CRIME</option>
                                <option value="Classic">CLASSIC</option>
								<option value="mystery">MYSTERY</option>
                                <option value="horror">HORROR</option>
                                <option value="Love_Romance">LOVE & ROMANCE / POETRY </option>
                                <option value="other_Literature_Books">OTHER LITERATURE BOOKS</option>
                                <option value="other_books" >Any Other</option>
								
                            </select>
                                        </div>  </b>                                     
                                        <!--button-->
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-lg-8">
                                                </br> <button type="submit" class="btn btn-primary btn-block">Update</button></br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
	<?php
	}
	?>

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
