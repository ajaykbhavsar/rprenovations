<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class project extends Admin_Controller 
{
	function __construct()
	{
		parent::__construct();
	}

	function index($page='')
	{
		if($this->session->userdata('role_id')!=1)
		{
			redirect('admins/page404','refresh');
		}
		$data['title'] = "Projects";
		$data['subtitle'] = "Manage Projects";

		$data['main'] = 'admin/project/manage';
		$data['webpagename'] = 'project';
		$data['subwebpagename'] = 'project';

		if($page=="")
		{
			$this->session->set_userdata('page_num',0);
			$this->session->set_userdata('per_page',10);
			$this->session->set_userdata('search_name','');
		}
		else
		{
			$this->session->set_userdata('page_num',$page);
		}
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster'); 
	}

	function manage_data($page=0)
	{
		$this->session->set_userdata('page_num',$page);

		$data['project_count'] = $this->project_m->get_count_project_data();

		$this->load->library('pagination');

		$config = array();
		$config["base_url"] = site_url('admins/project/manage_data');
		$config["total_rows"] = $data['project_count'];
		$config["full_tag_open"] = "<ul class=''>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li><a class='active'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["prev_tag_open"] = "<li>";
		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li>";
		$config["next_tag_close"] = "</li>";
		$config["first_tag_open"] = "<li>";
		$config["first_tag_close"] = "</li>";
		$config["last_tag_open"] = "<li>";
		$config["last_tag_close"] = "</li>";
		$config["first_link"] = "<i class='fa fa-angle-left' aria-hidden='true'></i> First";
		$config["last_link"] = "Last <i class='fa fa-angle-right' aria-hidden='true'></i>";
		$config["prev_link"] = "<i class='fa fa-angle-left' aria-hidden='true'></i>";
		$config["next_link"] = "<i class='fa fa-angle-right' aria-hidden='true'></i>";

		if(isset($_POST['per_page']) && $_POST['per_page']!="")
		{
			$this->session->set_userdata('per_page',$_POST['per_page']);
			$config['per_page'] = $_POST['per_page'];
		}
		else
		{
			$this->session->set_userdata('per_page',10);
			$config['per_page'] = 10;
		}

		$config["uri_segment"] = 4;

		$this -> pagination -> initialize($config);
		$page = ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0;

		$data["totalpage"] = $config['per_page'];
		$data["totalrows"] = $config['total_rows'];

		$data['project_data']=$this->project_m->getAllData($config["per_page"], $page);
		$data["pagination_link"] = $this->pagination->create_links();
		$data['webpagename'] = 'project';
		$data['subwebpagename'] = 'project';

		$offset = ($page) ? $page : 0;
		$first_record = $offset + 1;
		$data['srno'] = $first_record;
		$last_record = $page + count($data['project_data']);

		$output['body'] = $this->load->view('admin/project/ajax_list', $data, true);

		$output['pagination_link'] = $data["pagination_link"] . '
		<script>
			$(document).ready(function() {
				$(".pagination > ul li a").on("click",function(e){
					e.preventDefault();
					GetAjaxList($(this).attr("href"));
				});
			});
		</script>';

		$output['csrfTokenName'] = $this->security->get_csrf_token_name();
		$output['csrfTokenHash'] = $this->security->get_csrf_hash();
		$this ->output->set_content_type('application/json') -> set_output(json_encode($output));
	}

	function checkprojectname()
	{
		$output['flag'] = $this->project_m->checkduplication();
		$output['csrfTokenName'] = $this->security->get_csrf_token_name();
		$output['csrfTokenHash'] = $this->security->get_csrf_hash();
		$this ->output->set_content_type('application/json') -> set_output(json_encode($output));
	}

	function add()
	{
		if($this->input->post('projectname'))
		{
			$output = $this->project_m->checkduplication();
			if($output == 1)
			{
				$this->session->set_flashdata('error','Please check that name already exists.');
				redirect('admins/project/add','refresh');
			}
			else
			{
				$id = $this->project_m->add();
				$this->session->set_flashdata('message','project added successfully.');
				redirect('admins/project/index/'.$this->session->userdata('page_num'),'refresh');
			}
		}
		else
		{
			if($this->session->userdata('role_id')!=1)
			{
				redirect('admins/page404','refresh');
			}
			$data['title'] = "Projects";
			$data['subtitle'] = "Create";


			$data['main'] = 'admin/project/add';

			$data['webpagename'] = 'project';
			$data['subwebpagename'] = 'project';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster'); 
		}


	}

	function checkprojectnamebyid()
	{
		$output['flag'] = $this->project_m->checkduplicationbyid();
		$output['csrfTokenName'] = $this->security->get_csrf_token_name();
		$output['csrfTokenHash'] = $this->security->get_csrf_hash();
		$this ->output->set_content_type('application/json') -> set_output(json_encode($output));
	}


	function update($uniqueid='')
	{
		if($this->input->post('id'))
		{  
			$this->project_m->update();
			$this->session->set_flashdata('message','Project updated successfully.');
			redirect('admins/project/index/'.$this->session->userdata('page_num'),'refresh');
		} 
		else 
		{
			if($this->session->userdata('role_id')!=1)
			{
				redirect('admins/page404','refresh');
			}
			$data['title'] = "Projects";
			$data['subtitle'] = "Update";
			$data['main'] = 'admin/project/update';
			$data['webpagename'] = 'project';
			$data['subwebpagename'] = 'project';
			$data['project'] = $this->project_m->getprojectdetail($uniqueid);
			$data['category']=$this->project_m->getallcategory();
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
		}  

	}

	function details($uniqueid=0)
	{
		if($this->session->userdata('role_id')!=1)
		{
			redirect('admins/page404','refresh');
		}
		$data['title'] = "Projects";
		$data['subtitle'] = "Detail";
		$data['main'] = 'admin/project/details';
		$data['webpagename'] = 'project';
		$data['subwebpagename'] = 'project';
		$data['details'] = $this->project_m->getprojectdetail($uniqueid);
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');   
	}

	function delete()
	{
		$data['flag'] = $this->project_m->deleteproject();
		$data['csrfTokenName'] = $this->security->get_csrf_token_name();
		$data['csrfTokenHash'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	function active()
	{
		$data['flag'] = $this->project_m->active();
		$data['csrfTokenName'] = $this->security->get_csrf_token_name();
		$data['csrfTokenHash'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	function inactive()
	{
		$data['flag'] = $this->project_m->inactive();
		$data['csrfTokenName'] = $this->security->get_csrf_token_name();
		$data['csrfTokenHash'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}
	
	function updatesortorder()
	{
		$data['flag'] = $this->project_m->updatesortorder();
		$data['csrfTokenName'] = $this->security->get_csrf_token_name();
		$data['csrfTokenHash'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}
	
	function manageimage($id="",$page='')
	{
		if($this->session->userdata('role_id')!=1)
		{
			redirect('admins/page404','refresh');
		}
		
		$projectdata = $this->project_m->getprojectdetail($id);
		$data['title'] = "Project Images";
		$data['subtitle'] = $projectdata['projectname']." -> Image";
		$data['id'] = $id;

		$data['main'] = 'admin/project/managephotogallery';
		$data['webpagename'] = 'project';
		$data['subwebpagename'] = 'project';


		if($page=="")
		{
			$this->session->set_userdata('page_num',0);
			$this->session->set_userdata('per_page',10);
		}
		else
		{
			$this->session->set_userdata('page_num',$page);
		}
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');
	}
	
	

	function manage_image_data($page=0)
	{
		$this->session->set_userdata('page_num',$page);

		$data['project_image_count'] = $this->project_m->get_count_project_image_data();

		$this->load->library('pagination');

		$config = array();
		$config["base_url"] = site_url('admins/project/manage_image_data');
		$config["total_rows"] = $data['project_image_count'];
		$config["full_tag_open"] = "<ul class=''>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li><a class='active'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["prev_tag_open"] = "<li>";
		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li>";
		$config["next_tag_close"] = "</li>";
		$config["first_tag_open"] = "<li>";
		$config["first_tag_close"] = "</li>";
		$config["last_tag_open"] = "<li>";
		$config["last_tag_close"] = "</li>";
		$config["first_link"] = "<i class='fa fa-angle-left' aria-hidden='true'></i> First";
		$config["last_link"] = "Last <i class='fa fa-angle-right' aria-hidden='true'></i>";
		$config["prev_link"] = "<i class='fa fa-angle-left' aria-hidden='true'></i>";
		$config["next_link"] = "<i class='fa fa-angle-right' aria-hidden='true'></i>";

		if(isset($_POST['per_page']) && $_POST['per_page']!="")
		{
			$this->session->set_userdata('per_page',$_POST['per_page']);
			$config['per_page'] = $_POST['per_page'];
		}
		else
		{
			$this->session->set_userdata('per_page',10);
			$config['per_page'] = 10;
		}

		$config["uri_segment"] = 4;

		$this -> pagination -> initialize($config);
		$page = ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0;

		$data["totalpage"] = $config['per_page'];
		$data["totalrows"] = $config['total_rows'];

		$data['project_image_data']=$this->project_m->getAll_project_image_Data($config["per_page"], $page);
		$data["pagination_link"] = $this->pagination->create_links();
		$data['webpagename'] = 'project';
		$data['subwebpagename'] = 'project';

		$offset = ($page) ? $page : 0;
		$first_record = $offset + 1;
		$data['srno'] = $first_record;
		$last_record = $page + count($data['project_image_data']);

		$output['body'] = $this->load->view('admin/project/ajax_images_list', $data, true);

		$output['pagination_link'] = $data["pagination_link"] . '
		<script>
			$(document).ready(function() {
				$(".pagination > ul li a").on("click",function(e){
					e.preventDefault();
					GetAjaxList($(this).attr("href"));
				});
			});
		</script>';

		$output['csrfTokenName'] = $this->security->get_csrf_token_name();
		$output['csrfTokenHash'] = $this->security->get_csrf_hash();
		$this ->output->set_content_type('application/json') -> set_output(json_encode($output));
	}
	
	function add_projectimage($projectid="")
	{
		if($this->input->post('project_id'))
		{
			$id = $this->project_m->addphotogallery();
			if($id=='0')
			{
				$this->session->set_flashdata('error','Something Went Wrong.');
				redirect('admins/project/manageimage/'.$_POST['project_id'].'/'.$this->session->userdata('page_num'),'refresh');
			}
			else
			{	
				$this->session->set_flashdata('message','Project Image added successfully.');
				redirect('admins/project/manageimage/'.$_POST['project_id'].'/'.$this->session->userdata('page_num'),'refresh');
			}
		}
		else
		{
			if($this->session->userdata('role_id')!=1)
			{
				redirect('admins/page404','refresh');
			}
			$data['title'] = "Project Image";
			$data['subtitle'] = "Create";
			$data['projectid'] = $projectid;
			$data['main'] = 'admin/project/addimage';
			$data['webpagename'] = 'project';
			$data['subwebpagename'] = 'project';
			$data['projectdata'] = $this->project_m->getprojectdetail($projectid);
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster'); 
		}
	}
	

	function deleteimage()
	{
		$data['flag'] = $this->project_m->deletephotogallery();
		$data['csrfTokenName'] = $this->security->get_csrf_token_name();
		$data['csrfTokenHash'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}
}
?>