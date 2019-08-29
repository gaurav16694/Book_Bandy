<?php
include 'core/init.php';
logged_in_redirect();
$input = "123456";


?>


<html>
	<head>
  <title></title>
	<meta charset="utf-8" />
    <link href="Content/bootstrap-theme.css" rel="stylesheet" />
    <link href="Content/bootstrap.css" rel="stylesheet" />
    <link href="Content/body.css" rel="stylesheet" />
  </head>
<body>
<style>
.jumbotron{
	background-color:#BEBEBE;
}
#title{
	
	align:center;
}
</style>
<!--Image-->
    <nav class="nav navbar-header">
        <div>
            <img src="file.jpg" width="1366" height="200" />
        </div>
		</nav>
    <!--Nav Tabs-->
    <ul class="nav nav-tabs">
        <li role="presentation"><a href="home.php">Home</a></li>
        <li role="presentation" ><a href="index.php">Login</a></li>
        <li role="presentation"><a href="register.php">Register</a></li>
        <li role="presentation"><a href="aboutus.php">About Us</a></li>
    </ul>
    </br>
  
<div class="container text-center">    
  <div class="row">
    <div class="col-md-2"></div>
                <div class="col-md-8">
				<h3><b><u>Enter your email to retrive  your  password ......!!!</u></b></h3><br><br><br>
                 <form method="post" action="" > 
                   
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="form-group">

                        <div class="input-group">
                            <!--USERNAME-->
                            <span class="input-group-addon" id="sizing-addon2"></span>
                            <input type="email" class="form-control" placeholder="abc@xyz.com" aria-describedby="sizing-addon2" name="email" required autofocus>
                        </div>
						<br>
						
                              <div class="col-md-10">
                                   <div align="center">
                                    <button type="submit" class="btn btn-primary btn-block" name="submit" style="width:100px"> Submit</button>
									
									</div>
                        </br>
<!--PASSWORD-->
                        
                    </form>
                </div>

            </div>
        </div>
    </div>
	<?php
	if(empty($_POST)==false)
	{
 $email = $_POST['email'];
 if(user_exists($email)== true)
 {
 $res=mysql_query("SELECT password FROM users WHERE email = '$email' ");
  
 if($row=mysql_fetch_assoc($res))
 {
	$p=$row['password'];
	
 }
 $pas=decrypt($p);
 $e=$row['email'];
 $to = $e;
         $subject = "This is automated mail from Book Bandy as you have chose forgot password";
         
         $message = "<b>Your Password is:- </b>";
         $message .= $pas;
         
         $header = "From:adityansenteract@gmail.com \r\n";
         $header .= "Cc: \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "<h4>your password has been successfully sended to your email...</h4>";
         }else {
            echo "<h3>Message could not be sent...</h3>";
         }
}
else
	echo '<h4>Please enter a valid email address</h4>';
	}
?>

   </body>
</html>
