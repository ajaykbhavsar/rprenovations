 <?	
 $name_value="";
 $pass_value="";
 $chk_value="";

 if(isset($_COOKIE['cookchk']) && ($_COOKIE['cookchk']) == "yes")
 {
 	$name_value=($_COOKIE['cookname']);
 	$pass_value=($_COOKIE['cookpass']);
 	$chk_value=($_COOKIE['cookchk']);
 }
 ?>
 <div class="loginBg">
 <section class="body-sign">
 	<div class="center-sign">
 		<div class="loginpage">
 			<div class="text-center">
 				<a href="<?php echo site_url('admin');?>" class="logo pull-left">
 				<img src="<?php echo site_url('assets/admin/images/logo.png');?>" height="" alt="<?=ADMIN_SITENAME?>" width="50%"/>
 				</a>
 			</div>
			<!--  <a href="<?php echo site_url('admin');?>" class="logo pull-left">
				<h3 style="color: black"><p><?=SITENAME?></p></h3>
			</a> -->
			
			<div class="panel panel-sign">
				
				<div class="panel-body">
					<? if($this->session->flashdata('error'))
					{
						echo "<div class='alert alert-danger'> <i class='fa fa-times-circle'></i>&nbsp;&nbsp;".$this->session->flashdata('error')."</div>";
					} ?>
					<? if($this->session->flashdata('message'))
					{
						echo "<div class='alert alert-success'> <i class='fa fa-check-circle'></i>&nbsp;&nbsp;".$this->session->flashdata('message')."</div>";
					} ?>
					<?php echo form_open_multipart('admin','name="form1" id="form1" enctype="multipart/form-data"');?>
					<div class="form-group mb-lg">
						<label>Username</label>
						<div class="input-group input-group-icon">
							<input name="username" type="text" class="form-control input-lg" placeholder="Enter User Name" value="<?=$name_value?>" required/>
							<span class="input-group-addon">
								<span class="icon icon-lg">
									<i class="fa fa-user"></i>
								</span>
							</span>
						</div>
					</div>

					<div class="form-group mb-lg">
						<div class="clearfix">
							<label class="pull-left">Password</label>
							<!-- <a href="<?php echo site_url("admin/forgot_password");?>" class="pull-right">Forgot Password?</a> -->
						</div>
						<div class="input-group input-group-icon">
							<input name="password" type="password" class="form-control input-lg" placeholder="Enter Password" value="<?=$pass_value?>" required/>
							<span class="input-group-addon">
								<span class="icon icon-lg">
									<i class="fa fa-lock"></i>
								</span>
							</span>
						</div>
					</div>

						<!-- <div class="row">
							<div class="col-sm-4">
								<img src="<?=site_url('Php_captcha')?>">
								<? $keyvalue = '';
								if($this->session->userdata('ResultStr'))
								{
									$keyvalue = $this->session->userdata('ResultStr');
								} ?>
							</div>
							<div class="col-sm-8">
								<div class="form-group">
									<input type="text" name="number" class="form-control" id="number" onblur="validatecaptcha()" placeholder="Enter Captcha Code" required>
									<label id="captchaerror" style="display:none;color:#ff0000;margin-top:10px;">Enter valid string</label>
									
								</div>
							</div>
						</div> -->
						<input type="hidden" id="csrftokan" value="">
						<div class="row">
							<div class="col-sm-12">
								<div class="checkbox-custom checkbox-default">
									<?if(isset($_COOKIE['cookchk']) && ($_COOKIE['cookchk']) == "yes")
									{ ?>
										<input type="checkbox" name="chklogin" value="yes" <?php if($chk_value=="yes"){?>checked<?}?>>
									<? }
									else
										{ ?>
											<input type="checkbox" name="chklogin" value="yes">
										<? }?>
										<label for="RememberMe">Remember Me</label>
									</div>
								</div>
								<div class="col-sm-12 text-center">
									<button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
								</div>
							</div>
							<?php echo form_close();?>
						</div>
					</div>
				</div>
			</div>
</section>
<div>
		<script type="text/javascript">
			$().ready(function() 
			{
				$("#form1").validate();
			});
		</script>
		<script>
			function validatecaptcha()
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
				var captchacode = $('#number').val();
				var flag = true;
				if(captchacode != "")
				{
					$.ajax(
					{
						type: "POST",
						url: "<? echo site_url('admin/checkcaptchacode'); ?>",
						data: {code: captchacode, '<?php echo $this->security->get_csrf_token_name(); ?>' : csrftokan},
						async: false,
						dataType: 'json',
						success : function (data)
						{
							$("#csrftokan").val(data.csrfTokenHash);
							$('input:hidden[name="csrf_test_name"]').val('');
							$('input:hidden[name="csrf_test_name"]').val(data.csrfTokenHash); 
							if(data.flag == "false")
							{
								$("#captchaerror").show();
								flag = false;
							}
							else
							{
								$("#captchaerror").hide();
								flag = true;
							}
						}
					});
				}
				else
				{
					$("#captchaerror").hide();
					flag = true;
				}
				return flag;
			}
		</script>