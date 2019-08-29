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

        .q {
            background-color: #ffffff;
        }
    </style>
</head>

<body>
<?php
include 'core/init.php';
protect_page();
$user_id=$session_user_id;
if(is_admin($user_id)==false)
{
	header('Location:index.php');
	exit();
}
?>
<?php 

$user_id=$_GET['user_id'];
?>
     <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
  <a class="navbar-brand" href="adminhome.php"><span class="glyphicon glyphicon-cog btn-lg"></span><b>BOOK BANDY : ADMIN PANEL</b></a>
  
            </div>
            <div class="dropdown navbar-form navbar-right">
                
                <a href="adminfeedback.php"><img src="message.png" width="50" height="50" />
                <a href="logout.php"><img src="logout.png" width="40" height="40" /></a>
            </div>
          
        </div>
    </nav>

    <div>
        <div class="row">
            <div class=" col-md-2">
                   <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <aside>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo $user_data['profile'];?>" class="img-circle" width="65" height="55"/> <strong class="name">Welcome&nbsp;&nbsp;<?php if($user_data['gender']== 'male') echo 'Mr.'.$user_data['first_name'];else echo 'Mrs.'.$user_data['first_name'];?></strong><br></hr>
                    <a href="adminhome.php"><br/><img src=" glyphicons-332-dashboard.png" />&nbsp;&nbsp;Dashboard</a>
                    <hr />
                    <a href="adminuserdetail.php"><img src="glyphicons-4-user.png" />&nbsp;&nbsp;Users</a>
                    <hr />
                    <a href="adminbookdetail.php"><img src="glyphicons-352-book-open.png" />&nbsp;&nbsp;Books</a>
                    <hr />
                    <a href="adminsetting.php"><img src="glyphicons-281-settings.png" />&nbsp;&nbsp;Settings</a>
                    <hr />
                    <a href="userhome.php"><img src="glyphicons-792-user-vr.png" />&nbsp;&nbsp;As User</a>
                    <hr />
                </aside>
            </div>
</div>

            </div>
			<?php
				if (isset($_GET['success'])&& empty($_GET['success'])) {
					$errors[]='Message has been sent succesfully';
				}else { 
				if(empty($_POST)==false && empty($errors)==true){
					
					$message_data=array(
					'user_id'   => $user_id,
					'subject'    => $_POST['subject'],
					'message'    =>$_POST['message']);
					 array_walk ($message_data, 'array_sanitize'); 
					  $fields = '`'.implode('`, `', array_keys($message_data)) .'`' ;
					  $data  = '\'' .implode('\', \'', $message_data) . '\'';
					  mysql_query("INSERT INTO message ($fields) VALUES ($data)");
					header('Location:adminmessage.php?success');
				exit();}}
			?>
			
            <form role="form" action="" method="post">               
                    <div class="container-fluid">
                        <div class="text-left page-header"><h2>Message</h2></div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10" >
                            <div class=" col-md-2"></div>
                            <div class="col-md-8">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
									<h4><b><?php echo output_errors($errors)?></b></h4>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <br /><br />
											<?php	$qr=mysql_query("select email from users where user_id= $user_id");
												$res=mysql_fetch_array($qr);?>
												<div class="form-group">
                                                    <label for="subject">to:</label>
                                                    <input type="text" class="form-control" id="subject" value="<?php echo $res['email'];?>" required>
                                                </div>
												<div class="form-group">
                                                    <label for="subject">Subject:</label>
                                                    <input type="text" class="form-control" id="subject" name="subject" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Feedback">Mesaage:</label>
                                                    <textarea class="form-control" rows="5" id="Feedback" name="message" required></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-success btn-md"><b>Send</b></button>
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
        </div>
		</div>
		


    <script src="dropdown.js"></script>
    <script src="Scripts/bootstrap.js"></script>
    <script src="Scripts/jquery-1.10.2.js"></script>
</body>
</html>