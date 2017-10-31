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
					<div class="col-lg-12 col-md-12">
						<div class="card">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title"><i class="fa fa-user"></i> Patient Diagnosis Report</h4>
                                <p class="category">All Patient Diagnosis Report</p>
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-warning">
                                        <th>S/N</th>
                                    	<th>Name</th>
                                    	<th>ID</th>
                                    	<th>Swollen Lymph Node</th>
                                    	<th>Abnormal Breast</th>
                                    	<th>Rale Breath</th>
                                    	<th>Cough</th>
                                    	<th>Hemoptysis</th>
                                    	<th>Chest Pain</th>
                                    	<th>Fever</th>
                                    	<th>Weight Loss</th>
                                    	<th>Night Sweat</th>
                                    	<th>Appetite Loss</th>
                                    	<th>Fatigue</th>
                                    	<th>HIV</th>
                                    	<th>Chest Radiography</th>
                                    	<th>TBC. Skin Test</th>
                                    	<th>Blood Test</th>
                                    	<th>Remark</th>
                                    	<th>Date</th>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if (count($report) == 0):
	                                        ?>

	                                    <tr><td colspan="5" style="text-align: center;">No Patient Report Found!
	                                    <center><a href="<?php echo base_url('user/diagnose'); ?>" class="btn btn-info"><i class="fa fa-plus"></i> Diagnose Patient</a></center>

	                                    </td></tr>

	                                 <?php else: 
	                                 			foreach ($report as $r):
	                                 				@$count2++;
	                                 ?><tr>
										<td><?php echo $count2; ?></td>
										<td><?php echo $this->user_model->get_patient_names($r->patient_biodata_id); ?></td>
										<td><?php echo 'TBDIAG-MEDIC-00' . $r->patient_biodata_id; ?></td>
										<td><?php echo $r->swollen_lymph_node; ?></td>
										<td><?php echo $r->breast_abnormal; ?></td>
										<td><?php echo $r->rale_breath; ?></td>
										<td><?php echo $r->cough; ?></td>
										<td><?php echo $r->hemoptysis; ?></td>
										<td><?php echo $r->chest_pain; ?></td>
										<td><?php echo $r->fever; ?></td>
										<td><?php echo $r->weight_loss; ?></td>
										<td><?php echo $r->night_sweat; ?></td>
										<td><?php echo $r->lost_appetite; ?></td>
										<td><?php echo $r->fatigue; ?></td>
										<td><?php echo $r->hiv; ?></td>
										<td><?php echo $r->chest_radiography; ?></td>
										<td><?php echo $r->tuberculin_skin_test; ?></td>
										<td><?php echo $r->blood_test; ?></td>
										<td><?php echo $this->user_model->get_diagnosis_msg($r->remark); ?></td>
										<td><?php echo $r->date; ?></td>
										
	                                 </tr>
	                                <?php 
	                                			endforeach;
	                                endif; ?>
	                                <tr> <td colspan="5"><center><a href="<?php echo base_url('user/diagnose'); ?>" class="btn btn-info"><i class="fa fa-plus"></i> Diagnose Patient</a></center></td></tr>
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
