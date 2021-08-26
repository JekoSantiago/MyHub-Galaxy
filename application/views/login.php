<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Project Galaxy - Warehouse Container Monitoring System | Login Page</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/ui/drilldown.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/core/app.js"></script>

	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /theme JS files -->

</head>

<body class="login-container">
	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Form with validation -->
				<div class="panel panel-body login-form">
					<div class="text-center">
						<div style="margin-top: 20px;">
							<img src="<?= base_url(); ?>assets/images/Alfamart-logo.png" alt="Alfamart Logo" width="250">
						</div>
						<h5 class="content-group">Login to your account</h5>
					</div>


					<?php if(!empty($this->session->flashdata('error'))) : ?>
					<div class="alert alert-danger no-border" style="text-align: center;">
				       	<?= $this->session->flashdata('error'); ?>
				    </div>
				    <?php endif; ?>

					<?php echo form_open('verify', array('id'=>'login')); ?>

					<div class="form-group has-feedback has-feedback-left">
						<input type="text" class="form-control" placeholder="User ID number" name="username">
						<div class="form-control-feedback">
							<i class="icon-user text-muted"></i>
						</div>
					</div>

					<div class="form-group has-feedback has-feedback-left">
						<input type="password" class="form-control" placeholder="Password" name="password">
						<div class="form-control-feedback">
							<i class="icon-lock2 text-muted"></i>
						</div>
					</div>

					<div class="form-group">
						<input type="hidden" name="user_ip" id="user_ip">
						<button type="submit" id="btnLogin" class="btn bg-pink-400 btn-block" style="letter-spacing: 0.1em">LOGIN</button>
					</div>

					<?php echo form_close(); ?> 
						
				</div>
				<!-- /form with validation -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->
</body>
</html>w