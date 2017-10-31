<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-icon.png'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Diagnose Result</title>

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
	                <li class="active">
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
						
						<a class="navbar-brand" href="<?php echo base_url('user/dashboard'); ?>">TB Diagnosis Result</a>
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
	                <div class="col-md-2"></div>
	                    <div class="col-md-8">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title"><i class="fa fa-user"></i> Diagnosis Page</h4>
									<p class="category">TB Expert System</p>
	                            </div>
	                            <div class="card-content">	                                
	                                    <div class="row">
	                                        <div class="col-md-12">
	                                        <h6 style="font-weight: bold;">PATIENT DIAGNOSIS</h6>
												<div class="form-group label-floating">
													<?php 
														if (isset($data)) {
															
															echo "
																Patient Name: <b>" . $name . '</b><br />'. 'Patient ID: <b> TBDIAG-MEDIC-00' . $data->patient_biodata_id . '</b><br />' . 'HIV Status: <b>HIV ' . $data->hiv . '</b><br />' . 'Radiography: <b>' . $data->chest_radiography . '</b><br />' . 'Tuberculin Skin Test: <b>' . $data->tuberculin_skin_test . '</b><br />' . 'Antigen Blood Test: <b>' . $data->blood_test . '<br /></b><hr />' . 'Diagnosis: <b>'. $this->user_model->get_diagnosis_msg($data->remark) . '<br />';
																
														}

													// echo $this->session->flashdata('error_message'); ?>
												</div>
												<div style="text-align: right;"><button class="btn btn-primary pull-right">Print</button></div>
	                                        </div>
	                                     
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
