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
						<span class="details">Account Information</span>
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

				<li class="m-t-10">
					<a href="javascript:;">
						<span class="title">Booking</span>
						<span class=" arrow "></span>
					</a>
					<span class="bg-success icon-thumbnail themebtn"><i class="pg-cupboard"></i></span>
					<ul class="sub-menu">
						<li class="">
							<a href="<?php echo base_url(); ?>Booking/Booking">Single Booking</a>
							<span class="icon-thumbnail">SBG</span>
						</li>
						<li class="">
							<a href="<?php echo base_url(); ?>Booking/Booking/select">Select Booking</a>
							<span class="icon-thumbnail">SLB</span>
						</li>
					</ul>
				</li>
				<?php if ($_SESSION['is_supervisor'] == 1) { ?>
					<li class="m-t-10">
						<a href="javascript:;">
							<span class="title">Collection</span>
							<span class=" arrow "></span>
						</a>
						<span class="bg-success icon-thumbnail themebtn"><i class="pg-cupboard"></i></span>
						<ul class="sub-menu">
							<li class="">
								<a href="<?php echo base_url(); ?>Collection">FOD to Collect</a>
								<span class="icon-thumbnail">FDC</span>
							</li>
							<li class="">
								<a href="<?php echo base_url(); ?>Collection/collected">Submit Collection</a>
								<span class="icon-thumbnail">SCL</span>
							</li>
							<li class="">
								<a href="<?php echo base_url(); ?>Collection/submitted">Submitted Collection</a>
								<span class="icon-thumbnail">SCV</span>
							</li>
							<li class="">
								<a href="<?php echo base_url(); ?>Collection/discrepancy">Discrepancy Report</a>
								<span class="icon-thumbnail">DCR</span>
							</li>
							<li class="">
								<a href="<?php echo base_url(); ?>Collection/delivered">Delivered & Collected</a>
								<span class="icon-thumbnail">DNC</span>
							</li>
							<li class="">
								<a href="<?php echo base_url(); ?>Collection/undelivered">Undelivered or Not Collected</a>
								<span class="icon-thumbnail">UNC</span>
							</li>
						</ul>
					</li>

					<li class="m-t-10">
						<a href="javascript:;">
							<span class="title">Invoice</span>
							<span class=" arrow "></span>
						</a>
						<span class="bg-success icon-thumbnail themebtn"><i class="pg-signals"></i></span>
						<ul class="sub-menu">

							<li class="">
								<a href="<?php echo base_url(); ?>Invoice">Manage Invoice</a>
								<span class="icon-thumbnail">INV</span>
							</li>
							<li class="">
								<a href="<?php echo base_url(); ?>Invoice/zero_cn">Zero Rated CN</a>
								<span class="icon-thumbnail">ZRC</span>
							</li>
						
						</ul>
					</li>
					
					<li class="m-t-10">
						<a href="javascript:;">
							<span class="title">Customer Account</span>
							<span class=" arrow "></span>
						</a>
						<span class="bg-success icon-thumbnail themebtn"><i class="pg-bag"></i></span>
						<ul class="sub-menu">

							<li class="">
								<a href="<?php echo base_url(); ?>Customer">Manage Customer Accounts</a>
								<span class="icon-thumbnail">MCA</span>
							</li>
							<li class="">
								<a href="<?php echo base_url(); ?>Customer/rate">Manage Customer Rates</a>
								<span class="icon-thumbnail">MCR</span>
							</li>
						</ul>
					</li>

					<li class="m-t-10">
						<a href="javascript:;">
							<span class="title">Franchisee Account</span>
							<span class=" arrow "></span>
						</a>
						<span class="bg-success icon-thumbnail themebtn"><i class="pg-bag"></i></span>
						<ul class="sub-menu">

							<li class="">
								<a href="<?php echo base_url(); ?>Franchisee">Manage Franchisee Accounts</a>
								<span class="icon-thumbnail">MFA</span>
							</li>

						</ul>
					</li>

				<?php } ?>

				<li class="m-t-10">
					<a href="javascript:;">
						<span class="title">CN Book</span>
						<span class=" arrow "></span>
					</a>
					<span class="bg-success icon-thumbnail themebtn"><i class="pg-calender"></i></span>
					<ul class="sub-menu">
						<li class="">
							<a href="<?php echo base_url(); ?>CnBook/default_load">CN Book</a>
							<span class="icon-thumbnail">CNB</span>
						</li>
					</ul>
				</li>

				<li class="m-t-10">
					<a href="javascript:;">
						<span class="title">Tools</span>
						<span class=" arrow "></span>
					</a>
					<span class="bg-success icon-thumbnail themebtn"><i class="pg-settings_small"></i></span>
					<ul class="sub-menu">
						<?php if ($_SESSION['is_supervisor'] == 1) { ?>
							<li class="">
								<a href="<?php echo base_url(); ?>Rider">Rider</a>
								<span class="icon-thumbnail">MR</span>
							</li>
							<li class="">
								<a href="<?php echo base_url(); ?>Route">Route</a>
								<span class="icon-thumbnail">MR</span>
							</li>

							<li class="">
								<a href="<?php echo base_url(); ?>Direct/cs_index">Power Tools</a>
								<span class="icon-thumbnail">TOL</span>
							</li>
							<li class="">
								<a href="<?php echo base_url(); ?>Route/file">Attach File</a>
								<span class="icon-thumbnail">AF</span>
							</li>
						<?php } ?>
						<li class="">
							<a href="<?php echo base_url(); ?>Home/setting_view">Change Password</a>
							<span class="icon-thumbnail">CP</span>
						</li>
					</ul>
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