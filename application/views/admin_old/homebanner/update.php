<script type="text/javascript">

	jQuery.validator.addMethod("lettersonly", function(value, element)
	{
		return this.optional(element) || /^[a-z ]+$/i.test(value);
	}, "Letters only please");
	
	$(document).ready(function()
	{
		$("#form1").validate(
		{
			rules:
			{
				firstname:{lettersonly: true},
				lastname:{lettersonly: true},
			}
		});
	});

	function checktitle()
	{
		/*var csrftokan1 = $("#csrftokan").val(); 
		var id = "<?=$homebanner_detail['id']?>";
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
			url:"<?php echo site_url('admins/homebanner/checkupdatetitle');?>",
			data : {'id':id,'title': title, '<?php echo $this->security->get_csrf_token_name(); ?>' : csrftokan},
			async:false,
			dataType: 'json',
			success : function (data)
			{
				$("#csrftokan").val(data.csrfTokenHash);
				$('input:hidden[name="csrf_test_name"]').val('');
				$('input:hidden[name="csrf_test_name"]').val(data.csrfTokenHash); 
				if(data.flag == true)
				{
					$("#errormsg").show();
					flag=false;
				}
				else
				{
					$("#errormsg").hide();
					flag=true;
				}
			}
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
					<?php echo form_open('admins/homebanner/update','name="form1" id="form1" enctype="multipart/form-data" onsubmit="return checktitle();"'); ?>
					<input type="hidden" id="csrftokan" value="">
					<div class="form-group">
						<label class="col-sm-3 control-label">Title <span class="required"></span></label>
						<div class="col-sm-3">
							<input type="text" name="title" id="title"  class="form-control" maxlength="100" placeholder="Enter Title" onblur="checktitle()" value="<?php echo $homebanner_detail['title']; ?>"/>
							<span id="errormsg" style="display:none; color:#ff0000">This title  already exists </span>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Sub Title <span class="required"></span></label>
						<div class="col-sm-3">
							<input type="text" name="bannnersubtitle" id="bannnersubtitle"  class="form-control" maxlength="100" placeholder="Enter Sub Title" value="<?php echo $homebanner_detail['bannnersubtitle']; ?>"/>
						</div>
					</div>
					
					<div class="form-group posrelative">
						<label class="col-sm-3 control-label">Banner Image <!-- <span class="required">*</span> --></label>
						<div class="col-sm-3">
							<a href="javascript:void(0);" class="btn btn-primary btn-md pt-sm pb-sm text-md fileupload_cls">
								<i class="fa fa-upload mr-xs"></i> Upload Banner Image
								<input type="file" name="banner_image" id="banner_image" class="form-control " accept=".jpg,.jpeg,.png,.gif" />
							</a>
							[.jpg,.jpeg,.png,.gif Only ] and [ Banner Size must be equal to 1920px X 900px. ]  <br/>
							<?if($homebanner_detail['banner_image']!="") 
							{ ?>
							<a target='_blank' href="<?=site_url('userfiles/homebanner/main/'.$homebanner_detail['banner_image'])?>">
								<img src="<?=site_url('userfiles/homebanner/main/'.$homebanner_detail['banner_image'])?>" border='0' height='' width='71px'/>
								<input type="hidden" name="old_homebanner" value="<?php echo $homebanner_detail['banner_image']; ?>">
							</a>
							<? } ?>
							<div id="filemsg"></div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-3">
							<div class="checkbox-custom checkbox-default">
								<input class="form-control" name="agreeCheck" id="agreeCheck" type="checkbox" <?php if($homebanner_detail['status']==1){?>checked<?}?>>
								<label  for="agreeCheck">Is Active?</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-4">
							<input type="hidden" name="id" value="<?=$homebanner_detail['id']?>"/>
							
							<input type="submit" name="submit" class="btn btn-primary" value="Save"/>
							<a href="<?php echo site_url('admins/homebanner/index/'.$this->session->userdata('page_num'));?>" class="btn btn-default">Cancel</a>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>
			</section>
		</div>
	</div>
	<!-- end: page -->
</section>
<script type="text/javascript">
	var _URL = window.URL || window.webkitURL;
	$("#banner_image").change(function(e)
	{
		var file, img;
		if((file = this.files[0]))
		{
			img = new Image();
			img.onload = function() 
			{
				if(this.width != 1920)
				{
					$("#filemsg").show();
					document.getElementById("filemsg").style.color = "red";
					$("#filemsg").html('Banner size must be 1920px X 900px');
					$("#flag").val(false);
					document.getElementById("banner_image").value = "";
				}
				if(this.height != 900)
				{
					$("#filemsg").show();
					document.getElementById("filemsg").style.color = "red";
					$("#filemsg").html('Banner size must be 1920px X 900px');
					$("#flag").val(false);
					document.getElementById("banner_image").value = "";
				}
				else
				{
					$("#flag").val(true);
					$("#filemsg").hide();
				}
			};
			img.src = _URL.createObjectURL(file);
		}
	});

	$("#banner_image").change(function() 
	{
		var val = $(this).val();
		switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase())
		{
			case 'gif': case 'jpg': case 'png': case 'jpeg':
			$("#filemsg").hide();
			break;
			default:
			$(this).val('');
			$("#filemsg").show();
			document.getElementById("filemsg").style.color = "red";
			$("#filemsg").html('.jpg,.jpeg,.png,.gif Only');
			break;
		}
	});
	
</script>