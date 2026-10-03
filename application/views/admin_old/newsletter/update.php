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
						<!-- <div class="panel-actions pull-right">
							<a href="<?php echo site_url('admins/'.$webpagename.'/index/'.$this->session->userdata('page_num'));?>"><i class="fa fa-times"></i></a>
						</div> -->
						<h2 class="panel-title"><?=ucwords($subtitle)?></h2>
					</header>
					<div class="panel-body">
						<?php echo form_open('admins/'.$webpagename.'/update','name="form1" id="form1" enctype="multipart/form-data" onsubmit="return "'); ?>
							
							<div class="form-group">
								<div class="row">
									<label class="col-lg-3 col-sm-4 control-label">Address <span class="required">*</span></label>
									<div class="col-lg-4 col-sm-8">
										<input type="text" name="address" id="address" class="form-control" maxlength="200" minlength="2" onblur="" placeholder="Enter job Position" value="<?=$details['address']?>" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-lg-3 col-sm-4 control-label">Phone No <span class="required">*</span></label>
									<div class="col-lg-4 col-sm-8">
										<input type="text" name="phoneno" id="phoneno" class="form-control" maxlength="200" minlength="2" onblur="" placeholder="Enter job Position" value="<?=$details['phoneno']?>" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-lg-3 col-sm-4 control-label">Email<span class="required">*</span></label>
									<div class="col-lg-4 col-sm-8">
										<input type="text" name="email" id="email" class="form-control" maxlength="200" minlength="2" onblur="" placeholder="Enter job Position" value="<?=$details['email']?>" required onkeyup="email_validation()">
										<span id="err_emmail" style="display:none; color:red;" class="err_msg">Please enter valid email address.</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-lg-3 col-sm-4 control-label">URL<span class="required">*</span></label>
									<div class="col-lg-4 col-sm-8">
										<input type="text" name="txt_url" id="txt_url" class="form-control" maxlength="200" minlength="2" onblur="" placeholder="Enter job Position" value="<?=$details['txt_url']?>" required onkeyup="url_validation()">
										<span id="err_url" style="display:none; color:red;" class="err_msg">Please enter valid url address.</span>
									</div>
								</div>
							</div>
							
     						

							<div class="form-group">
                                <div class="row">
								<div class="col-lg-3 col-sm-4"></div>
								<div class="col-lg-4 col-sm-8 text_center_mobile">
									<input type="hidden" id="csrftokan" value="">
									<input type="hidden" name="id" value="<?=$details['id']?>"/>
									<input type="submit" name="submit" class="btn btn-primary" value="Update"/>
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
	function email_validation()
{
	var txt_email = $('#email').val();
	//if(/^[a-zA-Z0-9-@. ]*$/.test(txt_email) == false)
	if(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(txt_email) == false)
    {
        $("#err_emmail").show(); 
    }
    else{
       
        $("#err_emmail").hide(); 
    }
}
function url_validation()
{

	var txt_url = $('#txt_url').val();
	var regexp = /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
    if (regexp.test(txt_url)) {
       $("#err_url").show(); 
    } else {
        $("#err_url").show(); 
    }

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