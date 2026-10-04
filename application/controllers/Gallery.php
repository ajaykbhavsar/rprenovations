<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class gallery extends Front_Controller {

	function __construct()
    {
        parent::__construct();	
    }


	function index()
	{
		$this->load->model('gallery_fm');
		$data['gallery_images'] = $this->gallery_fm->get_gallery_images();
		$data['gallery_categories'] = $this->gallery_fm->get_categories_with_images();

		$data['main'] = 'gallery';
		$data['websitepagename'] = 'gallery';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
    

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */