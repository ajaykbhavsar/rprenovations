<?php
class category_m extends CI_Model
{
	// Get all category	count
	function get_count_category_data()
	{
		$this->db->SELECT("*");
		$this->db->FROM("tbl_category");

		if($this->input->post('name') && $this->input->post('name')!="")
		{
			$this->session->set_userdata('search_name',trim($this->input->post('name')));
			$this->db->LIKE('name',trim($this->input->post('name')));
		}
		else
		{
			$this->session->set_userdata('search_name','');
		}
		$this->db->ORDER_BY("id","desc");
		$Q = $this->db->GET();
		return $Q->num_rows();
	}

	// Get all category	data
	function getAllData($limit,$start)
	{
		$this->db->SELECT("*,(select name from tbl_maincategory where uniqueid=tbl_category.maincategory) as maincategoryname");
		$this->db->FROM("tbl_category");

		if(isset($_POST['name']) &&	$_POST['name']!="")
		{
			$this->session->set_userdata('search_name',$_POST['name']);
			$this->db->LIKE('name',$_POST['name']);
		}
		else
		{
			$this->session->set_userdata('search_name','');
		}

		$this->db->ORDER_BY("id","desc");
		$this->db->LIMIT($limit,$start);
		$Q = $this->db->GET();

		return $Q->result_array();
	}

	// Get category	by  id
	function getcategorybyid($uniqueid)
	{
		$this->db->SELECT("id,maincategory,name,description,uniqueid,image,sort_order,isactive,metatitle,metakeyword,metadesc,(select name from tbl_maincategory where uniqueid=tbl_category.maincategory) as maincategoryname");
		$this->db->FROM("tbl_category");
		$this->db->WHERE("uniqueid",$uniqueid);
		$Q = $this->db->GET();
		return $Q->row_array();
	}

	function get_sortorder(){
		$this->db->select_max("sort_order");
		$this->db->FROM("tbl_category");
		$Q = $this->db->GET();

		return $Q->row_array();

	}
	// Check duplication
	function checkduplication()
	{
		$this->db->SELECT("name");
		$this->db->FROM("tbl_category");
		$this->db->WHERE("name",$this->input->post('name'));
		$this->db->WHERE("maincategory",$this->input->post('maincategory'));
		$Q = $this->db->GET();
		if ($Q->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// Add category
	function add()
	{ 
		if(isset($_POST['agreeCheck']) =='agree')
		{
			$isactive =	1;
		}
		else
		{
			$isactive =	0;
		}

		$charid = strtoupper(md5(uniqid(rand(), true)));
		$hyphen = chr(45);// "-"
		$uniqueid = substr($charid, 0, 8).$hyphen
		.substr($charid, 8, 4).$hyphen
		.substr($charid,12, 4).$hyphen
		.substr($charid,16, 4).$hyphen
		.substr($charid,20,12);

		$data=array(
			'maincategory'=>$_POST['maincategory'],
			'name'=>$_POST['name'],
			'uniqueid'=>$uniqueid,
			'sort_order'=>$_POST['sort_order'],
			//'description'=>$_POST['description'],
			// 'metatitle'=>$_POST['metatitle'],
			// 'metakeyword'=>$_POST['metakeyword'],
			// 'metadesc'=>$_POST['metadesc'],
			'isactive'=>$isactive,
			'createddate'=>date('Y-m-d'),
		);

		$slugconfig = array(
			'table' => 'tbl_category',
			'id' => 'id',
			'field' => 'slug',
			'name' => 'name',
            'replacement' => 'dash' // Either dash or underscore
        );

		$this->load->library('slug', $slugconfig);
		$data['slug'] = $this->slug->create_uri($_POST['name']);
		
		$flag = TRUE;
		//$flag = FALSE;
		/*if(isset($_FILES['image']['name']) && $_FILES['image']['name']!="")
		{
			$path = './userfiles/category/';
			if(!is_dir($path)) 
			{
				mkdir($path, 0777, TRUE);
			}

			$config['upload_path'] = $path;
			$config['allowed_types'] = '*';
			$config['max_size'] = 1024;
			$config['max_width'] = '';
			$config['max_height'] = '';
			$config['overwrite'] = FALSE;
			$config['remove_spaces'] = TRUE;
			$config['file_name'] = time();

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('image')) {
				$flag = FALSE;
				$error = array('warning' => $this->upload->display_errors());
				$this->session->set_flashdata('error', ($error['warning']));
				
				redirect('admins/category/index', 'refresh');
			}else{
				$image = $this->upload->data();

				$data['image'] = $image['file_name'];
				$flag = TRUE;
			}
		}*/
		
		if($flag==TRUE)
		{
			//print_r($data); die;
			$this->db->INSERT('tbl_category', $data);
			return;
		}

	}



	// Check duplication by	id
	function checkduplicationbyid()
	{
		$this->db->SELECT("name");
		$this->db->FROM("tbl_category");
		$this->db->WHERE("maincategory",$this->input->post('maincategory'));
		$this->db->WHERE("name",$this->input->post('name'));
		$this->db->WHERE("id!=",$this->input->post('id'));
		$Q = $this->db->GET();

		if ($Q->num_rows() > 0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	// Update category
	function update()
	{
		//echo "<pre>";print_r($_POST);die;
		if(isset($_POST['agreeCheck']) == 'agree')
		{
			$isactive =	1;
		}
		else
		{
			$isactive =	0;
		}

		$data=array(
			'maincategory'=>$_POST['maincategory'],
			'name'=>$_POST['name'],
			'sort_order'=>$_POST['sort_order'],
			//'description'=>$_POST['description'],
			// 'metatitle'=>$_POST['metatitle'],
			// 'metakeyword'=>$_POST['metakeyword'],
			// 'metadesc'=>$_POST['metadesc'],
			'isactive'=>$isactive,
			'createddate'=>date('Y-m-d'),
		);
		$slugconfig = array(
			'table' => 'tbl_category',
			'id' => 'id',
			'field' => 'slug',
			'name' => 'name',
            'replacement' => 'dash' // Either dash or underscore
        );

		$this->load->library('slug', $slugconfig);
		$data['slug'] = $this->slug->create_uri($_POST['name'],$_POST['id']);
		$flag = TRUE;
		/*if(isset($_FILES['image']['name']) && $_FILES['image']['name']!="")
		{
			$path = './userfiles/category/';
			if(!is_dir($path)) 
			{
				mkdir($path, 0777, TRUE);
			}

			$config['upload_path'] = $path;
			$config['allowed_types'] = '*';
			$config['max_size'] = 1024;
			$config['max_width'] = '';
			$config['max_height'] = '';
			$config['overwrite'] = FALSE;
			$config['remove_spaces'] = TRUE;
			$config['file_name'] = time();

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('image')) {
				$flag = FALSE;
				$error = array('warning' => $this->upload->display_errors());
				$this->session->set_flashdata('error', ($error['warning']));
				redirect('admins/category/update/'.$this->input->post('uniid'),'refresh');
			}else{
				$image = $this->upload->data();
				if(FILE_EXISTS(FCPATH.$path.$_POST['old_image'])==1)
				{
					UNLINK(FCPATH.$path.$_POST['old_image']);   
				}

				$data['image'] = $image['file_name'];
				$flag = TRUE;
			}
		}*/
		if($flag==TRUE)
		{
			$this->db->WHERE('id',$_POST['id']);
			$this->db->UPDATE('tbl_category', $data);
		}

	}

	// Delete category
	function delete()
	{
		$this->db->SELECT('*');
		$this->db->FROM('tbl_product');
		$this->db->WHERE('category',$this->input->post('id'));
		$Qdelete = $this->db->GET();

		if($Qdelete->num_rows() > 0)
		{
			return false;
		}
		else
		{
			$datadelete = $Qdelete->row_array();

			/*if(isset($datadelete['image']) && $datadelete['image']!='')
			{
				if(file_exists(FCPATH.'/userfiles/category/'.$datadelete['image'])==1)
				{
					UNLINK(FCPATH.'/userfiles/category/'.$datadelete['image']);	
				}
			}*/
			$this->db->where('uniqueid',$_POST['id']);
			$this->db->DELETE('tbl_category');
			return true;

		}



	}

	// Active category
	function active()
	{
		$data=array(
			'isactive'=> '1'
		);

		$this->db->where('id',$_POST['id']);
		$this->db->update('tbl_category',$data);
		return true;
	}

	// Active category
	function inactive()
	{
		$data=array(
			'isactive'=> '0'
		);

		$this->db->where('id',$_POST['id']);
		$this->db->update('tbl_category',$data);
		return true;
	}

	// Update sort order
	function updatesortorder()
	{
		$id = explode(',',$_POST['id']);
		$sortorder = explode(',',$_POST['sortorder']);
		for($i = 0; $i < count($id); $i++)
		{
			$this->db->where('id',$id[$i]);
			$this->db->update('tbl_category', array('sort_order' => $sortorder[$i]));	
		}
		return true;
	}
	
	function getmaincategory(){
		$this->db->select("id,name,uniqueid");
		$this->db->FROM(" tbl_maincategory");
		$this->db->WHERE('isactive',1);
		$this->db->ORDER_BY("name",'ASC');
		$Q = $this->db->GET();
		return $Q->result_array();
	}
}
