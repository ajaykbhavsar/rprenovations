<script type="text/javascript">
	jQuery.validator.addMethod("lettersonly", function(value, element)
	{
		return this.optional(element) || /^[a-z ]+$/i.test(value);
	}, "Letters only please");

	jQuery.validator.addMethod("bannerDimensions", function(value, element)
	{
		return this.optional(element) || element.bannerDimensionsValid === true;
	}, "Banner image must be exactly 1920px X 900px.");

	jQuery.validator.addMethod("bannerExtension", function(value, element)
	{
		return this.optional(element) || /\.(jpg|jpeg|png|gif)$/i.test(value);
	}, "Please select a JPG, JPEG, PNG, or GIF image.");

	$(document).ready(function()
	{
		$("#form1").validate(
		{
			rules:
			{
				banner_image:
				{
					required: true,
					bannerExtension: true,
					bannerDimensions: true
				}
			},
			messages:
			{
				banner_image:
				{
					required: "Please select a banner image.",
					bannerDimensions: "Banner image must be exactly 1920px X 900px."
				}
			},
			errorPlacement: function(error, element)
			{
				if (element.attr("name") === "banner_image")
				{
					$("#filemsg").empty();
					error.appendTo("#filemsg");
				}
				else
				{
					error.insertAfter(element);
				}
			},
		});
	});
</script>
<script type="text/javascript">
	function TxtReset()
	{
		$("#errormsg").hide();
		$("#filemsg").hide();
		document.forms[0].reset();
		document.getElementById("banner_image").bannerDimensionsValid = false;
		var validator = $( "#form1" ).validate();
		validator.resetForm();
	}
	function checktitle()
	{
		/*var csrftokan1 = $("#csrftokan").val(); 
		var title = $("#title").val();
		if(csrftokan1 =='')
		{
			csrftokan = '<?php echo $this->security->get_csrf_hash(); ?>';
		}
		else
		{
			var csrftokan = $("#csrftokan").val();
		}
		var flag=true;

		$.ajax(
		{
			type : "POST",
			url:"<?php echo site_url('admins/homebanner/checktitle');?>",
			data : {'title': title, '<?php echo $this->security->get_csrf_token_name(); ?>' : csrftokan},
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
		return flag;*/
		
		return true;
	}
	
	

</script>
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
					<div class="panel-actions">
						<a href="<?php echo site_url('admins/homebanner/index/'.$this->session->userdata('page_num'));?>"><i class="fa fa-times"></i></a>
					</div>
					<h2 class="panel-title"><?=$subtitle?></h2>
				</header>
				<div class="panel-body">
					<?php echo form_open('admins/homebanner/add','name="form1" id="form1" enctype="multipart/form-data" onsubmit="return checktitle()"'); ?>
					<input type="hidden" id="csrftokan" value="">
					<div class="form-group">
						<label class="col-sm-3 control-label">Title <span class="required"></span></label>
						<div class="col-sm-3">
							<input type="text" name="title" id="title"  class="form-control" maxlength="100" placeholder="Enter Title" onblur="checktitle()"/>
							<span id="errormsg" style="display:none; color:#ff0000">This title  already exists </span>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label">Sub Title <span class="required"></span></label>
						<div class="col-sm-3">
							<input type="text" name="bannnersubtitle" id="bannnersubtitle"  class="form-control" maxlength="100" placeholder="Enter Sub Title"/>
						</div>
					</div>

					<div class="form-group posrelative">
						<label class="col-sm-3 control-label display_none_mobile">Banner Image <span class="required">*</span></label>
						<div class="col-sm-3">
							<a href="javascript:void(0);" class="btn btn-primary btn-md pt-sm pb-sm text-md fileupload_cls">
								<i class="fa fa-upload mr-xs"></i> Upload Web Banner Image
								<input type="file" name="banner_image" id="banner_image" class="form-control " accept=".jpg,.jpeg,.png,.gif" required/>
							</a>
							[.jpg,.jpeg,.png,.gif Only ] and [ Banner Size must be equal to 1920px X 900px. ]  <br/>
							<div id="filemsg"></div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-3">
							<div class="checkbox-custom checkbox-default">
								<input type="checkbox" name="agreeCheck" id="agreeCheck" >
								<label  for="agreeCheck">Is Active?</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-4">
							<input type="submit" name="submit" class="btn btn-primary" value="Add"/>
							<button type="reset" class="btn btn-black" onclick="TxtReset();">Reset</button>
							<a class="btn btn-default" href="<?php echo site_url('admins/homebanner/index/'.$this->session->userdata('page_num')); ?>">Cancel</a>
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
	var _URL = window.URL || window.webkitURL;
	$("#banner_image").on("change", function()
	{
		var input = this;
		input.bannerDimensionsValid = false;
		$("#filemsg").empty();

		if (!input.files || !input.files[0])
		{
			return;
		}

		var file = input.files[0];
		if (!/\.(jpg|jpeg|png|gif)$/i.test(file.name))
		{
			$("#filemsg").text("Please select a JPG, JPEG, PNG, or GIF image.");
			$("#form1").validate().element(input);
			return;
		}

		var img = new Image();
		img.onload = function()
		{
			input.bannerDimensionsValid = this.width === 1920 && this.height === 900;
			$("#form1").validate().element(input);
			_URL.revokeObjectURL(img.src);
		};
		img.onerror = function()
		{
			$("#filemsg").text("The selected image could not be read. Please choose another image.");
			$("#form1").validate().element(input);
			_URL.revokeObjectURL(img.src);
		};
		img.src = _URL.createObjectURL(file);
	});
</script>