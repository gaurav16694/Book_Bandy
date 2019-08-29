<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <link href="Content/bootstrap-theme.css" rel="stylesheet" />
    <link href="Content/bootstrap.css" rel="stylesheet" />
    <link href="Content/body.css" rel="stylesheet" />
    <style>
	  .s {
            background-color: #907895;
        }
    </style>
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
	$required_fields = array('subject','description');
	foreach ($_POST as $key => $value){
	if(empty($value) && in_array($key , $required_fields) === true){
	$errors[] = 'fields cant be empty';
	break 1;
	} 
	}
	}
	?>
	<?php
	if (isset($_GET['success'])&& empty($_GET['success']))
		{
		echo '<h2>your feedback have been submitted successfully</h2>' ;
	}else { 
	if(empty($_POST)==false && empty($errors)==true){
		
		$feedback_data=array(
		'user_id' 		   => $session_user_id,
		'subject'   		=> $_POST['subject'],
		'description'    	=> $_POST['description'],
		
		);
		  array_walk ($feedback_data, 'array_sanitize'); 
		  $fields = '`'.implode('`, `', array_keys($feedback_data)) .'`' ;
		  $data  = '\'' .implode('\', \'', $feedback_data) . '\'';
		  mysql_query("INSERT INTO feedback ($fields) VALUES ($data)") or die();
		header('Location: feedback.php?success');
		exit();
		
	}else if(empty($errors)===false){
		echo output_errors($errors);
	}
	?>
    <!--Feedback Columns-->
    <form role="form" action=" " method="post">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 jumbotron text-danger">
                    <h2>&nbsp;Give Your Feedback Here</h2></br>
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="subject">Subject:</label>
                                            <input type="text" class="form-control" id="subject" name="subject" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Feedback">Feedback:</label>
                                            <textarea class="form-control" rows="8" id="Feedback" name="description" required></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                        </div>
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
        </div>
        </form>
		
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
