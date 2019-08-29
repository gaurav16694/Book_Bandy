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

        .c {
            color: #ff0000;
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
    <!--nav search-->
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
            <div class="col-md-10">
                <div class="jumbotron q">
                    <div class="container-fluid">
                        <div class="text-left page-header "><h2>Lists</h2></div>
                        <div class="panel well">
                            <div class="col-md-3 c well-sm">
                                <h2>FeedBack</h2>
                            </div>
                            <div class="col-md-5 well-sm"></div>
                            <div class="col-md-4 well-sm">
                                <form role="search" action="" method="post" style="float:right">
                                    <br /><div class="row form-group input-group">
                                        <input type="text" class="form-control" placeholder="Subject" name="search" required>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
						<?php
						if(isset($_POST['search']))
						{
							
							$searchq = $_POST['search'];
							$searchq = preg_replace("#[^0-9a-z]#i"," ",$searchq);
							$query = mysql_query("SELECT * FROM feedback WHERE subject LIKE '%$searchq%' ");
							?> 
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th>feedback_id</th>
                                        <th>email</th>
                                        <th>Subject</th>
                                        <th>Description</th>
                                        <th>Reply</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
									<?php
								 $count = mysql_num_rows($query);
								 if($count == 0)
								 {
									echo 'no feedback found';
								 }
								 else
								{
								 while($row = mysql_fetch_array($query))
								{ ?>
                                        <td><?php echo $row['feedback_id'];?></td>
                                        <td><?php $id=$row['user_id'];
											$q=mysql_query("SELECT * from users WHERE user_id = $id");
											$result=mysql_fetch_assoc($q);?>
											<a href="<?php echo $id; ?>" ><?php echo $result['email'];?></a></td>
                                        <td><?php echo $row['subject'];?></td>
                                        <td class="center"><?php echo $row['description'];?> </td>
                                        <td><img src="glyphicons-381-message-forward.png" /><?php echo '<a href="adminmessage.php?user_id='.$row['user_id'].'">message </a>' ;?></td>
                                        <td><img src="glyphicons-418-disk-remove.png" /><a href="deletefeedback.php?feedback_id=<?php echo $row['feedback_id'];?>"onclick = "if (! confirm('do you want to delete this feedback')) { return false; }">remove</a></td>
                                    </tr>
									<?php
							        	}}
										?>
                                </tbody>
                            </table>
                        </div>
						<?php
						}
						else
						{
						$query =mysql_query("select * from feedback");
						?>
						<div class="panel-body">
                            <table class="table table-striped table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th>feedback_id</th>
                                        <th>email</th>
                                        <th>Subject</th>
                                        <th>Description</th>
                                        <th>Reply</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
									<?php
								 
								 while($row = mysql_fetch_array($query))
								{ ?>
                                        <td><?php echo $row['feedback_id'];?></td>
                                        <td><?php $id=$row['user_id'];
											$q=mysql_query("SELECT * from users WHERE user_id = $id");
											$result=mysql_fetch_assoc($q);?>
											<a href="<?php echo $id; ?>" ><?php echo $result['email'];?></a></td>
                                        <td><?php echo $row['subject'];?></td>
                                        <td class="center"><?php echo $row['description'];?> </td>
                                        <td><img src="glyphicons-381-message-forward.png" /><?php echo '<a href="adminmessage.php?user_id='.$row['user_id'].'">message </a>' ;?></td>
                                        <td><img src="glyphicons-418-disk-remove.png" /><a href="deletefeedback.php?feedback_id=<?php echo $row['feedback_id'];?>"onclick = "if (! confirm('do you want to delete this feedback')) { return false; }">remove</a></td>
                                    </tr>
									<?php
							        	}
										?>
                                </tbody>
                            </table>
                        </div>
						<?php
						}
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="dropdown.js"></script>
    <script src="Scripts/bootstrap.js"></script>
    <script src="Scripts/jquery-1.10.2.js"></script>
</body>
</html>