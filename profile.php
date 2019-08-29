<!DOCTYPE html>
<html>
    <head>
	<?php
	include 'core/init.php';
	$user_id = $_GET['user_id'];
	$profile_data = user_data($user_id,'first_name','last_name','email','phone','address','profile','gender');?>
        <title><?php echo $profile_data['first_name'] .' '. $profile_data['last_name'];?> - book bandy </title>
        <meta charset="utf-8" />
        <link href="Content/bootstrap-theme.css" rel="stylesheet" />
        <link href="Content/bootstrap.css" rel="stylesheet" />
        <link href="Content/body.css" rel="stylesheet" />
		<style> nav {
            background-color:#e9e0d6;
        }
       .jumbotron{
           background-color:#d1e0e0;
       } 
    </style> 

    </head>

<body>
<?php

protect_page();
$username = $user_data['email'];

if(isset($_GET['user_id'])=== true && empty($_GET['user_id'])=== false)
{   


if(exists($user_id) === true )
{
	
	
	include 'core/header.php';
	?>
   
    <!--details-->
    <div class="container">
        <div class="row">
            <!--Image Code-->
            <div class="col-md-3 col-sm-3 col-xs-10">
                <img src="<?php echo $profile_data['profile'];?>" width="200" height="200"/>
            </div>
            <!--user Profile Code-->
            <div class="jumbotron col-md-8 col-sm-8 col-xs-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><span class="glyphicon glyphicon-user">&nbsp;</span>User Info</h4>
                    </div>
                    <h4><b>Name </b>:<?php echo $profile_data['first_name'];  echo ' '.$profile_data['last_name'];?> </h4>
                    <h5>Email id :&nbsp;<span class="glyphicon glyphicon-envelope">&nbsp;</span><a href="mailto:<?php echo $profile_data['email'];?>"><?php echo $profile_data['email'];?></a></h5>
                </div>
            </div>
            <!--Personal Information-->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-8 jumbotron">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><span class="glyphicon glyphicon-home">&nbsp;</span>Personal Info</h4>
                        </div>
                        <div class="panel-body">
                            <h5><span class="glyphicon glyphicon-grain">&nbsp;</span><b>Gender&nbsp;</b>:&nbsp;<?php echo $profile_data['gender'];?></h5>
                            <span class="glyphicon glyphicon-home">&nbsp;</span><b>Address of Correspondence</b>&nbsp;:&nbsp;<?php echo $profile_data['address'];?>

                            <h5><span class="glyphicon glyphicon-earphone">&nbsp;</span><b>Phone Number</b>&nbsp;:&nbsp;<?php echo $profile_data['phone'];?></h5>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
	
	<?php
	} else{
		echo 'user does not exist';
	}
}else{
	header('Location: index.php');
	exit();
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
