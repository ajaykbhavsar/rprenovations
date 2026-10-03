<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class cms extends Admin_Controller 
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
		$data['title'] = "Cms";
		$data['subtitle'] = "Cms";
		$data['main'] = 'admin/cms/manage';
		$data['webpagename'] = 'cms';
		$data['subwebpagename'] = 'cms';
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

		$data['cms_count'] = $this->cms_m->get_count_cms_data();
		
		$this->load->library('pagination');

		$config = array();
		$config["base_url"] = site_url('admins/cms/manage_data');
		$config["total_rows"] = $data['cms_count'];
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

		$data['cms_data']=$this->cms_m->getAllData($config["per_page"], $page);
		$data["pagination_link"] = $this->pagination->create_links();
		$data['webpagename'] = 'cms';
		$data['subwebpagename'] = 'cms';

		$offset = ($page) ? $page : 0;
		$first_record = $offset + 1;
		$data['srno'] = $first_record;
		$last_record = $page + count($data['cms_data']);

		$output['body'] = $this->load->view('admin/cms/ajax_list', $data, true);

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
				$output['flag'] = $this->cms_m->checkduplication();
				$output['csrfTokenName'] = $this->security->get_csrf_token_name();
				$output['csrfTokenHash'] = $this->security->get_csrf_hash();
				$this ->output->set_content_type('application/json') -> set_output(json_encode($output));
			}

			function add()
			{
				if($this->input->post('name'))
				{
					$output = $this->cms_m->checkduplication();
					if($output == 1)
					{
						$this->session->set_flashdata('error','Please Check that Name already exists.');
						redirect('admins/cms/add','refresh');
					}
					else
					{
						$id = $this->cms_m->add();
						$this->session->set_flashdata('message','cms added successfully.');
						redirect('admins/cms/index/'.$this->session->userdata('page_num'),'refresh');
					}
				}
				else
				{
					if($this->session->userdata('role_id')!=1)
					{
						redirect('admins/page404','refresh');
					}
					$data['title'] = "Cms";
					$data['subtitle'] = "Add";
					$data['main'] = 'admin/cms/add';
					$data['webpagename'] = 'cms';
					$data['subwebpagename'] = 'cms';
					$this->load->vars($data);
					$this->load->view('admin/template/innermaster'); 
				}
			}

			function checkduplicationbyid()
			{
				
				$output['csrfTokenName'] = $this->security->get_csrf_token_name();
				$output['csrfTokenHash'] = $this->security->get_csrf_hash();
				$this ->output->set_content_type('application/json') -> set_output(json_encode($output));
			}

			function update($id=0)
			{
				if($this->input->post('id'))
				{  
					
					$this->cms_m->update();
					$this->session->set_flashdata('message','cms updated successfully.');
					redirect('admins/cms/index/'.$this->session->userdata('page_num'),'refresh');
					
				} 
				else 
				{
					if($this->session->userdata('role_id')!=1)
					{
						redirect('admins/page404','refresh');
					}
					$data['title'] = "Cms";
					$data['subtitle'] = "Update";
					$data['main'] = 'admin/cms/update';
					$data['webpagename'] = 'cms';
					$data['subwebpagename'] = 'cms';
					$data['details'] = $this->cms_m->getcmsbyid($id);
					$this->load->vars($data);
					$this->load->view('admin/template/innermaster');   
				}  
			}

			function details($id=0)
			{
				if($this->session->userdata('role_id')!=1)
				{
					redirect('admins/page404','refresh');
				}
				$data['title'] = "cms ";
				$data['subtitle'] = "cms Details";
				$data['main'] = 'admin/cms/details';
				$data['webpagename'] = 'cms';
				$data['subwebpagename'] = 'cms';
				$data['details'] = $this->cms_m->getcmsbyid($id);
				$this->load->vars($data);
				$this->load->view('admin/template/innermaster');   
			}

			function delete()
			{
				$data['flag'] = $this->cms_m->delete();
				$data['csrfTokenName'] = $this->security->get_csrf_token_name();
				$data['csrfTokenHash'] = $this->security->get_csrf_hash();
				echo json_encode($data);
			}

			function active()
			{
				$data['flag'] = $this->cms_m->active();
				$data['csrfTokenName'] = $this->security->get_csrf_token_name();
				$data['csrfTokenHash'] = $this->security->get_csrf_hash();
				echo json_encode($data);
			}

			function inactive()
			{
				$data['flag'] = $this->cms_m->inactive();
				$data['csrfTokenName'] = $this->security->get_csrf_token_name();
				$data['csrfTokenHash'] = $this->security->get_csrf_hash();
				echo json_encode($data);
			}

			function updatesortorder()
			{
				$data['flag'] = $this->cms_m->updatesortorder();
				$data['csrfTokenName'] = $this->security->get_csrf_token_name();
				$data['csrfTokenHash'] = $this->security->get_csrf_hash();
				echo json_encode($data);
			}
		}
		?>