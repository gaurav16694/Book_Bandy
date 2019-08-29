<!--Header & dropdown-->
    <nav class="nav">
        <nav class="nav navbar-header ">
            <div>
               <a href="userhome.php"> <img src="lo.png" width="250" height="110" /></a>
            </div>
        </nav>
        <!--post botton-->
        <nav class="navbar navbar-form navbar-right">
            <a href="posting.php"><img src="postt.png" width="200" height="100"/></a>
        </nav>
    </nav>
    <!--nav search-->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="userhome.php"><span class="glyphicon glyphicon-home btn-lg"></span><b>HOME</b></a>
            </div>
            <div class="dropdown navbar-form navbar-right" style="float:right">

                <span class="dropbtn" onclick="myFunction()"><img src="<?php echo $user_data['profile'];?>" width="55" height="45"/> Welcome <strong class="name"><?php if($user_data['gender']== 'male') echo 'Mr.'.$user_data['first_name'];else echo 'Mrs.'.$user_data['first_name'];?></strong></span>

                <div id="myDropdown" class="dropdown-content">
				<?php if($user_data['type']==1){
					echo '<a href="adminhome.php"><span class="	glyphicon glyphicon-lock btn-sm"></span>admin</a>';
                   echo' <a href="dashboard.php"><span class="glyphicon glyphicon-edit btn-sm"></span>Dashboard</a>';?>
                    <a href="profile.php?user_id=<?php echo $user_data['user_id'];?>"><span class="glyphicon glyphicon-user btn-sm"></span>Profile</a><?php
                   echo ' <a href="changepassword.php"><span class="glyphicon glyphicon-wrench btn-sm"></span>Change Password</a>';
					echo '<a href="usersetting.php"><span class="glyphicon glyphicon-cog btn-sm"></span>setting</a>';
				echo '<a href="logout.php"><span class="glyphicon glyphicon-off btn-sm"></span>logout</a>';}
					else{
						 echo' <a href="dashboard.php"><span class="glyphicon glyphicon-edit btn-sm"></span>Dashboard</a>';
                    echo'<a href="'.$user_data['user_id'].'"><span class="glyphicon glyphicon-user btn-sm"></span>Profile</a>';
                   echo ' <a href="changepassword.php"><span class="glyphicon glyphicon-home btn-sm"></span>Change Password</a>';
					echo '<a href="usersetting.php"><span class="glyphicon glyphicon-cog btn-sm"></span>setting</a>';
                    echo '<a href="showmessage.php"><span class="glyphicon glyphicon-envelope btn-sm"></span>message</a>';
					echo '<a href="logout.php"><span class="glyphicon glyphicon-off btn-sm"></span>logout</a>';
					}
						
					?>
					
                </div>
            </div>

            <form class="navbar-form navbar-right" role="search" action="searchresult.php" method="post">
                <div class="row form-group input-group">                   
                    <input type="text" class="form-control input-lg" placeholder="Title/Author/ISBN.." name="search" required >
                    <span class="input-group-btn">
                        <button class="btn btn-default btn-lg" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                        
                    </span>


                </div>
            </form>


        </div>
    </nav>