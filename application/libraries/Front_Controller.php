<?php
class Front_Controller extends CI_Controller
{
	function __construct ()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('cookie');
		$this->load->library('pagination');
		$this->load->model('utilities_m');
		$this->load->model('dashboard_fm');
		$this->load->model('cms_fm');
		$this->load->model('project_fm');
		
	}
}
?>