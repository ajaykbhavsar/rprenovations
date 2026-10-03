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
		$this->load->model('Utilities_m');
	}
}
?>