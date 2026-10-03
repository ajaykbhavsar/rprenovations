<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class category extends Admin_Controller 
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
		$data['title'] = "Category";
		$data['subtitle'] = "Manage Category";
		$data['main'] = 'admin/category/manage';
		$data['webpagename'] = 'category';
		$data['subwebpagename'] = 'category';
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

		$data['category_count'] = $this->category_m->get_count_category_data();
		
		$this->load->library('pagination');

		$config = array();
		$config["base_url"] = site_url('admins/category/manage_data');
		$config["total_rows"] = $data['category_count'];
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

		$data['category_data']=$this->category_m->getAllData($config["per_page"], $page);
		$data["pagination_link"] = $this->pagination->create_links();
		$data['webpagename'] = 'category';
		$data['subwebpagename'] = 'category';

		$offset = ($page) ? $page : 0;
		$first_record = $offset + 1;
		$data['srno'] = $first_record;
		$last_record = $page + count($data['category_data']);
		//$last_record = $page + 10;

		$output['body'] = $this->load->view('admin/category/ajax_list', $data, true);

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

			function checkduplication()
			{
				$output['flag'] = $this->category_m->checkduplication();
				$output['csrfTokenName'] = $this->security->get_csrf_token_name();
				$output['csrfTokenHash'] = $this->security->get_csrf_hash();
				$this ->output->set_content_type('application/json') -> set_output(json_encode($output));
			}

			function add()
			{
				if($this->input->post('name'))
				{
					$output = $this->category_m->checkduplication();
					if($output == 1)
					{
						$this->session->set_flashdata('error','Please Check that Name already exists.');
						redirect('admins/category/add','refresh');
					}
					else
					{
						$id = $this->category_m->add();
						$this->session->set_flashdata('message','Category added successfully.');
						redirect('admins/category/index/'.$this->session->userdata('page_num'),'refresh');
					}
				}
				else
				{
					if($this->session->userdata('role_id')!=1)
					{
						redirect('admins/page404','refresh');
					}
					$data['title'] = "Category";
					$data['subtitle'] = "Create";
					$data['main'] = 'admin/category/add';
					$data['webpagename'] = 'category';
					$data['subwebpagename'] = 'category';
					$this->load->vars($data);
					$this->load->view('admin/template/innermaster'); 
				}
			}

			function checkduplicationbyid()
			{
				$output['flag'] = $this->category_m->checkduplicationbyid();
				$output['csrfTokenName'] = $this->security->get_csrf_token_name();
				$output['csrfTokenHash'] = $this->security->get_csrf_hash();
				$this ->output->set_content_type('application/json') -> set_output(json_encode($output));
			}

			function update($uniqueid='')
			{
				if($this->input->post('id'))
				{  
					$this->category_m->update();
					$this->session->set_flashdata('message','Category updated successfully.');
					redirect('admins/category/index/'.$this->session->userdata('page_num'),'refresh');	
				} 
				else 
				{
					if($this->session->userdata('role_id')!=1)
					{
						redirect('admins/page404','refresh');
					}
					$data['title'] = "Category";
					$data['subtitle'] = "Update";
					$data['main'] = 'admin/category/update';
					$data['webpagename'] = 'category';
					$data['subwebpagename'] = 'category';
					$data['details'] = $this->category_m->getcategorybyid($uniqueid);
					$this->load->vars($data);
					$this->load->view('admin/template/innermaster');   
				}  
			}
			function details($uniqueid='')
			{
				
				if($this->session->userdata('role_id')!=1)
				{
					redirect('admins/page404','refresh');
				}
				$data['title'] = "Category";
				$data['subtitle'] = "Detail";
				$data['main'] = 'admin/category/details';
				$data['webpagename'] = 'category';
				$data['subwebpagename'] = 'category';
				$data['details'] = $this->category_m->getcategorybyid($uniqueid);
				$this->load->vars($data);
				$this->load->view('admin/template/innermaster');   

			}

			function delete()
			{
				$data['flag'] = $this->category_m->delete();
				$data['csrfTokenName'] = $this->security->get_csrf_token_name();
				$data['csrfTokenHash'] = $this->security->get_csrf_hash();
				echo json_encode($data);
			}

			function active()
			{
				$data['flag'] = $this->category_m->active();
				$data['csrfTokenName'] = $this->security->get_csrf_token_name();
				$data['csrfTokenHash'] = $this->security->get_csrf_hash();
				echo json_encode($data);
			}

			function inactive()
			{
				$data['flag'] = $this->category_m->inactive();
				$data['csrfTokenName'] = $this->security->get_csrf_token_name();
				$data['csrfTokenHash'] = $this->security->get_csrf_hash();
				echo json_encode($data);
			}

			function updatesortorder()
			{
				$data['flag'] = $this->category_m->updatesortorder();
				$data['csrfTokenName'] = $this->security->get_csrf_token_name();
				$data['csrfTokenHash'] = $this->security->get_csrf_hash();
				echo json_encode($data);
			}
		}
		?>