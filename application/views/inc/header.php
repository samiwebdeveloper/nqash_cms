<?php include "head_link.php"; ?>
<style>
	.themebtn {
		background-image: linear-gradient(45deg, #6d5eac, #949AEF);
		color: white;
	}

	#more {
		display: none;
	}
</style>
<?php
if ($_SESSION['user_name'] == "" && $_SESSION['portal'] != "ops") {
	redirect('Login');
} ?>

<body class="fixed-header windows desktop pace-done">
	<!-- BEGIN SIDEBAR -->
	<!-- BEGIN SIDEBPANEL-->
	<nav class="page-sidebar" data-pages="sidebar">
		<!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
		<div class="sidebar-overlay-slide from-top" id="appMenu">

		</div>
		<!-- END SIDEBAR MENU TOP TRAY CONTENT-->
		<!-- BEGIN SIDEBAR MENU HEADER-->
		<div class="sidebar-header">
			CMS
			<div class="sidebar-header-controls">
				<button type="button" class="btn btn-link d-lg-inline-block d-xlg-inline-block d-md-inline-block d-sm-none d-none" data-toggle-pin="sidebar"><i class="fa fs-12"></i></button>
			</div>
		</div>
		<!-- END SIDEBAR MENU HEADER-->
		<!-- START SIDEBAR MENU -->
		<div class="sidebar-menu">
			<!-- BEGIN SIDEBAR MENU ITEMS-->
			<!------------------------Accounts Power Start-------------------------->
			<ul class="menu-items">
				<li class="m-t-30">
					<a href="<?php echo base_url(); ?>home" class="detailed">
						<span class="title">Dashboard</span>
						<span class="details">CMS</span>
					</a>
					<span class="icon-thumbnail themebtn"><i class="pg-thumbs"></i></span>
				</li>
				<li class="m-t-10">
					<a href="<?php echo base_url(); ?>Slider_Controller" target='Blank' class="detailed">
						<span class="title">Add Slider</span>
						<span class="details">Add Slider</span>
					</a>
					<span class="icon-thumbnail themebtn"><i class="pg-search"></i></span>
				</li>

				<li class="m-t-10">
					<a href="<?php echo base_url(); ?>Event_Controller" target='Blank' class="detailed">
						<span class="title">Add Event</span>
						<span class="details">Add Event</span>
					</a>
					<span class="icon-thumbnail themebtn"><i class="pg-search"></i></span>
				</li>
				<li class="m-t-10">
					<a href="<?php echo base_url(); ?>Project_Controller" target='Blank' class="detailed">
						<span class="title">Add Project</span>
						<span class="details">Add Project</span>
					</a>
					<span class="icon-thumbnail themebtn"><i class="pg-search"></i></span>
				</li>
				
				<li class="m-t-10">
					<a href="<?php echo base_url(); ?>Event_Controller/add_contact" target='Blank' class="detailed">
						<span class="title">Add Contact</span>
						<span class="details">Add Contact</span>
					</a>
					<span class="icon-thumbnail themebtn"><i class="pg-search"></i></span>
				</li>

			
			</ul>
			<!---Accounts Powers ---->


			<div class="clearfix"></div>
		</div>
		<!-- END SIDEBAR MENU -->
	</nav>
	<!-- END SIDEBAR -->
	<!-- END SIDEBAR -->
	<!-- START PAGE-CONTAINER -->
	<div class="page-container">
		<!-- START PAGE HEADER WRAPPER -->
		<!-- START HEADER -->
		<div class="header ">
			<!-- START MOBILE SIDEBAR TOGGLE -->
			<a href="#" class="btn-link toggle-sidebar d-lg-none pg pg-menu" data-toggle="sidebar">
			</a>
			<!-- END MOBILE SIDEBAR TOGGLE -->
			<div class="">
				<!-- <div class="brand inline  m-l-10 ">
					<img src="<?php echo base_url(); ?>assets/img/tmlogo1.png" alt="logo" data-src="<?php echo base_url(); ?>assets/img/tmlogo1.png" data-src-retina="<?php echo base_url(); ?>assets/img/tmlogo1.png" width="120" height="80">
				</div> -->

			</div>
			<div class="d-flex align-items-center">
				<!-- START User Info-->
				<div class="pull-left p-r-10 fs-14 font-heading d-lg-block d-none">
					<span class="semi-bold"><?php echo $_SESSION['user_name']; ?> </span>
				</div>
				<div class="dropdown pull-right d-lg-block d-none">
					<button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="thumbnail-wrapper d32 circular inline">
							<img src="https://cdn.iconscout.com/icon/free/png-256/laptop-user-1-1179329.png" alt="" data-src="https://cdn.iconscout.com/icon/free/png-256/laptop-user-1-1179329.png" data-src-retina="<?php echo base_url(); ?>assets/img/profiles/avatar_small2x.jpg" width="32" height="32">
						</span>
					</button>
					<div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
						<a href="#" class="dropdown-item"><i class="pg-settings_small"></i> Settings</a>
						<a href="<?php echo base_url(); ?>Login/logout" class="clearfix bg-master-lighter dropdown-item">
							<span class="pull-left">Logout</span>
							<span class="pull-right"><i class="pg-power"></i></span>
						</a>
					</div>
				</div>
				<!-- END User Info-->

			</div>
		</div>
		<!-- END HEADER -->
		<!-- END PAGE HEADER WRAPPER -->