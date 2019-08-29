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
include 'core/header.php';
?>

	<?php
	
	if (empty($_POST) === false)
	{
	$required_fields = array('title','author','publication','price','quantity','condition','language','category');
	foreach ($_POST as $key => $value){
	if(empty($value) && in_array($key , $required_fields) === true){
	$errors[] = '<h3>fields cant be empty</h3>';
	break 1;
	} 
	}
	if(isset($_FILES['cover'])=== true)
	{
		if(empty($_FILES['cover']['name'])===true)
		{
			$errors[] = '<h3>please choose a image to upload</h3>';
		}else {
			$allowed=array('jpg','jpeg','gif','png');
			
			$file_name = $_FILES['cover']['name'];
			$file_extn = strtolower(end(explode('.',$file_name)));
			$file_temp = $_FILES['cover']['tmp_name'];
			if(in_array($file_extn,$allowed)=== true)
			{
				$file_path = 'images/cover/'.substr(md5(time()),0,10) . '.'.$file_extn;
				move_uploaded_file($file_temp , $file_path);
				//echo $file_path;
				//mysql_query("INSERT INTO books(cover) VALUES('".$file_path."')");
			}else{
				$errors[] = '<h3>incorrect file format</h3>';
			}
	}
	}
	
	} 
	?>
	<?php
	if (isset($_GET['success'])&& empty($_GET['success'])) {
		echo '<h2><b>Your book have been successfully posted</b></h2>';
	}else { 
	if(empty($_POST)==false && empty($errors)==true){
		
		$posting_data=array(
		'user_id' 		=> $session_user_id,
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
		'cover'         => $file_path
		);
		post_book($posting_data);
		header('Location: posting.php?success');
		exit();
		
	}else if(empty($errors)===false){
		echo output_errors($errors);
	}
	?>
	
	
    <!--text-->
    <div class="text-center text-danger">
        <h3><B> Enter your Book Details</b></h3>
    </div>

    <!--Form input-->
    <div class="container">


        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 jumbotron">
                <form role="form" action=" " method="post" enctype="multipart/form-data">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <!--Title-->

                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <!--Author-->

                            <label for="Author">Author:</label>
                            <input type="text" class="form-control" id="Author" name="author" required>
                        </div>
                        <div class="form-group">
                            <!--publication-->

                            <label for="publication">publication:</label>
                            <input type="text" class="form-control" id="publication" name="publication" required>
                        </div>
                        <div class="form-group">
                            <!--Edition-->

                            <label for="Edition">Edition:</label>
                            <input type="text" class="form-control" id="Edition" name="edition">
                        </div>
                        <div class="form-group">
                            <!--ISBN-->

                            <label for="ISBN">ISBN:</label>
                            <input type="text" class="form-control" id="ISBN" name="isbn">
                        </div>
                        <div class="col-md-5">
                            <div class="form-group ">
                                <!--Language-->

                                <label for="Language">Language:</label>
                                <input type="text" class="form-control" id="Language" name="language" required>
                            </div>
                             <div class="form-group">
                                <!--Quantity-->

                                <label for="Quantity">Quantity:</label>
                                <select class="form-control" id="Quantity" name="quantity" required>
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
                                <input type="text" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="form-group">
                                <!--page-->

                                <label for="page">Total Pages:</label>
                                <input type="text" class="form-control" id="page" name="pages" >
                            </div>
                        </div>
                        <!--condition-->
                        <div class="form-group col-md-12">
                            <label for="condition">Condition</label>
                            <select class="form-control" id="condition" name="condition" required>
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
                            <select class="form-control" id="Category" name="category" required>
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
                                <option value="IIT_AIEEE">IIT & AIEEE</option>
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
                        </div>
                        <div class="form-group-lg col-md-12">
                            <!--photo-->

                            <label for="cover" >Upload Cover Image:</label>
                            <input type="file" id="cover" name="cover" required>

                        </div>
                        <!--button-->
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-lg-8">
                               </br> <button type="submit" class="btn btn-primary btn-block">Post</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
	<?php
			}
			?>

    <!--Footer-->
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
                        <li>+91987867876</li>
                        <li class="last">
                            <a href="#">
                                Email:abc@bookbandy.com
                            </a>
                        </li>
                    </ul>
                </div>
                <!--Copyright Starts-->
                <div class="copyright">
                    <p>Copyright &copy;2012-2016 bookbandy. All Rights Reserved</p>
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
