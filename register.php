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
    <!--Image-->
    <nav class="nav navbar-header">
        <div>
            <img src="file.jpg" width="1366" height="150" />
        </div>
    </nav>
    <ul class="nav nav-tabs">
        <li role="presentation"><a href="home.php">Home</a></li>
        <li role="presentation"><a href="index.php">Login</a></li>
        <li role="presentation" class="active"><a href="register.php">Register</a></li>
        <li role="presentation"><a href="aboutus.php">About Us</a></li>
    </ul>
	 <?php	
	include 'core/init.php';
	logged_in_redirect();
	if (empty($_POST) === false)
	{
	$required_fields = array('first_name','email','password','password_again','gender','address');
	foreach ($_POST as $key => $value){
	if(empty($value) && in_array($key , $required_fields) === true){
	$errors[] = '<h3>Some fields cant be empty</h3>';
	break 1;
	} 
	}
	if(empty($errors)=== true){
	if ( user_exists($_POST['email'])=== true){
	$errors[]='<h3>Sorry the user with this email is already registered with us. please Try another email</h3>';
	}
	if($_POST['password']!==$_POST['password_again']){
	$errors[]='<h3>Your password does not match</h3>';
	}
	}
	} 
	?>
	<?php
	if (isset($_GET['success'])&& empty($_GET['success'])) {
		echo '<h2><b>you have been successfully registered with us</b></h2>';
	}else { 
	if(empty($_POST)==false && empty($errors)==true){
		
		$register_data=array(
		'first_name'   => $_POST['first_name'],
		'last_name'    => $_POST['last_name'],
		'email'        => $_POST['email'],
		'password'     => $_POST['password'],
		'gender'       => $_POST['gender'],
		'phone'        => $_POST['phone'],
		'address'      => $_POST['address']
		);
		register_user($register_data);
		header('Location: register.php?success');
		exit();	
	}else if(empty($errors)===false){
		 echo output_errors($errors);
	}?>
     <!--Box-->
        <div class="container">
		
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 jumbotron">
				<div id="title"> <h3><b><u> Enter Your Details To Register With Us.</u></b></h3></div><br><br>
                    <form role="form" action=" " method="post">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <div class="form-inline">
                                    <input type="text" class="form-control" id="name" name="first_name" placeholder="First Name" required  pattern="[A-Za-z]{1,}" title="name should only contain letters">&nbsp;&nbsp;
                                    <input type="text" class="form-control" id="name" name="last_name" placeholder="Last Name" pattern="[A-Za-z]{1,}" title="name should only contain letters">
                                </div>
                            </div>
							<div class="form-group">
                                <label for="email">Email Id:</label>
                                <input type="email" class="form-control" id="email"  name="email" pattern="[a-z0-9._]+@[a-z0-9.-]+\.[a-z]{2,3}$" onblur="showEmail()"required>
							<span style="color:red;" id="msg"></span>
	
                            </div>

                            <div class="form-group">
                                <label for="pwd">Enter your password:</label>
                                <input type="password" class="form-control" id="pwd"  name="password"  required>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Confirm your password:</label>
                                <input type="password" class="form-control" id="pwd" name="password_again" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="mno">Mobile Number:</label>
                                 <input type="text" class="form-control" id="mno" name="phone" minlength= "10" maxlength="10" min="7000000000" max="9999999999" size="10" required>
                            </div>
                            <div class="form-group">
							
							
                                <label for="gender">Gender</label></br>
                                &nbsp;&nbsp;<label><input type="radio" name="gender"  value="male">&nbsp;Male</label>&nbsp;&nbsp;
                                <label><input type="radio" name="gender" value="female">&nbsp;Female</label>
                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <textarea class="form-control" rows="5" id="address" name="address"required ></textarea>
                                </div>
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-primary btn-block">Create an account</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
				<?php } ?>
			
		<div class="list-inline">
         <div id="footer_outer">
            <div id="footer">   
                <div class="colum2">
                    <h4>Help</h4>
                    <ul>
                        <li><a href="home.php">Book Bandy : Home</a></li>
                        <li><a href="#">Book Bandy : Help</a></li>
                    </ul>
                </div>
                <div class="colum3">
                    <h4>Contact Us</h4>
                    <ul>
                        <li>1800 2548 8965 7854</li>
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
  <!--Box-->
  
  <script>
  
  function showEmail()
  {
	  var str=document.getElementById("email").value;
	  //alert(""+str);
	 
	  if(str.length==0)
	  {
		  document.getElementById("msg").innerHTML="";
		  return;
	  }
	  else{
		  var xmlHttp=new XMLHttpRequest();
		  xmlHttp.onreadystatechange= function(){
			  if(xmlHttp.readyState==4 && xmlHttp.status==200)
			  {
				  document.getElementById("msg").innerHTML=xmlHttp.responseText;
			  }
		  }
		  xmlHttp.open("GET","hint.php?q="+str,true);
		  xmlHttp.send();
	  }
  }
  </script>
  
    <script src="Scripts/bootstrap.js"></script>
    <script src="Scripts/jquery-1.10.2.js"></script>
    </body>
</html>
