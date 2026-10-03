<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<title><?=ADMIN_SITENAME?> <?if(isset($title) && $title !=""){echo "- ".$title;}?></title>
		<link rel="shortcut icon" href="<?php echo site_url('favicon.ico');?>">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<?php $this->load->view('admin/includes/css.php'); ?>
        <link href="<?php echo site_url('assets/admin/stylesheets/plugins.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo site_url('assets/admin/stylesheets/jquery-ui.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo site_url('assets/admin/stylesheets/custom.css');?>" rel="stylesheet" type="text/css" />

		<!-- Head Libs -->
		<script src="<?php echo site_url('assets/admin/vendor/jquery/jquery.js');?>"></script>
		<script src="<?php echo site_url('assets/admin/vendor/jquery-validation/jquery.validate.min.js');?>"></script>
		<script src="<?php echo site_url('assets/ckeditor/ckeditor.js');?>"></script>
		<script src="<?php echo site_url('assets/admin/vendor/modernizr/modernizr.js');?>"></script>
        <script src="<?php echo site_url('assets/admin/javascripts/jquery-ui.js');?>"></script>
        <script src="<?php echo site_url('assets/admin/javascripts/plugins.js');?>"></script>
	</head>
	<body>
		<section class="body">
			<!-- start: header -->
			<?php $this->load->view('admin/includes/header'); ?>
			<!-- end: header -->
			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php $this->load->view('admin/includes/left_navigation'); ?>
				<!-- end: sidebar -->
				<!-- start: page -->
				<?php $this->load->view($main);?>
				<!-- end: page -->
			</div>
		</section>
		<!-- start: js -->
			<?php $this->load->view('admin/includes/js.php'); ?>
			<script>
				var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
				var stack_bottomleft = {"dir1": "right", "dir2": "up", "push": "top"};
				var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 15, "firstpos2": 15};
				var stack_bar_top = {"dir1": "down", "dir2": "right", "push": "top", "spacing1": 0, "spacing2": 0};
				var stack_bar_bottom = {"dir1": "up", "dir2": "right", "spacing1": 0, "spacing2": 0};
			</script>
			<script type="text/javascript">
				$().ready(function() 
				{
					$('.alert-success').delay(4000).fadeOut();
					$('.alert-danger').delay(4000).fadeOut();
				});
			</script>
			<script>
				$('.popoverData').popover();
				$('.popoverOption').popover({ trigger: "hover" });
			</script>
			<script>
				$(".myval").select2(
				{
					width: "100%",
					formatResult: function (state)
					{
						if (!state.id) return state.text;
						if ($(state.element).data('active') == "0")
						{
							return state.text + "<i class='fa fa-dot-circle-o'></i>";
						}
						else
						{
							return state.text;
						}
					},
					formatSelection: function (state)
					{
						if ($(state.element).data('active') == "0")
						{
							return state.text + "<i class='fa fa-dot-circle-o'></i>";
						}
						else
						{
							return state.text;
						}
					}
				});	 
			</script>
        
		<!-- end: js -->
	</body>
</html>