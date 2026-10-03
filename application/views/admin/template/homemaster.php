<!doctype html>
<html class="fixed">
	<head>
		<title><?=ADMIN_SITENAME?> <?if(isset($title) && $title !=""){echo "- ".$title;}?></title>
		<link rel="shortcut icon" href="<?php echo site_url('favicon.ico');?>">
		<!-- Basic -->
		<meta charset="UTF-8">
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<?php $this->load->view('admin/includes/css.php'); ?>

		<!-- Head Libs -->
		<script src="<?php echo site_url('assets/admin/vendor/jquery/jquery.js');?>"></script>
		<script src="<?php echo site_url('assets/admin/vendor/jquery-validation/jquery.validate.min.js');?>"></script>
	</head>
	<body>
		<!-- start: page -->
		<?php $this->load->view($main); ?>
		<!-- end: page -->
		<!-- start: js -->
			<?php $this->load->view('admin/includes/js.php'); ?>
			<script type="text/javascript">
				$().ready(function()
				{
					$('.alert-success').delay(2000).fadeOut();
					$('.alert-danger').delay(2000).fadeOut();
				});
			</script>
		<!-- end: js -->
	</body>
</html>