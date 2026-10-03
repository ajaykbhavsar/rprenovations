<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class homebanner extends Admin_Controller 
{
	function __construct()
	{
		parent::__construct();
		$role_id = $this->session->userdata('role_id');
        	if($role_id == 2 || $role_id == 3 || $role_id == 4){
        	redirect('admins/dashboard');
        }
		
	}

	function index($page='')
	{
		$data['title'] = "Home Banners";
		$data['subtitle'] = "Manage Home Banners";
		$data['main'] = 'admin/homebanner/manage';
		$data['webpagename'] = 'homebanner';
		$data['subwebpagename'] = 'homebanner';
		if($page=="")
		{
			$this->session->set_userdata('page_num',0);
			$this->session->set_userdata('per_page',10);
			$this->session->set_userdata('search_size','');
			
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

		$data['count'] = $this->homebanner_m->get_count_banner_data();
		
		$this->load->library('pagination');

		$config = array();
		$config["base_url"] = site_url('admins/homebanner/manage_data');
		$config["total_rows"] = $data['count'];
		$config["full_tag_open"] = "<ul class=''>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li><a  class='active'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["prev_tag_open"] = "<li>";
		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li>";
		$config["next_tag_close"] = "</li>";
		$config["prev_link"] = "<i class='fa fa-angle-left' aria-hidden='true'></i>";
		$config["next_link"] = "<i class='fa fa-angle-right' aria-hidden='true'></i>";

		if($this->input->post('per_page') && $this->input->post('per_page')!="")
		{
			$this->session->set_userdata('per_page',$this->input->post('per_page'));
			$config['per_page'] = $this->input->post('per_page');
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

		$data['data']=$this->homebanner_m->getAllData($config["per_page"], $page);
		//echo "<pre>";print_r($data);
		$data["pagination_link"] = $this->pagination->create_links();
		$data['webpagename'] = 'homebanner';
		$data['subwebpagename'] = 'homebanner';

		$offset = ($page) ? $page : 0;

		$first_record = $offset + 1;
		$last_record = $page + count($data['data']);
		$output['csrfTokenName'] = $this->security->get_csrf_token_name();
		$output['csrfTokenHash'] = $this->security->get_csrf_hash();
		$output['body'] = $this->load->view('admin/homebanner/ajax_list', $data, true);

		$output['pagination_link'] = $data["pagination_link"] . '
		<script>
			$(document).ready(function() {
				$(".pagination > ul li a").on("click",function(e){
					e.preventDefault();
					GetAjaxList($(this).attr("href"));
				});
			});
		</script>';

		$this ->output->set_content_type('application/json') -> set_output(json_encode($output));
	}
	function checktitle()
	{
		$data['flag']=$this->homebanner_m->checktitle();
		$data['csrfTokenName'] = $this->security->get_csrf_token_name();
		$data['csrfTokenHash'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}
	function checkupdatetitle()
	{
		
		$data['flag']=$this->homebanner_m->checktitlebyid();
		$data['csrfTokenName'] = $this->security->get_csrf_token_name();
		$data['csrfTokenHash'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}
	function add()
	{
		if(isset($_FILES['banner_image']['name']) && $_FILES['banner_image']['name']!="")
		{
			//$flag = $this->homebanner_m->checktitle();
			$flag=false;
			if($flag == true)
			{
				$this->session->set_flashdata('error','Page Title already exists.');
				redirect('admins/homebanner/add','refresh'); 
			}
			else
			{
				$this->homebanner_m->add_banner();
				$this->session->set_flashdata('message','Homebanner added successfully.');
				redirect('admins/homebanner','refresh'); 
			}
			
			
		}
		else
		{
			$data['title'] = "Home Banners";
			$data['subtitle'] = "Create";
			$data['main'] = 'admin/homebanner/add';
			$data['webpagename'] = 'homebanner';
			$data['subwebpagename'] = 'homebanner';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster'); 
		}
	}

	function update($id=0)
	{

		if($this->input->post('id'))
		{
			$flag = $this->homebanner_m->checktitlebyid();
			$flag=false;
			if($flag == true)
			{
				$this->session->set_flashdata('error','Page Title already exists.');
				redirect('admins/homebanner/update','refresh'); 
			}
			else
			{
				$this->homebanner_m->update();
				$this->session->set_flashdata('message','Homebanner updated successfully.');
				redirect('admins/homebanner','refresh');
			}
			
			
		} 
		else 
		{

			$data['title'] = "Home Banners";
			$data['subtitle'] = "Update";
			$data['main'] = 'admin/homebanner/update';
			$data['webpagename'] = 'homebanner';
			$data['subwebpagename'] = 'homebanner';
			$data['homebanner_detail'] = $data1=$this->homebanner_m->gethomebannerid($id);
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
		}  
	}	

	function delete()
	{
		$user = $this->homebanner_m->delete();
		$this->session->set_flashdata('message','Homebanner deleted successfully.');
		redirect('admins/homebanner','refresh');
	}
	function active($id)
	{
		$this->homebanner_m->active($id);
		$this->session->set_flashdata('message','Homebanner Activated Successfully.');
		redirect('admins/homebanner','refresh');
	}

	function inactive($id)
	{
		$this->homebanner_m->inactive($id);
		$this->session->set_flashdata('message','Homebanner In Activated Successfully.');
		redirect('admins/homebanner','refresh');
	}
	
}
?>