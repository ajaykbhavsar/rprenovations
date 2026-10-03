<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class page404 extends Admin_Controller
{
    public function __construct()
	{
        parent::__construct();
    }

    public function index() 
	{
		$data['title'] = "404";
		$data['subtitle'] = "404";
		$data['main'] = 'admin/page404';
		$data['websitepagename'] = 'page404';
		$data['webpagename'] = 'page404';
		$data['subwebpagename'] = 'page404';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');  
    }
}
?>