<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends Admin_Controller
{
    public function __construct()
	{
        parent::__construct();
    }

    public function index() 
	{
		$data['title'] = "Dashboard";
		$data['main'] = 'admin/main';
		$data['webpagename'] = 'dashboard';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster'); 
    }

 
    function time_in()
	{
		
		
		$flag = $this->dashboard_m->time_in();
		redirect('admins/dashboard/');
			
		
	}
	function time_out($id)
	{
		
		$flag = $this->dashboard_m->time_out($id);
		redirect('admins/dashboard/');
			
		
	}

}
?>