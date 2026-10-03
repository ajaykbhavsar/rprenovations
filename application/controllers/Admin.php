<?php
class admin extends Admin_Controller 
{
	public function __construct()
	{
        parent::__construct();
    }

	public function index()
{
    $dashboard = 'admins/dashboard';

    // if logged in, redirect first
    if ($this->user_m->loggedin() == TRUE) 
    {
        redirect($dashboard, 'refresh');
    }

    $rules = $this->user_m->rules;
    $this->form_validation->set_rules($rules);

    if ($this->form_validation->run() == TRUE) 
    {
        if ($this->user_m->login() == TRUE)
        {
            redirect($dashboard, 'refresh');
        }
        else
        {
            $this->session->set_flashdata('error','Incorrect username or password');
            redirect('admin','refresh');
        }
    }

    $data['title'] = "Sign In";
    $data['main'] = 'admin/index';
    $data['webpagename'] = 'signin';    
    $this->load->vars($data);
    $this->load->view('admin/template/homemaster');
}

	// public function index()
	// {
	// 	$data['title'] = "Sign In";
	// 	$data['main'] = 'admin/index';
	// 	$data['webpagename'] = 'signin';	
	// 	$this->load->vars($data);
	// 	$this->load->view('admin/template/homemaster');

	// 	$dashboard = 'admins/dashboard';
	
    // 	$this->user_m->loggedin() == FALSE || redirect($dashboard,'refresh');
    	
    // 	$rules = $this->user_m->rules;
    // 	$this->form_validation->set_rules($rules);

    // 	if ($this->form_validation->run() == TRUE) 
	// 	{
    // 		// We can login and redirect
    // 		if ($this->user_m->login() == TRUE)
	// 		{
	// 			redirect($dashboard);
    // 		}
    // 		else
	// 		{
    // 			$this->session->set_flashdata('error','That username/password combination does not exist.');
    // 			redirect('admin','refresh');
    // 		}
    // 	}
    // }

	function checkcurrentpassword()
	{	
		$data['flag'] = $this->user_m->checkcurrentpassword();
		$data['csrfTokenName'] = $this->security->get_csrf_token_name();
		$data['csrfTokenHash'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	function change_password()
	{
		$data['flag'] = $this->user_m->change_password();
		$data['csrfTokenName'] = $this->security->get_csrf_token_name();
		$data['csrfTokenHash'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function signout()
	{
    	$this->user_m->signout();
    	redirect('admin','refresh');
    }

	function checkcaptchacode()
	{	
		$key = substr($this->session->userdata('ResultStr'),0,8);
		$captchacode = $this->input->post('code');

		if($captchacode!=$key)
		{
			$data['flag'] = "false";
			$data['csrfTokenName'] = $this->security->get_csrf_token_name();
			$data['csrfTokenHash'] = $this->security->get_csrf_hash();
			echo json_encode($data);
		}
		else
		{
			$data['flag'] = "true";
			$data['csrfTokenName'] = $this->security->get_csrf_token_name();
			$data['csrfTokenHash'] = $this->security->get_csrf_hash();
			echo json_encode($data);
		}
	}
}