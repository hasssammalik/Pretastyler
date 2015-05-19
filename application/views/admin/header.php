<!DOCTYPE html>
<html <?php if (!empty($body_class)) {print 'class="'.$body_class.'"';} ?>>
	<head>
		<meta charset="UTF-8">
		<title><?php print $title ?> - Prêt à Styler Administration</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<!-- bootstrap 3.0.2 -->
		<link href="/css/admin/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<!-- font Awesome -->
		<link href="/css/admin/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<!-- Ionicons -->
		<link href="/css/admin/ionicons.min.css" rel="stylesheet" type="text/css" />
		<!-- DATA TABLES -->
		<link href="/css/admin/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<!-- Morris chart -->
		<link href="/css/admin/morris/morris.css" rel="stylesheet" type="text/css" />
		<!-- jvectormap -->
		<link href="/css/admin/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
		<!-- fullCalendar -->
		<link href="/css/admin/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
		<!-- Daterange picker -->
		<link href="/css/admin/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
		<!-- bootstrap wysihtml5 - text editor -->
		<link href="/css/admin/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
		<!-- Theme style -->
		<link href="/css/admin/AdminLTE.css?v=2.2.0.0" rel="stylesheet" type="text/css" />

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		<!-- jQuery 2.0.2 -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<!-- jQuery UI 1.10.3 -->
		<script src="/js/admin/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
		<!-- Bootstrap -->
		<script src="/js/admin/bootstrap.min.js" type="text/javascript"></script>
		<!-- Morris.js charts -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<script src="/js/admin/plugins/morris/morris.min.js" type="text/javascript"></script>
		<!-- Sparkline -->
		<script src="/js/admin/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
		<!-- jvectormap -->
		<script src="/js/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
		<script src="/js/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
		<!-- fullCalendar -->
		<script src="/js/admin/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
		<!-- jQuery Knob Chart -->
		<script src="/js/admin/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
		<!-- daterangepicker -->
		<script src="/js/admin/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
		<!-- Bootstrap WYSIHTML5 -->
		<script src="/js/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
		<!-- iCheck -->
		<script src="/js/admin/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
		<!-- DATA TABES SCRIPT -->
		<script src="/js/admin/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
		<script src="/js/admin/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
		<script src="/js/admin/plugins/datatables/dataTables.pagination.input.js" type="text/javascript"></script>
		<!-- AdminLTE App -->
		<script src="/js/admin/AdminLTE/app.js?v=2.2.0.0" type="text/javascript"></script>
		
				
		<?php if (!empty($extraJS)) {
			print $extraJS;
		}
		?>
	</head>
	<body class="<?php if (empty($body_class)) {print 'skin-black';} else {print $body_class;} ?>">
		<?php if (empty($no_headers)) { ?>
		<!-- header logo: style can be found in header.less -->
		<header class="header">
			<a href="/admin.html" class="logo">
				<!-- Add the class icon to your logo image or logo icon to add the margining -->
				Prêt à Styler Admin
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="navbar-right">
					<ul class="nav navbar-nav">
						<!-- Notifications: style can be found in dropdown.less -->

						<?php $num_notific = count( $notifications ) ?>

						<li class="dropdown notifications-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-warning"></i>
								<span class="label label-warning"><?php echo $num_notific ?></span>
							</a>
							<ul class="dropdown-menu">
								<li class="header">You have <?php echo $num_notific ?> notifications</li>
								<li>
									<!-- inner menu: contains the actual data -->
									<ul class="menu">
										<?php foreach ($notifications as $noty) {
										?>
										<li>
											<a href="/admin/notifications.html">
												<i class="fa fa-warning danger"></i> <?php echo $noty['notify_title'] ?>
											</a>
										</li>
										<?php } ?>
										

										<!--
										<li>
											<a href="#">
												<i class="ion ion-ios7-people info"></i> 5 new members joined today
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-users warning"></i> 5 new members joined
											</a>
										</li>

										<li>
											<a href="#">
												<i class="ion ion-ios7-cart success"></i> 25 sales made
											</a>
										</li>
										<li>
											<a href="#">
												<i class="ion ion-ios7-person danger"></i> You changed your username
											</a>
										</li>
										-->
									</ul>
								</li>
								<li class="footer"><a href="/admin/notifications.html">View all</a></li>
							</ul>
						</li>
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="glyphicon glyphicon-user"></i>
								<span><?php print $first_name ?><i class="caret"></i></span>
							</a>
							<ul class="dropdown-menu">
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="/" class="btn btn-default btn-flat">Go to front-end</a>
									</div>
									<div class="pull-right">
										<a href="/admin/logout.html" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<div class="wrapper row-offcanvas row-offcanvas-left">
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="left-side sidebar-offcanvas">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="active">
						<a href="/admin.html">
							<i class="fa fa-dashboard"></i> <span>Dashboard</span>
						</a>
					</li>
					<li class="treeview active">
						<a href="#">
							<i class="fa fa-users"></i>
							<span>User Management</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><a href="/admin/user/general.html"><i class="fa fa-angle-double-right"></i> All Users</a></li>
							<li><a href="/admin/user/trial.html"><i class="fa fa-angle-double-right"></i> Trial Users</a></li>
							<li><a href="/admin/user/premium.html"><i class="fa fa-angle-double-right"></i> Premium Users</a></li>
							<li><a href="/admin/user/uploaders.html"><i class="fa fa-angle-double-right"></i> Uploaders / Retailers</a></li>
							<li><a href="/admin/user/administrators.html"><i class="fa fa-angle-double-right"></i> Administrators</a></li>
						</ul>
					</li>
					<li class="treeview active">
						<a href="#">
							<i class="fa fa-female"></i>
							<span>Garment Management</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><a href="/admin/garment/general.html"><i class="fa fa-angle-double-right"></i> General Garments</a></li>
							<li><a href="/admin/garment/outdated.html"><i class="fa fa-angle-double-right"></i> Outdated Garments</a></li>
							<li><a href="/admin/garment/premium.html"><i class="fa fa-angle-double-right"></i> Premium Garments</a></li>
							<li><a href="/admin/garment/possible-retailer-garments.html"><i class="fa fa-angle-double-right"></i> Possible Retailer Garments</a></li>
						</ul>
					</li>
					<li class="treeview active">
						<a href="#">
							<i class="fa fa-th"></i> 
							<span>Matrix Management</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><a href="/admin/matrix/categories.html"><i class="fa fa-angle-double-right"></i> Categories</a></li>
							<li><a href="/admin/matrix/question-comments.html"><i class="fa fa-angle-double-right"></i> Question Comments</a></li>
						</ul>
					</li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>
		<!-- Right side column. Contains the navbar and content of the page -->
		<aside class="right-side">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					<?php print $title; ?>
					<small><?php print $title_description; ?></small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="/admin.html"><i class="fa fa-dashboard"></i> Home</a></li>
					<?php if (!empty($current_folder)) { ?><li><a href="/admin/<?php print $current_folder_path; ?>.html"><?php print $current_folder; ?></a></li><?php } ?>
					<li class="active"><?php print $title; ?></li>
				</ol>
			</section>
			<!-- Error Content -->
			<?php if (!empty($error_messages)){ ?>
			<section class="content">
				<div class="row">
					<div class="col-md-12">
					<?php foreach($error_messages as $message) { ?>
						<div class="alert alert-danger alert-dismissable">
							<i class="fa fa-ban"></i>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<b><?php print $message['type'] ?>!</b> <?php print $message['content'] ?>
						</div>
					<?php } ?>
					</div>
				</div>
			</section>
			<?php } ?>
			
			<!-- Success Content -->
			<?php if (!empty($success_messages)){ ?>
			<section class="content">
				<div class="row">
					<div class="col-md-12">
					<?php foreach($success_messages as $message) { ?>
						<div class="alert alert-success alert-dismissable">
							<i class="fa fa-check"></i>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<b><?php print $message['type'] ?>!</b> <?php print $message['content'] ?>
						</div>
					<?php } ?>
					</div>
				</div>
			</section>
			<?php } ?>

		<?php } ?>