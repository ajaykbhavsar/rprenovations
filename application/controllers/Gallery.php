<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends Front_Controller

{

	function __construct()

    {

        parent::__construct();	

    }



	function index()

	{

		$data['main'] = 'gallery';

		$data['websitepagename'] = 'gallery';

		$this->load->vars($data);

		$this->load->view('template/innermaster');

	}



	function sendInquiryMail()

	{

		if(isset($_POST['txtemail']) && $_POST['txtemail']!='')

		{

			$key = substr($this->session->userdata('ResultStr'),0,8);

			$captchacode = $_POST['number_V'];



			if($captchacode!=$key)

			{

				$flag = "2";

				echo $flag;

			}

			else

			{

				$from = $_POST['txtemail'];

				//$name = ucwords($_POST['txtname']);

				$name = ucfirst($_POST['txtfname']).' '.ucfirst($_POST['txtlname_V']);

				$to = $this->config->item('toemailaddress');

				$cc = '';

				$subject = "Contact Detail from Website";

				$attach = "";

				//$file = $_FILES['document']['name'];

				//$attach = $this->Utilities_m->attachment($file);

				$body = $this->load->view('email_templates/contact',$_POST,true);

				//echo $body; die;

				$flag = $this->Utilities_m->sendMail($from,$name,$to,$cc,$subject,$body,$attach);

				/*if($flag == true)

				{

					if(FILE_EXISTS($attach)==1)

					{

						UNLINK($attach);	

					}

				}

				else

				{

					if(FILE_EXISTS($attach)==1)

					{

						UNLINK($attach);	

					}

				}*/

				echo $flag;

			}

		}

	}

}