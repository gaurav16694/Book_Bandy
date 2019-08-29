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
include 'core/header.php'
?>

<?php
if (empty($_POST) === false)
	{
	$required_fields = array('current_password','password','password_again');
	foreach ($_POST as $key => $value){
	if(empty($value) && in_array($key , $required_fields) === true){
	$errors[] = 'some fields cant be empty';
	break 1;
	} 
	}if(empty($errors)=== true){
	if( encrypt($_POST['current_password']) !== $user_data['password'])
	{ 
	$errors[] = 'your current password is incorrect';
	}
	if( trim($_POST['password'])!== trim($_POST['password_again'])){
	$errors[]='your password fields does not match';
	}
	//if(strlen($_POST['password'] < 6)) { 
	//$errors[]='your password should be at least equal to or greater  than 6';
	//}
	}
	}
	



?>
    <!--text-->
		<?php
if (isset($_GET['success'])&& empty($_GET['success'])) {
		echo '<h2><b>your password has been changed</b></h2>';
	}else {
	if(empty($_POST)==false && empty($errors)==true){
	change_password( $session_user_id , $_POST['password']);
	header('Location: changepassword.php?success');
	}else if(empty($errors)===false){
		echo output_errors($errors);
	}


?>
    <div class="text-center text-danger">
        <h3> Enter your Credentials</h3>
    </div>

    <!--password Form-->
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 jumbotron">
                <form role="form" action=" " method="post">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <!--Old Password-->

                            <label for="oldpwd">Enter Your Old Password:</label>
                            <input type="password" class="form-control" id="oldpwd" name="current_password">
                        </div>
                        <div class="form-group">
                            <!--New Password-->

                            <label for="newpwd">Enter Your New Password:</label>
                            <input type="password" class="form-control" id="newpwd" name="password">
                        </div>
                        <div class="form-group">
                            <!--Re Password-->

                            <label for="repwd">Confirm Your Password:</label>
                            <input type="password" class="form-control" id="repwd" name="password_again">
                        </div>
                        </br>
                       <div class="row">
                        <div class="col-md-3"></div>
                          <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary btn-block"><b>Change</b></button>
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
