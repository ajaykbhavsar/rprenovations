<style type="text/css" >

input[type="text"].error,input[type="file"].error, input[type="password"].error, textarea.error, select.error {
	border:1px solid #F00!important;
	
}
label.error{ color:#ff0000!important;}

</style>
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
				echo "<div class='alert al ert-success'><i class='fa fa-check-circle'></i>&nbsp;&nbsp;".$this->session->flashdata('message')."</div>";
			} ?>
			<section class="panel">
				<header class="panel-heading">

					<div class="pull-right">
						<a href="<?php echo site_url('admins/'.$webpagename.'/index/'.$this->session->userdata('page_num'));?>" class="btn btn-primary btn_icon"><i class="fa fa-arrow-left"></i>Back</a>

					</div>
					<h2 class="panel-title"><?=ucwords($subtitle)?></h2>
				</header>
				<div class="panel-body">
					<?php echo form_open('admins/'.$webpagename.'/add','name="form1" id="form1" enctype="multipart/form-data" onsubmit="return checkprojectname()"'); ?>



						<div class="form-group">
							<div class="row">
								<label class="col-lg-3 col-sm-4 control-label">Select Category <span class="required">*</span></label>
								<?php  $category=  $this->project_m->getmaincategory();?>
								<div class="col-lg-4 col-sm-8">
									<select class="myval form-control" name="category" id="category" required>
										<option value="">Select Category*</option>
										<?php foreach($category as $row){?>
											<option value="<?= $row['uniqueid']?>"><?= $row['name']?></option>
										<?}?>
									</select>
								</div>
							</div>
						</div>
						

						<div class="form-group">
							<div class="row">
								<label class="col-lg-3 col-sm-4 control-label"> Project name <span class="required">*</span></label>
								<div class="col-lg-4 col-sm-8">
									<input type="text" name="projectname" id="projectname" class="form-control" maxlength="200" minlength="2" placeholder="Enter Project Name" required onblur="checkprojectname()" onclick="hidemessage()">
									<span id="errormessage" style="display:none; color:#ff0000">
											This Project Name already exists for this category.
									<span>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<label class="col-lg-3 col-sm-4 control-label"> Short Description <span class="required"></span></label>
								<div class="col-lg-8 col-sm-8">
									<textarea id="shortdesc" name="shortdesc" maxlength="300" class="form-control" rows="4"  cols="45" style="resize: none;"></textarea>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<label class="col-lg-3 col-sm-4 control-label"> Project Details <span class="required"></span></label>
								<div class="col-lg-8 col-sm-8">
									<textarea name="detaildesc" id="detaildesc" class="form-control" required=""></textarea>
									<script>
										CKEDITOR.replace('detaildesc',{
											"extraPlugins" : 'imgbrowse',
											'filebrowserImageBrowseUrl': '/assets/ckeditor/plugins/imgbrowse/imgbrowse.html?imgroot=userfiles',
											"filebrowserImageUploadUrl": "/assets/ckeditor/plugins/imgbrowse/imgupload.php"
										});
									</script>
								</div>
							</div>
						</div>
						
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
		$("#form1").validate();
	});

	function TxtReset()
	{
		$('#category').select2('val','');
		$("#errormessage").hide();
		CKEDITOR.instances['detaildesc'].setData('');
		document.forms[0].reset();
		var validator = $( "#form1" ).validate();
		validator.resetForm();

	}

	function checkprojectname()
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


		var flag=false;
		var form = $('#form1');
		var name=$('#projectname').val();
		var category=$('#category').val();	
		
		if(name!="" && category!="")
		{
			$.ajax({
				  type : "POST",
				  url:"<?php echo site_url('admins/'.$webpagename.'/checkprojectname');?>",
				  data: {'projectname': name,'category': category, '<?php echo $this->security->get_csrf_token_name(); ?>' : csrftokan},
				  async:false,
				  success : function (data)
						  {
							//alert(data.flag);
							$("#csrftokan").val(data.csrfTokenHash);
							$('input:hidden[name="csrf_test_name"]').val('');
							$('input:hidden[name="csrf_test_name"]').val(data.csrfTokenHash);
							 if(data.flag == true)
							  {
								 $("#errormessage").show();
								 flag=false;	
								 
							  }
							  else
							  {
								flag=true;
							  }
						  }
						
			});
			
			  return flag;
		}
	}
	
	function hidemessage()
	{
		 $("#errormessage").hide();
	}
	
	function numbersonly(e)
	  {
		var unicode=e.charCode? e.charCode : e.keyCode
		if (unicode!=8)
		{
			
			if (unicode<48||unicode>57 ) 
			{
				
				if(unicode==9 || unicode==44 || unicode==127 ||  unicode==37 || unicode==39 || unicode==46)
				{
					
					return true;
				}
				else
				{
					return false 
				}
			}
		}
	}	
</script>