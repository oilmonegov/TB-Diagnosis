<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-icon.png'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Dashboard</title>

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
	                <li class="active">
	                    <a href="<?php echo base_url('user/dashboard'); ?>">   
	                    	<p style="text-align: center;">Dashboard</p>
	                    </a>
	                </li>
	                <li>
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
						<a class="navbar-brand" href="<?php echo base_url('user/dashboard'); ?>">Dashboard</a>
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
					<div class="col-md-12">
					 <?php echo $this->session->flashdata('error_message'); ?>
					</div>
				</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="orange">
									<i class="fa fa-user"></i>
								</div>
								<div class="card-content">
									<p class="category">Users</p>
									<h3 class="title"><?php echo $total_users; ?></h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										Staff users on this system...
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="green">
									<i class="fa fa-user"></i>
								</div>
								<div class="card-content">
									<p class="category">Patients</p>
									<h3 class="title"><?php echo $total_patients; ?></h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										Patients registered on this system...
									</div>
								</div>
							</div>
						</div>
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title"><i class="fa fa-institution"></i> Patient Stats</h4>
	                                <p class="category">All Patients Registered</p>
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table table-hover">
	                                    <thead class="text-warning">
	                                        <th>S/N</th>
	                                    	<th>Name</th>
	                                    	<th>Mobile Number</th>
	                                    	<th>Patient ID</th>
	                                    	<th>Sex</th>
	                                    	<th>&nbsp;</th>
	                                    </thead>
	                                    <tbody>
	                                    <?php 
	                                       if ($patient_details === NULL):
	                                    ?>
	                                    	<tr><td colspan="5" style="text-align: center;">No Patient Record in the Database!
	                                    	<center><a href="<?php echo base_url('user/add_patient'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Patient</a></center></td></tr>
	                                	<?php 
	                                		else: 
	                                 			foreach ($patient_details as $patient):
	                                 				$count++;
	                                	?>
	                                 		<tr>
	                                 			<td><?php echo $count; ?></td><td><?php echo $patient->othernames . ' ' . $patient->surname;?>
	                                 			</td>
	                                 			<td><?php echo $patient->mobile_number; ?></td><td><?php echo $patient->patient_id; ?></td><td><?php echo $patient->sex; ?>
	                                 			</td>
	                                 			<td>
		                                 			<form method="post" action="<?php echo base_url('user/delete_user'); ?>">
		                                 				<input type="hidden" name="id" value="<?php echo $patient->patient_id; ?>" />
		                                 				<button title="Delete Patient Record" class="btn btn-primary" type="submit"><i class="fa fa-trash"></i></button>
		                                 			</form>
	                                 			</td>
	                                 		</tr>
	                                	<?php 
	                                			endforeach;
	                                		endif; 
	                                	?>
	                                    </tbody>
	                                </table>
	                            </div>
	                        </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title"><i class="fa fa-user"></i> Staff Stats</h4>
                                <p class="category">All Staff Registered</p>
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-warning">
                                        <th>S/N</th>
                                    	<th>Name</th>
                                    	<th>Username</th>
                                    	<th>Last Login Time</th>
                                    	<th>&nbsp;</th>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if ($staff_details === NULL):
	                                        ?>

	                                    <tr><td colspan="5" style="text-align: center;">No Staff Record in the Database!
	                                    <center><a href="<?php echo base_url('user/add_staff'); ?>" class="btn btn-info"><i class="fa fa-plus"></i> Add Staff</a></center>

	                                    </td></tr>

	                                 <?php else: 
	                                 			foreach ($staff_details as $staff):
	                                 				$count2++;
	                                 ?><tr><td><?php echo $count2; ?></td><td><?php echo $staff->othernames . ' ' . $staff->surname;?></td>
	                                 <td><?php echo $staff->username; ?></td><td><?php echo date('H:i:s D M Y', strtotime($staff->last_login_time)); ?></td>

	                                   <td>
	                                 		
	                                 	<?php if ($this->session->userdata('username') != $staff->username): ?>
	                                 		<form method="post" action="<?php echo base_url('user/delete_staff'); ?>">
	                                 		<input type="hidden" name="uname" value="<?php echo $staff->username; ?>" />
	                                 		<button title="Delete Staff Record" class="btn btn-info" type="submit"><i class="fa fa-trash"></i>
	                                 		</button>
	                                 		</form>
	                                 	<?php else: ?>
	                                 		<p>This account is logged in</p>
	                                 	<?php endif; ?>
	                                 		
	                                 </td>

	                                 </tr>
	                                <?php 
	                                			endforeach;
	                                endif; ?>
	                                <tr> <td colspan="5"><center><a href="<?php echo base_url('user/add_staff'); ?>" class="btn btn-info"><i class="fa fa-plus"></i> Add Staff</a></center></td></tr>
	                                    </tbody>
	                                </table>
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
