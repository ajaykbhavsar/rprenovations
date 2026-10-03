<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class whychooseus extends Front_Controller {

	function __construct()
    {
        parent::__construct();	
    }


	function index()
	{
		$data['main'] = 'whychooseus';
		$data['websitepagename'] = 'whychooseus';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
    

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */