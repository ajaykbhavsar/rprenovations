<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class projects extends Front_Controller {

	function __construct()
    {
        parent::__construct();	
    }

	function index()
	{
		$data['main'] = 'projects';
		$data['websitepagename'] = 'projects';
		$data['categories'] = $this->project_fm->getcategories();
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
	
	function project_detail($uniqueid='')
	{
		$data['main'] = 'projects_detail';
		$data['websitepagename'] = 'projects_detail';
		$data['projectdetails'] = $this->project_fm->getprojectdetails($uniqueid);
		$this -> load -> vars($data);
		$this -> load -> view('template/innermaster');
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */