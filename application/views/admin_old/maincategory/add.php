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

					<div class="pull-right">
						<a href="<?php echo site_url('admins/'.$webpagename.'/index/'.$this->session->userdata('page_num'));?>" class="btn btn-primary btn_icon"><i class="fa fa-arrow-left"></i>Back</a>

					</div>
					<h2 class="panel-title"><?=ucwords($subtitle)?></h2>
				</header>
				<div class="panel-body">
					<?php echo form_open('admins/'.$webpagename.'/add','name="form1" id="form1" enctype="multipart/form-data" onsubmit="return checkduplication()"'); ?>



					<div class="form-group">
						<div class="row">
							<label class="col-lg-3 col-sm-4 control-label">Main Category name <span class="required">*</span></label>
							<div class="col-lg-4 col-sm-8">
								<input type="text" name="name" id="name" class="form-control" maxlength="200" minlength="2" placeholder="Enter Main Category" required onblur="checkduplication()">
								<span id="errormsg" style="display:none; color:#ff0000">This Main Category Name already exists.</span>
							</div>
						</div>
					</div>
					<!--<div class="form-group">
						<div class="row">
							<label class="col-lg-3 col-sm-4 control-label"> Description <span class="required">*</span></label>
							<div class="col-lg-8 col-sm-8">
								<textarea name="description" id="description" class=" form-control" required=""></textarea>
								<script>
									CKEDITOR.replace('description',{
										"extraPlugins" : 'imgbrowse',
										'filebrowserImageBrowseUrl': '/assets/ckeditor/plugins/imgbrowse/imgbrowse.html?imgroot=userfiles',
										"filebrowserImageUploadUrl": "/assets/ckeditor/plugins/imgbrowse/imgupload.php"
									});
								</script>
							</div>
						</div>
					</div>
					<div class="form-group posrelative">
						<div class="row">
							<label class="col-lg-3 col-sm-4 control-label">Image <span class="required">*</span></label>
							<div class="col-lg-4 col-sm-8">
								<a href="javascript:void(0);" class="btn btn-primary btn-md pt-sm pb-sm text-md fileupload_cls">
									<i class="fa fa-upload mr-xs"></i> Upload Image
									<input type="file" name="image" class="required" id="image" accept=".jpg,.jpeg,.png,.svg">
								</a>
								<div id="imagemsg"></div>
								[ .jpg,.jpeg,.png,.svg Only ] and [ Recommended Size greater than or equal to 100px X 100px. ]
							</div>
						</div>
					</div>-->
					
					<!-- <div class="form-group">
						<div class="row">
							<label class="col-lg-3 col-sm-4 control-label">Meta Title </label>
							<div class="col-lg-4 col-sm-8">
								<input type="text" name="metatitle" id="metatitle" class="form-control" maxlength="200" minlength="2" placeholder="Enter Meta Title">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-lg-3 col-sm-4 control-label">Meta Keyword <span class="required">*</span></label>
							<div class="col-lg-4 col-sm-8">
								<textarea name="metakeyword" id="metakeyword" class=" form-control" style="height:120px"  maxlength="500" minlength="2"></textarea>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-lg-3 col-sm-4 control-label">Meta Description  <span class="required">*</span> </label>
							<div class="col-lg-4 col-sm-8">
								<textarea name="metadesc" id="metadesc" class=" form-control" style="height:120px"  maxlength="500" minlength="2"></textarea>
							</div>
						</div>
					</div> -->
					<div class="form-group">
						<div class="row">
							<label class="col-lg-3 col-sm-4 control-label">Sort Order <span class="required">*</span></label>
							<div class="col-lg-4 col-sm-8">
								<input type="text" name="sort_order" id="sort_order" maxlength="3" class="form-control digits" placeholder="Enter Sort Order" style="width:120px" required  value=""> 
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-lg-3 col-sm-4"></div>
							<div class="col-lg-4 col-sm-8">
								<div class="checkbox-custom checkbox-default">
									<input type="checkbox" name="agreeCheck" >
									<label for="agreeCheck">Is Active?</label>
								</div>
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
								<a class="btn btn-default" href="<?php echo site_url('admins/'.$webpagename.'/index/'.$this->session->userdata('page_num')); ?>">Cancel</a>
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
		$("#form1").validate(
		{
			
			ignore: [],
			debug: false,
			rules: { 
				description:{
					required: function() 
					{
						CKEDITOR.instances.description.updateElement();
					},

					minlength:10
				}
			},
			messages:
			{
				description:{
					required:"This field is required.",
					minlength:"Please enter 10 characters"
				}
			}
		});
	});

	function TxtReset()
	{
		$("#imagemsg").hide();
		$("#errormsg").hide();
		CKEDITOR.instances['description'].setData('');
		document.forms[0].reset();
		var validator = $( "#form1" ).validate();
		validator.resetForm();
	}
</script>
<script type="text/javascript">
	function checkduplication()
	{
		var csrftokan1 = $("#csrftokan").val(); 
		if(csrftokan1 =='')
		{
			var csrftokan = '<?php echo $this->security->get_csrf_hash(); ?>';
		}
		else
		{
			var csrftokan = $("#csrftokan").val();
		}

		var name = $("#name").val();
		var flag=true;
		$.ajax(
		{
			type : "POST",
			url:"<?php echo site_url('admins/'.$webpagename.'/checkduplication');?>",
			data: {'name': name, '<?php echo $this->security->get_csrf_token_name(); ?>' : csrftokan},
			async:false,
			dataType: 'json',
			success : function (data)
			{
				$("#csrftokan").val(data.csrfTokenHash);
				$('input:hidden[name="csrf_test_name"]').val('');
				$('input:hidden[name="csrf_test_name"]').val(data.csrfTokenHash);
				if(data.flag == 1)
				{
					$("#errormsg").show();
					flag=false;
				}
				else
				{
					$("#errormsg").hide();
					flag=true;
				}
			},
		});
		return flag;
	}
</script>