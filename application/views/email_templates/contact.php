<table cellpadding='0' cellspacing='0' width='598px' style='border:1px solid #253f87;'>
	<tr>
		<td> 
			<img src='<?php echo site_url('assets/images/email_top.jpg');?>'>
		</td>
	</tr>
	<tr>
		<td style='border-top:1px solid #788791; min-height:500px; padding:10px;'>
			<table cellpadding='0' cellspacing='0' border=0 width='100%' align='center' style= 'font-family:Arial, Helvetica, sans-serif; font-size:14px;'>
				<tr align=left>
					<td>
						<table cellpadding='0' cellspacing='0' border=0 width='100%' style= 'font-family:Arial, Helvetica, sans-serif; font-size:14px;'>
							<tr>
								<td height=30 colspan=2 style='font-size:16px;'><b><?=$_POST['heading_V'];?> </b></td>
							</tr>
							<? foreach($_POST as $key => $value)
							{
								if(strpos($key,"_V")>0)
								{}
								else
								{
									$replace = $key."_V"; ?>
									<tr>
										<td align=left height=30 width="150px"><b><?=$_POST[$replace]?> :</b></td>
										<td align=left>
											<?if(isset($_POST['txtprefix_V']) && $_POST[$replace] == 'Name')
											{
												echo $_POST['txtprefix_V'].' '.ucwords($value);
											}
											else if(isset($_POST['txtlname_V']) && $_POST[$replace] == 'Name')
											{
												echo ucwords($value).' '.ucfirst($_POST['txtlname_V']);
											}
											else if($value != "")
											{
												echo $value;
											}
											else
											{
												echo '--';
											} ?>
										</td>
									</tr>
								<? }
							} ?>
						</table>
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style='background: #fff none repeat scroll 0 0; border-top:1px solid #000; line-height: 16px;  padding: 10px; color:#000; font-family:Arial; font-size:12px; text-align:center;'>
		Copyright &copy; <?=date('Y')?> <?=$_POST['footer_V'];?>
		</td>
	</tr>
</table>