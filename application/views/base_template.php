<?php
if($this->session->userdata('EmployeeNo') == "")
{
	// redirect(403_override, "location");
	redirect('denied', "location");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= @$title; ?></title>

	<!-- Global stylesheets -->
	<link href="<?= base_url(); ?>assets/fonts/roboto.css" rel="stylesheet" type="text/css">
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
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/notifications/jgrowl.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/ui/fullcalendar/fullcalendar.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/tables/datatables/extensions/select.min.js"></script>

	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/forms/styling/switch.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/pickers/anytime.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/pickers/pickadate/legacy.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/notifications/bootbox.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/media/fancybox.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/visualization/echarts/echarts.js"></script>


	<script type="text/javascript" src="<?= base_url(); ?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/pages/form_layouts.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/pages/form_select2.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/pages/picker_date.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/pages/form_validation.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/pages/components_popups.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/pages/datatables_extension_select.js"></script>
	<script type="text/javascript">var webURL = '<?= json_encode(WEBSITE_URL); ?>';</script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/custom.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/maintenance.js"></script>

	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /theme JS files -->


</head>

<body>

	<style>
		.title{
			position: absolute;
  			top:0%;
			left:13%;
		}
	</style>


	<!-- Main navbar -->
	<div class="navbar navbar-inverse bg-danger-600" >
		<div class="navbar-header">
			<a class="navbar-brand" href="<?= MYHUB_URL; ?>?/main">
				<img src="<?= base_url(); ?>assets/images/myhub-logo-white.png" alt="" width="120" height="120">
			</a>
			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-menu3"></i></a></li>
			</ul>
		</div>

		<div class="title">
			<h5>CONTAINER MONITORING</h5>
		</div>



		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?= base_url(); ?>assets/images/no_photo.fw.png" alt="">
						<span class="text-semibold"><?= $this->mylibrary->decrypted($this->session->userdata('empl_name', true)); ?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><?= anchor('logout', '<i class="icon-switch2"></i> Logout'); ?></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
    <?php
        $this->load->view('tpl/partials/nav_bar');
    ?>
	<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<i class="icon-arrow-left52 position-left"></i>
					<span class="text-semibold">
						<?php
						echo ucwords(str_replace('-', ' ', $this->uri->segment(1)));
						?>
					</span>
				</h4>
			</div>
		</div>
	</div>
	<!-- /page header -->

	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
				<div class="row">
					<?php
					if(isset($side_bar)) :
						echo @$side_bar;
					endif;
					?>
					<?= $contents; ?>
				</div>
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->
	<!-- Modal delivery details -->
	<div id="modal_details_view" class="modal" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-full">
			<div class="modal-content">
				<div class="modal-header bg-teal-600">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">Delivery Details</h5>
				</div>
				<div class="modal-body"></div>
			</div>
		</div>
	</div>
	<!-- /modal delivery details -->
	<!-- Footer -->
	<div class="footer text-muted">
		<div class="holder">
			<span class="semi-bold">&copy; ALFAMART PHILS. All Rights Reserved.</span>
			<br/>
		    <i>
		    	No part of this document may be reproduced or utilized in any form or by any means,
		        electronic or mechanical, including photocopying, recording, or by any information
		        storage and retrieval system, without permission in writing from the Company.
		    </i>
		</div>
	</div>
	<!-- /footer -->

</body>
</html>
