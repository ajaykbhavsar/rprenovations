<?php
class homebanner_m extends CI_Model
{
	function __construct ()
	{
		parent::__construct();
	}
	function get_count_banner_data()
	{
		$this->db->SELECT("*");
		$this->db->FROM("tbl_homebanners");

		if($this->input->post('title') && $this->input->post('title')!="")
		{
			$this->session->set_userdata('title',trim($this->input->post('title')));
			$this->db->LIKE('title',trim($this->input->post('title')));
		}
		else
		{
			$this->session->set_userdata('title','');
		}
		$this->db->ORDER_BY("id","desc");
		$Q = $this->db->GET();
		return $Q->num_rows();
	}

	function getAllData($limit,$start)
	{
		$this->db->SELECT("*");
		$this->db->FROM("tbl_homebanners");

		$this->db->ORDER_BY("id","DESC");
		$this->db->LIMIT($limit,$start);
		$Q = $this->db->GET();
		// echo $this->db->last_query(); exit;
		return $Q->result_array();
	}
	function checktitle()
	{
		$this->db->select('title');
		$this->db->where('title', $this->input->post('title'));
		$this->db->from('tbl_homebanners');
		$Q=$this->db->get();

		if ($Q->num_rows() > 0)
		{
			return true; 
		} 
		else
		{
			return false;
		}
	}
	function checktitlebyid()
	{
		$this->db->select('id,title');
		$this->db->from('tbl_homebanners');
		$this->db->where('title', $this->input->post('title'));
		$this->db->where('id !=', $this->input->post('id'));
		$Q=$this->db->get();
		if ($Q->num_rows() > 0)
		{
			return true; 
		} 
		else
		{
			return false; 
		}
	}


	function add_banner()
	{
		if ($this->input->post('agreeCheck') =='on')
		{
			$isactive = 1;
		}
		else
		{
			$isactive = 0;
		}
		$charid = strtoupper(md5(uniqid(rand(), true)));
		$hyphen = chr(45);// "-"
		$uniqueid = substr($charid, 0, 8).$hyphen
		.substr($charid, 8, 4).$hyphen
		.substr($charid,12, 4).$hyphen
		.substr($charid,16, 4).$hyphen
		.substr($charid,20,12);
		
		$data=array(
			'uniqueid'=>$uniqueid,
			'title'=>$this->input->post('title'),
			'bannnersubtitle'=>$this->input->post('bannnersubtitle'),
			'created_by' => $this->session->userdata('userid'),
			'created_date' => date('Y-m-d H:i:s'),
			'status'=>$isactive
		);

		$flag = FALSE;
		if(isset($_FILES['banner_image']['name']) && $_FILES['banner_image']['name']!="")
		{
			$path = './userfiles/homebanner/';
			if(!is_dir($path)) 
			{
				mkdir($path, 0777, TRUE);
			}

			$resizepath = './userfiles/homebanner/main/';
			if(!is_dir($resizepath)) 
			{
				mkdir($resizepath, 0777, TRUE);
			}

			$config['upload_path']          = $path;
			$config['allowed_types']        = 'gif|jpg|png|gif';
			$config['max_size']             = '';
			$config['max_width']            = "";
			$config['max_height']           = "";
			$config['overwrite']			= FALSE;
			$config['remove_spaces']		= TRUE;
			$config['file_name']			= time();

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('banner_image'))
			{

				$flag = FALSE;
				$error = array('warning' =>  $this->upload->display_errors());
				$this->session->set_flashdata('error',($error['warning']));
				redirect('admins/homebanner/index','refresh');
			}
			else
			{
				$image = $this->upload->data();
				if($image['image_width']==1920 && $image['image_height']==900)
				{
					$resize['image_library']	= 'gd2';
					$resize['source_image']		= $path.$image['file_name'];
					$resize['new_image']		= $resizepath;
					$resize['maintain_ratio']	= FALSE;
					$resize['width']			= 1920;
					$resize['height']			= 900;
					$resize['master_dim']		= 'width';
					$resize['quality']			= $this->config->item('image_quality');

					$this->load->library('image_lib',$resize);		// load library
					$this->image_lib->clear();				// must required to clear library
					$this->image_lib->initialize($resize);	// initialize library with data
					
					if (!$this->image_lib->resize())		// resize with data
					{
						if(FILE_EXISTS(FCPATH.$path.$image['file_name'])==1)
						{
							UNLINK(FCPATH.$path.$image['file_name']);	
						}

						$error = array('warning' =>  $this->image_lib->display_errors());
						$this->session->set_flashdata('error',($error['warning']));
						redirect('admins/homebanner/index','refresh');
					}

					$data['banner_image'] = $image['file_name'];
					$flag = TRUE;

					if(FILE_EXISTS(FCPATH.$path.$image['file_name'])==1)
					{
						UNLINK(FCPATH.$path.$image['file_name']);	
					}
				}
				else
				{
					$flag = FALSE;
					if(FILE_EXISTS(FCPATH.$path.$image['file_name'])==1)
					{
						UNLINK(FCPATH.$path.$image['file_name']);	
					}

					$this->session->set_flashdata('error',"Banner Size must be equal to 1920px X 900px.");
					redirect('admins/homebanner/index','refresh');
				}
			}
		}
		if($flag == TRUE)
		{
			$this->db->INSERT('tbl_homebanners', $data);
			//echo $this->db->last_query();die;
			return;
		}	

		
		//echo $this->db->last_query();die;
		
	}
	
	function gethomebannerid($id)
	{
		$this->db->SELECT('created_by,id,title,bannnersubtitle,banner_image,status');
		$this->db->FROM('tbl_homebanners');
		$this->db->WHERE('id', $id);
		$Q=$this->db->get();
		return $Q->row_array();
	}

	
	function update()
	{
		if ($this->input->post('agreeCheck') =='on')
		{
			$isactive = 1;
		}
		else
		{
			$isactive = 0;
		}

		$data = array(
			'title'=>$this->input->post('title'),
			'bannnersubtitle'=>$this->input->post('bannnersubtitle'),
			'updated_by'=> $this->session->userdata('userid'),
			'updated_date'=> date('Y-m-d H:i:s'),
			'status' => $isactive
		);

		$flag = TRUE;

		if(isset($_FILES['banner_image']['name']) && $_FILES['banner_image']['name']!="")
		{
			$path = './userfiles/homebanner/';
			if(!is_dir($path)) 
			{
				mkdir($path, 0777, TRUE);
			}

			$resizepath = './userfiles/homebanner/main/';
			if(!is_dir($resizepath)) 
			{
				mkdir($resizepath, 0777, TRUE);
			}

			$config['upload_path']          = $path;
			$config['allowed_types']        = '*';
			$config['max_size']             = '';
			$config['max_width']            = "";
			$config['max_height']           = "";
			$config['overwrite']			= FALSE;
			$config['remove_spaces']		= TRUE;
			$config['file_name']			= time();

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('banner_image'))
			{
				$flag = FALSE;
				$error = array('warning' =>  $this->upload->display_errors());
				$this->session->set_flashdata('error',($error['warning']));
				redirect('admins/homebanner/update/'.$this->input->post('id'),'refresh');
			}
			else
			{
				$image = $this->upload->data();

				if($image['image_width']==1920 && $image['image_height']==900)
				{
					$resize['image_library']	= 'gd2';
					$resize['source_image']		= $path.$image['file_name'];
					$resize['new_image']		= $resizepath;
					$resize['maintain_ratio']	= FALSE;
					$resize['width']			= 1920;
					$resize['height']			= 900;
					$resize['master_dim']		= 'width';
					$resize['quality']			= $this->config->item('image_quality');

					$this->load->library('image_lib');		// load library
					$this->image_lib->clear();				// must required to clear library
					$this->image_lib->initialize($resize);	// initialize library with data
					
					if (!$this->image_lib->resize())		// resize with data
					{
						$flag = FALSE;
						if(FILE_EXISTS(FCPATH.$path.$image['file_name'])==1)
						{
							UNLINK(FCPATH.$path.$image['file_name']);	
						}

						$error = array('warning' =>  $this->image_lib->display_errors());
						$this->session->set_flashdata('error',($error['warning']));
						redirect('admins/homebanner/update/'.$this->input->post('id'),'refresh');
					}
					
					// Unlink Existing image

					if(!empty($this->input->post('old_homebanner')))
					{
						if(FILE_EXISTS(FCPATH.$resizepath.$this->input->post('old_homebanner'))==1)
						{
							UNLINK(FCPATH.$resizepath.$this->input->post('old_homebanner'));	
							
									//$this->db->where('image',$_POST['old_image']);
									//$this->db->delete('tbl_news');
						}	
					}

					// $query = $this->db->query('select homebanner FROM tbl_homebannersmaster where id="'.$_POST['id'].'"');
					// $data1 = $query->row_array();
					// if($data1['homebanner']!= "")
					// {
					// 	if(FILE_EXISTS(FCPATH.$resizepath.$data1['homebanner'])==1)
					// 	{
					// 		UNLINK(FCPATH.$resizepath.$data1['homebanner']);	
					// 	}
					// }

					$data['banner_image'] = $image['file_name'];
					$flag = TRUE;

					if(FILE_EXISTS(FCPATH.$path.$image['file_name'])==1)
					{
						UNLINK(FCPATH.$path.$image['file_name']);	
					}
				}
				else
				{
					$flag = FALSE;
					if(FILE_EXISTS(FCPATH.$path.$image['file_name'])==1)
					{
						UNLINK(FCPATH.$path.$image['file_name']);	
					}

					$this->session->set_flashdata('error',"Banner Size must be equal to 1920px X 900px.");
					redirect('admins/homebanner/update/'.$this->input->post('id'),'refresh');
				}
			}
		}
	
		if($flag == TRUE)
		{
			$this->db->WHERE('id',$this->input->post('id'));
			$this->db->UPDATE('tbl_homebanners', $data);
		}
	}
	function delete()
	{	
		$decrypt_id = decrypt_url($this->input->post('id'));
		$Q = $this->db->query('select banner_image FROM tbl_homebanners where id="'.$decrypt_id.'"');
		$data1 = $Q->row_array();
		if($data1['banner_image']!= "")
		{
			if(FILE_EXISTS(FCPATH.'/userfiles/homebanner/main/'.$data1['banner_image'])==1)
			{
				UNLINK(FCPATH.'/userfiles/homebanner/main/'.$data1['banner_image']);	
			}
		}
		$this->db->where('id',$decrypt_id);
		$this->db->delete('tbl_homebanners');	
	}
	function active($id)
	{
		$decrypt_id = decrypt_url($id);
		$data=array(
			'status'=> '1'
		);
		$this->db->where('id', $decrypt_id);
		$this->db->update('tbl_homebanners',$data);
	}

	function inactive($id)
	{
		$decrypt_id = decrypt_url($id);
		$data=array(
			'status'=> '0'
		);
		$this->db->where('id', $decrypt_id);
		$this->db->update('tbl_homebanners',$data);
	}
	
	
}