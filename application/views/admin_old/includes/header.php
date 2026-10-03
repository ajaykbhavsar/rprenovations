<!-- start: loader -->
	<div class="loadermain" style="display:none;">
		<div class="sk-cube-grid">
		  <div class="sk-cube sk-cube1"></div>
		  <div class="sk-cube sk-cube2"></div>
		  <div class="sk-cube sk-cube3"></div>
		  <div class="sk-cube sk-cube4"></div>
		  <div class="sk-cube sk-cube5"></div>
		  <div class="sk-cube sk-cube6"></div>
		  <div class="sk-cube sk-cube7"></div>
		  <div class="sk-cube sk-cube8"></div>
		  <div class="sk-cube sk-cube9"></div>
		</div>
	</div>
<!-- end: loader -->
<!-- start: header -->
	<header class="header">
		<div class="logo-container">
			<a href="<?=site_url('admins/dashboard');?>" class="logo">
				<img src="<?php echo site_url('assets/admin/images/logo.png');?>" height="" alt="<?=ADMIN_SITENAME?>"/> 
				<!-- <h3 style="color: black"><p><?=SITENAME?></p></h3> -->
			</a>
			<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
				<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
			</div>
		</div>
		<!-- start: search & user box -->
			<div class="header-right">
				<span class="separator"></span>
				<div id="userbox" class="userbox">
					<a href="#" data-toggle="dropdown">
						<figure class="profile-picture">
							<img src="<?php echo site_url('assets/admin/images/user-circle-solid.svg');?>" alt="Joseph Doe" class="img-circle" data-lock-picture="<?php echo site_url('assets/admin/images/!user-circle-solid-user.svg');?>" />
						</figure>
						<div class="profile-info">
							<span class="role"><?=$this->session->userdata('loginname');?></span>
						</div>
						<i class="fa custom-caret"></i>
					</a>
					<div class="dropdown-menu">
						<ul class="list-unstyled">
							<li class="divider"></li>
							<!-- <li>
								<a href="<?php echo site_url('admins/myprofile');?>" role="menuitem" tabindex="-1"><i class="fa fa-user"></i>	My Profile</a>
							</li> -->
							<li>
								<a href="javascript:void(0);" role="menuitem" tabindex="-1" data-target="#changePassword" data-toggle="modal" title="Change Password"><i class="fa fa-key"></i>	Change Password</a>
							</li>
							<li>
								<a href="<?php echo site_url('admin/signout');?>" role="menuitem" tabindex="-1"><i class="fa fa-power-off"></i>	Sign Out</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<!-- end: search & user box -->
	</header>
<!-- end: header -->
<!-- start: change password modal -->
	<div class="modal fade" id="changePassword" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Change Password</h4>
				</div>
				<!-- Modal Body -->
				<div class="modal-body">
					<form id="changepasswordform" name="changepasswordform">
						<div class="alert alert-success" id="successchngpwd" style="display:none;"><i class='fa fa-check-circle'></i>&nbsp;&nbsp;Change password Successfully.</div>
						<div class="alert alert-danger" id="errorchngpwd" style="display:none;"><i class='fa fa-times-circle'></i>&nbsp;&nbsp;Something went wrong. Please try again!</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Current Password<span class="required">*</span></label>
							<div class="col-sm-8">
								<input type="password" name="currentpassword" id="currentpassword"  minlength="8" maxlength="20" class="form-control" placeholder="Enter Current Password" onblur="checkcurrentpassword();" required/>
								<span id="errorcrntpwd" style="display:none; color:#ff0000">Please enter Correct Password.</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">New Password<span class="required">*</span></label>
							<div class="col-sm-8">
								<input type="password" name="newpassword" id="newpassword"  minlength="8" maxlength="20" class="form-control" placeholder="Enter New Password" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Confirm New Password<span class="required">*</span></label>
							<div class="col-sm-8">
								<input type="password" name="cpassword" class="form-control" placeholder="Enter Confirm New Password" minlength="8" maxlength="20" equalTo="#newpassword" required/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label"></label>
							<div class="col-sm-8">
								<input type="hidden" id="csrftokanname" value="">
								<button type="button" class="btn btn-primary submitBtn" onclick="submitchangepasswordForm()">Save</button>
								<button type="reset" class="btn btn-default" onclick="TxtReset()">Reset</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<!-- end: change password modal -->
<!-- start: change password script -->
	<script>
		$().ready(function()
		{ 
			$("#changepasswordform").validate();
		});

		function TxtReset()
		{
			$("#errorcrntpwd").hide();
			document.forms[0].reset();
			var validator = $("#changepasswordform").validate();
			validator.resetForm();
		}

		function checkcurrentpassword()
		{
			var csrftokan1 = $("#csrftokanname").val(); 
			if(csrftokan1 =='')
			{
				var csrftokan = '<?php echo $this->security->get_csrf_hash(); ?>';
			}
			else
			{
				var csrftokan = $("#csrftokanname").val();
			}

			var currentpassword = $('#currentpassword').val();
			var flag = true;
			if(currentpassword != "")
			{
				$.ajax(
				{
					type : "POST",
					url:"<?php echo site_url('admin/checkcurrentpassword');?>",
					data: {'currentpassword': currentpassword, '<?php echo $this->security->get_csrf_token_name(); ?>' : csrftokan},
					async: false,
					dataType: 'json',
					success : function (data)
					{
						$("#csrftokanname").val(data.csrfTokenHash);
						$('input:hidden[name="csrf_test_name"]').val('');
						$('input:hidden[name="csrf_test_name"]').val(data.csrfTokenHash);
						if(data.flag == 1)
						{
							$("#errorcrntpwd").hide();
							flag = true;
						}
						else
						{
							$("#errorcrntpwd").show();
							flag = false; 	
						}
					}
				});
			}
			return flag;
		}

		function submitchangepasswordForm()
		{
			if($("#changepasswordform").valid())
			{
				var flag = checkcurrentpassword();
				if(flag == true)
				{
					var csrftokan1 = $("#csrftokanname").val(); 
					if(csrftokan1 =='')
					{
						var csrftokan = '<?php echo $this->security->get_csrf_hash(); ?>';
					}
					else
					{
						var csrftokan = $("#csrftokanname").val();
					}
	
					var formData = new FormData($('#changepasswordform')[0]);
					formData.append('<?php echo $this->security->get_csrf_token_name(); ?>', csrftokan);
					$.ajax(
					{
						type:"POST",
						url	:"<?php echo site_url('admin/change_password');?>",
						data:formData,
						async : false,
						cache : false,
						contentType : false,
						processData : false,
						dataType: 'json',
						success: function(data)
						{
							TxtReset();
							$('#changePassword').modal('hide');
							$("#csrftokanname").val(data.csrfTokenHash);
							$('input:hidden[name="csrf_test_name"]').val('');
							$('input:hidden[name="csrf_test_name"]').val(data.csrfTokenHash);
							if(data.flag == 1)
							{
								new PNotify(
								{
									title: 'Change Password',
									text: 'Change password successfully.',
									type: 'success',
									delay: 3000
								});
							}
							else
							{
								new PNotify(
								{
									title: 'Error',
									text: 'Something went wrong !',
									type: 'error',
									delay: 3000
								});
							}
						},
						complete: function()
						{
							setTimeout("$('.loadermain').hide();",200);
						}
					});
				}
			}
		}
	</script>
<!-- end: change password script -->