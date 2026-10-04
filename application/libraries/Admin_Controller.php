<?php
class Admin_Controller extends CI_Controller
{
	function __construct ()
	{
		parent::__construct();

		// Default helper
		$this->load->helper('form');
		$this->load->helper('security');
		$this->load->helper('cookie');
		
		// Default library
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		
		
		$this->load->model('utilities_m');
		$this->load->model('homebanner_m');
		$this->load->model('user_m');
		$this->load->model('dashboard_m');
		$this->load->model('maincategory_m');
		$this->load->model('cms_m');
		$this->load->model('newsletter_m');
		$this->load->model('project_m');
		$this->load->model('gallery_m');
		

		$exception_uris = array(
			'admin', 
			'admin/signout',
			'admin/checkcaptchacode',
			'Php_captcha'
		);

		$controller = $this->uri->segment(1); // controller
		$action = $this->uri->segment(2); // action

		if($action==NULL || $action=="")
		{
			$url = $controller;
		}
		else
		{
			$url = $controller . '/' . $action;
		}

		if(in_array($url, $exception_uris) == FALSE) 
		{
			if ($this->user_m->loggedin() == FALSE)
			{
				redirect('admin','refresh');
			}
		}
	}
}
?>