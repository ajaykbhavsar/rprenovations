<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class dashboard extends Front_Controller {

	function __construct()
    {
        parent::__construct();	
    }


	function index()
	{
		$data['main'] = 'index';
		$data['websitepagename'] = 'index';
		$data['homebanner'] = $this->dashboard_fm->get_homebanner();
		$data['categories'] = $this->dashboard_fm->getcategories();
		$this->load->vars($data);
		$this->load->view('template/homemaster');
	}

	function checkemail()
	{
		$output['flag'] = $this->dashboard_fm->checkemail();
		$output['csrfTokenName'] = $this->security->get_csrf_token_name();
		$output['csrfTokenHash'] = $this->security->get_csrf_hash();
		$this ->output->set_content_type('application/json') -> set_output(json_encode($output));
	}
	function addnewsletter()
	{
		if ($_POST['subscribe']!="" && isset($_POST['subscribe'])) {
			$id="";
			$emailcheck = $this->dashboard_fm->checkemail();//echo $emailcheck;die;
			if($emailcheck== true)
			{
				// echo $emailcheck= "4";	
				$output['flag']=4;
			}else{
				$id = $this->dashboard_fm->addsubscriber();//echo $id;die;
				if($id!='')
				{
					$this->sendSubsriberMailToUser($id);
					$output['flag']=1;
				}
			}
		}else{
			// echo '5';
			$output['flag']=5;
		}
		$output['csrfTokenName'] = $this->security->get_csrf_token_name();
		$output['csrfTokenHash'] = $this->security->get_csrf_hash();
		$this ->output->set_content_type('application/json') -> set_output(json_encode($output));
	}

	function sendSubsriberMailToUser($id)
	{
		$from = $this->config->item('fromemailaddress');
		$name = '';
		$bodydata['subscribe']=$subscribe=$this->dashboard_fm->get_subscriber($id);//print_r($subscribe);die;
		$to = $subscribe['newslwtter_email'];
		$replyto = $this->config->item('replytoemailaddress');
		$cc = '';
		$subject = "Thanks for subscribing!";
		$attach = "";
		$body = $this->load->view('email_templates/subscribe_to_user',$bodydata,true);
		$flag = $this->utilities_m->sendMail($from,$name,$to,$cc,$subject,$body,$attach,$replyto);
		if($flag==true){
			$this->sendsubscribemail($subscribe['id']);
		}else{
			
		}
	
	}
	function sendsubscribemail($id)
	{
		$subscribe=$this->dashboard_fm->get_subscriber($id);
		$bodydata['subscribe']=$subscribe['newslwtter_email'];
		$from = $subscribe['newslwtter_email'];
		$to=$this->config->item('toemailaddress');
		$replyto = $subscribe['newslwtter_email'];
		$cc = '';
		$subject = "Subscribe from Website";
		$name = $subscribe['newslwtter_email'];
		$attach = "";
		$body = $this->load->view('email_templates/subscribe',$bodydata,true);
		$flag = $this->utilities_m->sendMail($from,$name,$to,$cc,$subject,$body,$attach,$replyto);
		
		//}
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */