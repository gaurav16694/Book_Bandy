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
	if(isset($_FILES['profile'])=== true)
	{
		if(empty($_FILES['profile']['name'])===true)
		{
			$errors[]='please choose a file';
		}else {
			$allowed=array('jpg','jpeg','gif','png');
			
			$file_name = $_FILES['profile']['name'];
			$file_extn = strtolower(end(explode('.',$file_name)));
			$file_temp = $_FILES['profile']['tmp_name'];
			if(in_array($file_extn,$allowed)=== true)
			{
				change_profile_image($session_user_id , $file_temp, $file_extn);
				header('Location: usersetting.php');
				exit();
			}else{
				$errors[]='incorrect file format';
			}
	}
	}?>
	

	<!-- profile image update-->
    <form role="form" action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <!--Image Code-->
                <div class="col-md-3 col-sm-3 col-xs-10">
                    <img src="<?php echo $user_data['profile'];?>" width="200" height="200" /></br></br></br>        
                    <label for="cover">Upload profile Image:</label>
                    <input type="file" id="cover" name="profile"><br/>
					<div class="col-md-3"></div>
					<div class="col-md-6">
					<button type="submit" class="btn btn-primary btn-block">Update</button>
                </div><br><br><br>
				<h3><b><?php
				echo output_errors($errors);
				?></b></h3>
				</div>
				</form>
				
				<!--details Update-->
				<?php
				if (empty($_POST) === false)
					{
					$required_fields = array('first_name','phone','address');
					foreach ($_POST as $key => $value){
					if(empty($value) && in_array($key , $required_fields) === true){
					$errors[] = 'some fields cant be empty';
					break 1;
					} 
					}
					}
					
					?>
					<?php 
					if (isset($_GET['success'])===true && empty($_GET['success'])===true) {
						echo '<h3><b>You have successfully updated your data</b></h3>';
					}else {  
					if(empty($_POST) === false && empty($errors) === true)
					{
					   $update_data = array (
					   'first_name'   => $_POST['first_name'],
					   'last_name'    => $_POST['last_name'],
					   'phone'        => $_POST['phone'],
					   'address'      => $_POST['address'],
					   );
					   update_user($update_data);
					   header('Location: usersetting.php?success');
					   exit();
					   
					}else if(empty($errors)===false)
					{
						echo output_errors($errors);
					}}
					?>
				
				<form role="form" action="" method="post">
                
                <div class="col-md-2"></div>
                <div class="col-md-9 jumbotron text-danger">
                    <h2>&nbsp;Update Your Details</h2></br>
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
  
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                </br><label for="name">Name:</label>
                                                <div class="form-inline">
                                                    <input type="text" class="form-control" id="name" name="first_name" value="<?php echo $user_data['first_name'];?>">
                                                    <input type="text" class="form-control" id="name" name="last_name" value="<?php echo $user_data['last_name'];?>">
                                                </div>
                                                </br> <div class="form-group">
                                                    <label for="mno">Mobile Number:</label>
                                                    <input type="text" class="form-control" id="mno" name="phone" value="<?php echo $user_data['phone'];?>">
                                                </div>
                                                </br> <div class="form-group">
                                                    <label for="address">Address:</label>
                                                    <textarea class="form-control" rows="5" id="address" name="address" ><?php echo $user_data['address'];?></textarea>
                                                </div>
                                                <div class="col-md-3"></div>
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-primary btn-block">Update</button></br>
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
