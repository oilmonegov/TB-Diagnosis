<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-icon.png'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>User Profile</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url('assets/css/material-dashboard.css'); ?>" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url('assets/css/demo.css') ; ?>" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css') ;?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ;?>" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="wrapper">

	    <div class="sidebar" data-color="purple" data-image="<?php echo base_url('assets/img/sidebar-1.jpg'); ?>">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="<?php echo base_url(); ?>" class="simple-text">
					TB Expert System
				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
	                <li>
	                    <a href="<?php echo base_url('user/dashboard'); ?>">
	                       
	                        <p style="text-align: center;">Dashboard</p>
	                    </a>
	                </li>
	                <li class="active">
	                    <a href="<?php echo base_url('user/profile'); ?>">
	                    
	                        <p style="text-align: center;">User Profile</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="<?php echo base_url('user/add_patient'); ?>">
	                      
	                        <p style="text-align: center;">Add Patient</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="<?php echo base_url('user/add_staff'); ?>">
	                       
	                        <p style="text-align: center;">Add Staff</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="<?php echo base_url('user/diagnose'); ?>">
	                   
	                        <p style="text-align: center;">Diagnose</p>
	                    </a>
	                </li>
					<li>
	                    <a href="<?php echo base_url('user/report'); ?>">
	                        <p style="text-align: center;">Report</p>
	                    </a>
	                </li>
	            </ul>
	    	</div>
	    </div>

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						
						<a class="navbar-brand" href="<?php echo base_url('user/dashboard'); ?>">User Profile</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a class="btn btn-danger" href="<?php echo base_url('login/logout'); ?>">
	 							   Logout
		 						</a>
							</li>
						</ul>

						
					</div>
				</div>
			</nav>

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-8">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title"><i class="fa fa-edit"></i> Edit Profile</h4>
									<p class="category">Complete your profile</p>
	                            </div>
	                            <div class="card-content">
	                            <?php echo $this->session->flashdata('error_message'); ?>
	                                <form method="post" action="<?php echo base_url('user/update_profile');?>">
	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label"><?php echo $othernames ; ?></label>
													<input name="othernames" type="text" required class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label"><?php echo $surname ; ?></label>
													<input name="surname" required type="text" class="form-control" >
												</div>
	                                        </div>
							<div class="col-md-4">
	                                        </div>
							<div class="col-md-4">
	                                   <?php echo $captcha['image']; ?></center>
	                                   </div>   
  				  <div class="col-md-12">
												<div class="form-group label-floating">
												<?php
     				$word = $captcha['word'];
    				
    			?> 
													<label class="control-label">Captcha Word</label>
													<input required name="captcha" type="text" class="form-control" >
													<input type="hidden" name="captcha_word" value="<?php echo $word; ?>" />
												</div>
	                                        </div>

	                              </div>  
	                                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
	                                    <div class="clearfix"></div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
						<div class="col-md-4">
    						<div class="card card-profile">
    							<div class="card-avatar">
    								<a href="#pablo">
    									<img class="img" src="<?php echo base_url('assets/img/avatar.png'); ?>" />
    								</a>
    							</div>

    							<div class="content">
    								<h6 class="category text-gray">Hospital Staff</h6>
    								<h4 class="card-title"><?php echo $name; ?></h4>
    								<p class="card-content">
    									username: <?php echo $username; ?>
    								</p>
    								<a href="change_password" class="btn btn-primary btn-round">Update Password</a>
    							</div>
    						</div>
		    			</div>
	                </div>
	            </div>
	        </div>

	       <footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul>
							<li>
								<a href="<?php echo base_url('user/dashboard'); ?>">
									Dashboard
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('user/profile'); ?>">
									User Profile
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('user/add_patient'); ?>">
									Add Patient
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('user/add_staff'); ?>">
								   Add Staff
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('user/diagnose'); ?>">
									Diagnose
								</a>
							</li>
						</ul>
					</nav>
					<p class="copyright pull-right">
						&copy; <script>document.write(new Date().getFullYear())</script> Udochukwu
					</p>
				</div>
			</footer>
		</div>
	</div>

</body>

	<!--   Core JS Files   -->
	<script src="<?php echo base_url('assets/js/jquery-3.1.0.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ;?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/material.min.js'); ?>" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo base_url('assets/js/chartist.min.js'); ?>"></script>

	<!--  Notifications Plugin    -->
	<script src="<?php echo base_url('assets/js/bootstrap-notify.js'); ?>"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="<?php echo base_url('assets/js/material-dashboard.js'); ?>"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url('assets/js/demo.js'); ?>"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

			// Javascript method's body can be found in assets/js/demos.js
        	demo.initDashboardPageCharts();

    	});
	</script>

</html>
