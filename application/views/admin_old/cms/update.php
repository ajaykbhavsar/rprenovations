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
						<h2 class="panel-title"><?=$subtitle?></h2>
					</header>
						
						
					<div class="panel-body">
						<?php echo form_open('admins/'.$webpagename.'/update','name="form1" id="form1" enctype="multipart/form-data" onsubmit="return "'); ?>
							
							<div class="form-group">
								<div class="row">
									<label class="col-lg-3 col-sm-4 control-label">Title <span class="required">*</span></label>
									<div class="col-lg-4 col-sm-8">
										<input type="text" name="title" id="title" class="form-control" maxlength="200" minlength="2" onblur="" placeholder="Enter job Position" readonly=""value="<?=$details['title']?>">
									</div>
								</div>
							</div>
							<div class="form-group">
                                <div class="row">
									<label class="col-lg-3 col-sm-4 control-label"> Description <span class="required"></span></label>
									<div class="col-lg-8 col-sm-8">
										<textarea name="description" id="description" class=" form-control" required="">
											<?=$details['description']?>
										</textarea>
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
     						

							<div class="form-group">
                                <div class="row">
								<div class="col-lg-3 col-sm-4"></div>
								<div class="col-lg-4 col-sm-8 text_center_mobile">
									<input type="hidden" id="csrftokan" value="">
									<input type="hidden" name="id" value="<?=$details['id']?>"/>
									<input type="submit" name="submit" class="btn btn-primary" value="Save"/>
									<a href="<?php echo site_url('admins/'.$webpagename.'/index/'.$this->session->userdata('page_num'));?>" class="btn btn-default">Cancel</a>
								</div></div>
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
</script>
<script>
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

		var id= "<?=$details['id']?>";
		var name = $("#name").val();
		var flag=true;
		$.ajax(
		{
			type : "POST",
			url:"<?php echo site_url('admins/'.$webpagename.'/checkduplicationbyid');?>",
			data : {'id':id, 'name': name, '<?php echo $this->security->get_csrf_token_name(); ?>' : csrftokan},
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
<script>
	$("#image").change(function() 
	{
		var val = $(this).val();
		switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase())
		{
			case 'jpg': case 'png': case 'jpeg':
        		$("#imagemsg").hide();
				break;
			default:
				$(this).val('');
				$("#imagemsg").show();
				document.getElementById("imagemsg").style.color = "red";
				$("#imagemsg").html('.jpg,.jpeg,.png Only');
				break;
		}
	});

	var _URL = window.URL || window.webkitURL;
	$("#image").change(function(e)
	{
		var file, img;
		if((file = this.files[0]))
		{
			if(this.files[0].type != "image/svg+xml"){
				img = new Image();
				img.onload = function() 
				{
					if(this.width <= 600)
					{
						$("#imagemsg").show();
						document.getElementById("imagemsg").style.color = "red";
						$("#imagemsg").html('Recommended Size greater than or equal to 600px X 400px.');
						$("#flag").val(false);
						document.getElementById("image").value = "";
					}
					if(this.height <= 400)
					{
						$("#imagemsg").show();
						document.getElementById("imagemsg").style.color = "red";
						$("#imagemsg").html('Recommended Size greater than or equal to 600px X 400px.');
						$("#flag").val(false);
						document.getElementById("image").value = "";
					}
					else
					{
						$("#flag").val(true);
						$("#imagemsg").hide();
					}
				};
				img.src = _URL.createObjectURL(file);
			}
		}
	});
</script>