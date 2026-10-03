<body style="font-family: arial; padding: 0px; margin: 0px;">
    <div class="mailBlock" style="width: 600px; max-width: 100%; margin: 0 auto;">
        <table border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="border: 1px solid #ccc;">
            <tr>                
				<td valign="middle" height="184" style="background-color: #F0F0F0;" align="center" colspan="3">                    
					<table border="0" cellpadding="0" cellspacing="0" width="90%" class="tableGray" style="width: 90%;" align="center">    
						<tr>                             
							<td>                                
								<img src="<?php echo site_url('assets/images/logo.png');?>" style="display: block" width="150" height="150">                            
							</td>                        
						</tr>                    
					</table>                 
				</td>            
			</tr>
            <tr>
                <td height="40" colspan="3"></td>
            </tr>
            <tr>
               <td width="30px" style="width:30px;"></td>  
               <td align="center">
                <table class="tableWhite padding100_40" style="width: 100%; background-color: #fff; font-family:'arial'; font-size:14px; line-height:18px;" align="center">
                   
                    <tr>
                        <td colspan="2" height=10></td>
                    </tr>
                    <?php foreach($_POST as $key => $value)
                    {
                        if(strpos($key,"_V")>0)
                        {
                            // skip label entries
                        }
                        else
                        {
                            $replace = $key."_V"; 
                            if(isset($_POST[$replace])){
                                ?>
                            <tr>

                                <td align="left" valign="top" width="250"><b><?php echo $_POST[$replace]; ?> :</b></td>
                                <td align="left" valign="top">
                                    <?php
                                    if(isset($_POST['txtprefix_V']) && $_POST[$replace] == 'Name')
                                    {
                                        echo $_POST['txtprefix_V'].' '.ucwords($value);
                                    }
                                    else if(isset($_POST['txtlname_V']) && $_POST[$replace] == 'Name')
                                    {
                                        echo ucwords($value).' '.$_POST['txtlname_V'];
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
                            <tr>
                                <td colspan="2" height=10></td>
                            </tr>
                            <?php      }
                        } 
                    } ?>
                </table>
            </td>
            <td width="30px" style="width:30px;"></td>  
        </tr>        
        
        <tr>
            <td height="40"></td>
        </tr>
        <tr>
            <td valign="middle" height="75" style=" background-color: #212121;" align="center" colspan="3">
                <table border="0" cellpadding="0" cellspacing="0" class="footer" style="width: 90%;" align="center">
                    <tr>                          
                        <td class="wid50" valign="middle">
                            <p class="footerRight" style="text-align: center; font-family:Arial; color: #888888; font-size: 11px;">Copyright &copy; <?php echo date('Y'); ?> <?php echo isset($_POST['footer_V']) ? $_POST['footer_V'] : 'RP Renovations & Custom Builds Inc.. All Rights Reserved.'; ?></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>