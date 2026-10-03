<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class newsletter extends Admin_Controller 
{
	function __construct()
	{
		parent::__construct();
	}
 
	function index($page='')
	{
		$data['title'] = "Newsletter";
		$data['subtitle'] = "Newsletter";
		
			

		if($this->session->userdata('role_id')==1){
		$data['main'] = 'admin/newsletter/manage';
		$data['webpagename'] = 'newsletter';
		$data['subwebpagename'] = 'newsletter';
		}else{
			redirect('admins/page404','refresh');
		}
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

		$data['address_count'] = $this->newsletter_m->get_count_address_data();
		
		$this->load->library('pagination');

		$config = array();
		$config["base_url"] = site_url('admins/newsletter/manage_data');
		$config["total_rows"] = $data['address_count'];
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

		$data['ltr_data']=$this->newsletter_m->getAllData($config["per_page"], $page);
		$data["pagination_link"] = $this->pagination->create_links();
		$data['webpagename'] = 'newsletter';
		$data['subwebpagename'] = 'newsletter';

		$offset = ($page) ? $page : 0;
		$first_record = $offset + 1;
		$data['srno'] = $first_record;
		$last_record = $page + count($data['ltr_data']);

		$output['body'] = $this->load->view('admin/newsletter/ajax_list', $data, true);

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


	

	
	function details($id=0)
	{
		$data['title'] = "Newsletter";
		$data['subtitle'] = "Newsletter Details";
		$data['main'] = 'admin/newsletter/details';
		$data['webpagename'] = 'newsletter';
		$data['subwebpagename'] = 'newsletter';
		$data['details'] = $this->newsletter_m->getaddressbyid($id);
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');   
	}

	function delete()
	{
		$data['flag'] = $this->newsletter_m->delete();
		$data['csrfTokenName'] = $this->security->get_csrf_token_name();
		$data['csrfTokenHash'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}
	
	function exporttoexcel()
	{
		$this->load->library('excel');
		$data['data'] = $this->newsletter_m->exporttoexcel();
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Newsletter');

		$field = array('Email','Date');
	
		$chr = "A";
		foreach($field as $row)
		{
			$this->excel->getActiveSheet()->setCellValue($chr."1",$row);
			$this->excel->getActiveSheet()->getStyle($chr."1")->getFont()->setSize(12);
			$this->excel->getActiveSheet()->getStyle($chr."1")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle($chr."1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$chr ++;
		}

		$i = "A";
		for($chr = 1; $chr < 3 ;$chr++)
		{
			$j=1;
			foreach($data['data'] as $row)
			{
			
				if($i == 'A')
				{
					$val = "newslwtter_email";
					
				}
				if($i == 'B')
				{
					$val = "";
					 $month = $row['createddate'];
					 $month_year =  date("d-m-Y", strtotime($month));
					 $row[$val] = $month_year;
				}
				
				
				$j++;

				$this->excel->getActiveSheet()->setCellValue($i.$j,$row[$val]);
				$this->excel->getActiveSheet()->getStyle($i.$j)->getFont()->setSize(10);
				$this->excel->getActiveSheet()->getStyle($i.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			}
			$i++;
		}

		$filename='TheFamilyFarmer_Newsletter.xls';
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel,'Excel5');
		$objWriter->save('php://output');
	}
}
?>