<section role="main" class="content-body">
	<header class="page-header">
		<h2><?=$title?></h2>
	</header>
	<!-- start: page -->
	<div class="row">
		<div class="col-md-12">
			<? if ($this->session->flashdata('error'))
			{
				echo "<div class='alert alert-danger'><i class='fa fa-times-circle'></i>&nbsp;&nbsp;".$this->session->flashdata('error')."</div>";
			} ?>
			<? if ($this->session->flashdata('message'))
			{
				echo "<div class='alert alert-success'><i class='fa fa-check-circle'></i>&nbsp;&nbsp;".$this->session->flashdata('message')."</div>";
			} ?>
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions pull-right">
						<a href="<?php echo site_url('admins/'.$webpagename.'/manageimage/'.$projectid.'/'.$this->session->userdata('page_num'));?>"><i class="fa fa-times"></i></a>
					</div>
					<h2 class="panel-title"><?=$subtitle?></h2>
				</header>
				<div class="panel-body">
					<?php echo form_open('admins/'.$webpagename.'/add_projectimage','name="form1" id="form1" enctype="multipart/form-data" '); ?>

						<div class="form-group">
							<div class="row">
								<label class="col-lg-3 col-sm-4 control-label"> Project Image <span class="required">*</span></label>
								<div class="col-lg-4 col-sm-8">
									<input type="hidden" name="project_id" value="<?php echo $projectid ?>"/>
									<a href="javascript:void(0);" class="btn btn-primary btn-md pt-sm pb-sm text-md fileupload_cls">
										<i class="fa fa-upload mr-xs"></i> Upload Image
										<input type="file" name="image" id="image1" class="required" accept=".jpg,.jpeg,.png,.gif" onchange="validate(this.value)">
									</a></br>
									<div id="filemsg" style="display:none"></div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-lg-3 col-sm-4"></div>
								<div class="col-lg-4 col-sm-8 text_center_mobile">
									<input type="hidden" id="csrftokan" value="">
									<input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
									<button type="reset" class="btn btn-default" onclick="TxtReset();">Reset</button>
									<a class="btn btn-default" href="<?php echo site_url('admins/'.$webpagename.'/manageimage/'.$projectid.'/'.$this->session->userdata('page_num')); ?>">Cancel</a>
								</div>
							</div>

						</div>
					<?php echo form_close(); ?>
				</div>
			</section>
		</div>
	</div>
	<!-- end: page -->
</section>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$("#form1").validate();
		});
		
		function TxtReset()
		{
			$("#filemsg").hide();
			$("#errormessage").hide();
			document.forms[0].reset();
			var validator = $( "#form1" ).validate();
			validator.resetForm();
		}
		
		function validate(file) {
			var ext = file.split(".");
			ext = ext[ext.length-1].toLowerCase();      
			var arrayExtensions = ["jpg" , "jpeg", "png", "gif"];

			if (arrayExtensions.lastIndexOf(ext) == -1) {
				$("#filemsg").show();
				document.getElementById('filemsg').style.color="red";
				document.getElementById('filemsg').innerHTML = "Please select valid file extension.";
				$("#flag").val(false);
				document.getElementById("image1").value = "";
			}
		}
	</script>