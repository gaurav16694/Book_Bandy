<!DOCTYPE html>
<html>
<head>
    <title>Book Bandy</title>
	<meta charset="utf-8" />
    <link href="Content/bootstrap-theme.css" rel="stylesheet" />
    <link href="Content/bootstrap.css" rel="stylesheet" />
    <link href="Content/body.css" rel="stylesheet" />
</head>
<body>
<style>
.jumbotron{
background-color:#BEBEBE;}
#title{
align:center;}
</style>
<?php
include 'core/init.php';
logged_in_redirect();
?>
 <!--Image-->
    <nav class="nav navbar-header">
        <div>
            <img src="file.jpg" width="1366" height="200" />
        </div>
  </nav>
 <!--Nav Tabs-->
    <ul class="nav nav-tabs">
        <li role="presentation"><a href="home.php">Home</a></li>
        <li role="presentation" class="active"><a href="index.php">Login</a></li>
        <li role="presentation"><a href="register.php">Register</a></li>
        <li role="presentation"><a href="aboutus.php">About Us</a></li>
    </ul></br>
    <?php
   if (empty($_POST) === false)
	{
	$username =  $_POST['username'];
	$password = $_POST['password'];
   if(user_exists($username)===false){
   $errors[]='We can\'t find any user of this email id ! have you registered ? ';}
//checking for user is active or not
   else if(user_active($username)===false){
   $errors[]='sorry..!! your  account is not active ';}
//checking for password combination
	else{
		$login = login($username, $password);
		if($login===false){
		$errors[]='It seems you entered incorrect combination! Please try again';}
	else{
		$_SESSION['user_id'] = $login;
		header('Location: userhome.php');
		exit();
	}}}?>
 <div id="title">
	<h3><b><?php echo output_errors($errors);;?></b></h3>
</div>
 <!--Box-->
    <div class="text-center">
    <div class="container">
	 <div id="title"> <h2><b> Enter Your Credentials</b></h2></div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 jumbotron">
					<form role="form" action="" method="post">
					<div class="input-group">
                       <!--USERNAME-->
                          <span class="input-group-addon" id="sizing-addon1"></span>
                          <input type="email" class="form-control" placeholder="abc@xyz.com" aria-describedby="sizing-addon2" name="username" required autofocus>
                    </div></br>
					<!--PASSWORD-->
                            <div class="input-group">
                             <span class="input-group-addon" id="sizing-addon2"></span>
						 <input type="password" class="form-control" placeholder="Enter your password" aria-describedby="sizing-addon2" name="password" required autofocus>
                            </div></br>
                            <div class="col-lg-offset-1">
                                <button type="submit" class="btn btn-success btn-block">Login</button>
                                <ul class="pager">
                                    <li><a href="forgot.php">Forgot Password</a></li></ul>
						     </div>
						   </form>
                         </div>
					   </div>
					</div>
			   </div>		
	  <!--footer-->
        <div class="list-inline">
            <div id="footer_outer">
                <div id="footer">
                    <div class="colum1">
                        <h4>Help</h4>
                        <ul>
                            <li><a href="#">Book Bandy : Home</a></li>
                            <li><a href="#">Book Bandy : Help</a></li>
                        </ul>
                    </div>
                    <div class="colum3">
                        <h4>Contact Us</h4>
                        <ul>
                            <li>1800 3256 4589</li>
                            <li class="last">
                                <a href="#">
                                    Email:support@bookbandy.com
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
