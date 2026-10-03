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