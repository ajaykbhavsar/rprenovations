<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends Front_Controller
{
	function __construct()
    {
        parent::__construct();	
    }

	function index()
	{
		$data['main'] = 'index';
		$data['websitepagename'] = 'index';
		$this->load->vars($data);
		$this->load->view('template/homemaster');
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



	function subcribeemail()
	{
		if(isset($_POST['email']) && $_POST['email']!='')
		{

			$output['flag']=$flag = $this->dashboard_fm->checknewsletter();
			if($flag != 1)
			{
				$id = $this->dashboard_fm->newsletteradd();
				$this->sendMailtoAdmin($_POST['email']);
				
			}
			$output['csrfTokenName'] = $this->security->get_csrf_token_name();
			$output['csrfTokenHash'] = $this->security->get_csrf_hash();
			echo json_encode($output);
		}
		else
		{
			$output['flag']=1;
			$output['csrfTokenName'] = $this->security->get_csrf_token_name();
			$output['csrfTokenHash'] = $this->security->get_csrf_hash();
			echo json_encode($output);
		}
	}
}
