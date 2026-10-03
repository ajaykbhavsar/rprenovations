<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contactus extends Front_Controller
{
	function __construct()
    {
        parent::__construct();	
    }

	function index()
	{
		$data['main'] = 'contactus';
		$data['websitepagename'] = 'contactus';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	function sendmail()
	{
		if(isset($_POST['txtemail']) && $_POST['txtemail']!='')
		{
			//$key = substr($this->session->userdata('ResultStr'),0,8);
			//$captchacode = $_POST['number_V'];

			//if($captchacode!=$key)
			//{
			//	$this->session->set_flashdata('error','Please enter valid captcha code.');
			//	redirect('Contactus','refresh');
			//}
			//else
			//{
				$from = $_POST['txtemail'];
				$name = ucwords($_POST['txtname']);
				//$name = ucfirst($_POST['txtfname']).' '.ucfirst($_POST['txtlname_V']);
				$to = $this->config->item('toemailaddress');
				$cc = '';
				$subject = "Contact Detail from Website";
				$attach = "";
				//$file = $_FILES['document']['name'];
				//$attach = $this->Utilities_m->attachment($file);
				$body = $this->load->view('email_templates/contact',$_POST,true);
				//echo $body; die;
				$flag = $this->Utilities_m->sendMail($from,$name,$to,$cc,$subject,$body,$attach);
				if($flag == true)
				{
					//echo $body; die;
					/*if(FILE_EXISTS($attach)==1)
					{
						UNLINK($attach);	
					}*/
					$this->session->set_flashdata('message','Thanks for your Contact. We will get back to you soon.');
					redirect('Contactus','refresh');
				}
				else
				{
					/*if(FILE_EXISTS($attach)==1)
					{
						UNLINK($attach);	
					}*/
					$this->session->set_flashdata('error','Something went Wrong. Please try again later!');
					redirect('Contactus','refresh');
				}
			//}
		}
	}

	// function checkcaptchacode()
	// {	
	// 	$key = substr($this->session->userdata('ResultStr'),0,8);
	// 	$captchacode = $_POST['code'];

	// 	if($captchacode!=$key)
	// 	{ 
	// 		$value= "false";
	// 		echo $value;
	// 	}
	// 	else
	// 	{
	// 		$value= "true";
	// 		echo $value;
	// 	}
	// }
}
