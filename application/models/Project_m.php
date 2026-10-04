<?php
class project_m extends CI_Model
{
	// Get all category	count
	function get_count_project_data()
	{
		$this->db->SELECT("id,uniqueid,projectname,isactive,(select name from tbl_maincategory where uniqueid=tbl_project.category)as category,sort_order");
		$this->db->FROM(" tbl_project");

		if(isset($_POST['name']) &&	$_POST['name']!="")
		{
			$this->session->set_userdata('search_name',$_POST['name']);
			$this->db->LIKE('projectname',$_POST['name']);
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
		$this->db->SELECT("id,uniqueid,projectname,isactive,(select name from tbl_maincategory where uniqueid=tbl_project.category)as category,sort_order");
		$this->db->FROM(" tbl_project");

		if(isset($_POST['name']) &&	$_POST['name']!="")
		{
			$this->session->set_userdata('search_name',$_POST['name']);
			$this->db->LIKE('projectname',$_POST['name']);
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

	function getmaincategory(){
		$this->db->select("id,name,uniqueid");
		$this->db->FROM(" tbl_maincategory");
		$this->db->WHERE('isactive',1);
		$this->db->ORDER_BY("name",'ASC');
		$Q = $this->db->GET();
		return $Q->result_array();
	}
	
	// Check duplication
	function checkduplication()
	{
		//print_r($_POST); die;
		$Q = $this->db->query('SELECT projectname FROM tbl_project where projectname="'.$_POST['projectname'].'" and category="'.$_POST['category'].'"');
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
		if (isset($_POST['agreeCheck']) =='agree')
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

		$data=array();
		$data=array(
			'uniqueid'=>$uniqueid,
			'category'=>$_POST['category'],
			'projectname'=>ucfirst($_POST['projectname']),
			'detaildesc'=>$_POST['detaildesc'],
			'shortdesc'=>$_POST['shortdesc'],
			'isactive' => $isactive,
			'sort_order'=>$_POST['sort_order'],
		);
		
		//print_r($data);die;

		//-------------Slug Code--------------
		$slugconfig = array(
				'table' => 'tbl_project',
				'id' => 'id',
				'field' => 'slug',
				'title' => 'projectname',
				'replacement' => 'dash' // Either dash or underscore
				);
		$this->load->library('slug', $slugconfig);

		$data['slug'] = $this->slug->create_uri($_POST['projectname']);

		$this->db->insert('tbl_project', $data);
	}

	// Check duplication by	id
	function checkduplicationbyid()
	{
		$Q = $this->db->query('SELECT projectname FROM tbl_project where id!="'.$_POST['id'].'" and projectname="'.$_POST['projectname'].'" and category="'.$_POST['category'].'"');
		// echo $this->db->last_query();die;

		if ($Q->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// Update category
	function update()
	{
		//echo $_POST['agreeCheck'];die;
		if (isset($_POST['agreeCheck']) =='agree')
		{
			$isactive = 1;
		}
		else
		{
			$isactive = 0;
		}
		
		$data=array(
			'category'=>$_POST['category'],
			'projectname'=>ucfirst($_POST['projectname']),
			'detaildesc'=>$_POST['detaildesc'],
			'shortdesc'=>$_POST['shortdesc'],
			'isactive' => $isactive,
			'sort_order'=>$_POST['sort_order'],
		);
		//print_R($data);die;
		//-------------Slug Code--------------
		$slugconfig = array(
						'table' => 'tbl_project',
						'id' => 'id',
						'field' => 'slug',
						'title' => 'projectname',
						'replacement' => 'dash' // Either dash or underscore
		);
		$this->load->library('slug', $slugconfig);

		$data['slug'] = $this->slug->create_uri($_POST['projectname'],$this->input->post('id'));

		$this->db->where('id',$this->input->post('id'));
		$this->db->update('tbl_project',$data);
	}

	// Active category
	function active()
	{
		$data=array(
			'isactive'=> '1'
		);

		$this->db->where('uniqueid',$_POST['id']);
		$this->db->update(' tbl_project',$data);
		return true;
	}

	// Active category
	function inactive()
	{
		$data=array(
			'isactive'=> '0'
		);

		$this->db->where('uniqueid',$_POST['id']);
		$this->db->update(' tbl_project',$data);
		return true;
	}
	
	function getallcategory()
	{
		$data = array();
		
		$Q = $this->db->select('id, name from tbl_maincategory where isactive=1 order by name asc');
		$Q = $this->db->get();
		//echo $this->db->last_query();
		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();  
		return $data; 
	}
	
	function getprojectdetail($uniqueid)
	{
		$data = array();
		$Q = $this->db->select('*,(select name from tbl_maincategory where uniqueid=tbl_project.category)as categoryname FROM tbl_project where uniqueid= "'.$uniqueid.'" ');
		$Q =  $this->db->get();
		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data= $row;
			}
		}
		$Q->free_result();
		//print_R($data);die;
		return $data; 
	}
	
	function deleteproject()
	{
		$uniqueid=$_POST['id'];
		
	    $projectdetail=$this->getprojectdetail($uniqueid);
		
		$id=$projectdetail['id'];
			
		$this->load->helper('file');
		$options = array('project_id' =>$id);
		$Q = $this->db->get_where('tbl_project_image',$options);

		if ($Q->num_rows() > 0)
		{  //echo "<pre>";
			//print_r($Q->result_array() );die;
			foreach ($Q->result_array() as $row)
			{
				//$imagedata[]=$row['image'];
				if($row['image'] != "")
				{
					unlink(FCPATH.'/userfiles/photogallery/main/'.$row['image']);
					unlink(FCPATH.'/userfiles/photogallery/small/'.$row['image']);
				}
			}
			//echo "<pre>";
			//print_r($imagedata);die;
		}
		
		$this->db->where('project_id', $id);
		$this->db->delete('tbl_project_image');
		
		$this->db->where('id', $id);
		$this->db->delete('tbl_project');
		
		return true;
	} 
	
	function get_sortorder(){
		$this->db->select_max("sort_order");
		$this->db->FROM("tbl_project");
		$Q = $this->db->GET();
		return $Q->row_array();
	}
	
	// Update sort order
	function updatesortorder()
	{
		$id = explode(',',$_POST['id']);
		$sortorder = explode(',',$_POST['sortorder']);
		for($i = 0; $i < count($id); $i++)
		{
			$this->db->where('id',$id[$i]);
			$this->db->update('tbl_project', array('sort_order' => $sortorder[$i]));	
		}
		return true;
	}
	
	// Images Code Start
	
	function get_count_project_image_data()
	{
		$uniqueid=$_POST['id'];
	    $projectdetail=$this->getprojectdetail($uniqueid);
		$id=$projectdetail['id'];
		
		$this->db->SELECT("id,project_id,image");
		$this->db->FROM("tbl_project_image");
		$this->db->WHERE("project_id",$id);

		$this->db->ORDER_BY("id","desc");
		$Q = $this->db->GET();
		return $Q->num_rows();
	}
	
	function getAll_project_image_Data($limit,$start)
	{
		$uniqueid=$_POST['id'];
	    $projectdetail=$this->getprojectdetail($uniqueid);
		$id=$projectdetail['id'];
		
		$this->db->SELECT("id,project_id,image");
		$this->db->FROM("tbl_project_image");
		$this->db->WHERE("project_id",$id);

		$this->db->ORDER_BY("id","DESC");
		$this->db->LIMIT($limit,$start);
		$Q = $this->db->GET();

		return $Q->result_array();
	}
	
	function addphotogallery()
	{
		$uniqueid=$_POST['project_id'];
	    $projectdetail=$this->getprojectdetail($uniqueid);
		$id=$projectdetail['id'];
		
		$data=array(
			'project_id'=>$id	
		);
			
		$flag=FALSE;
		$errormsg ="";	

		$this->load->library('upload');
		$this->load->library('image_lib');
		$upload_conf = array(
			'upload_path'   => realpath('userfiles/photogallery'),
			'allowed_types' => 'gif|jpg|png|jpeg',
			'max_width'  => '',
			'max_height' => '',
			'file_name'  => time(),
			'max_size'   => '30000',
		);
		$this->upload->initialize($upload_conf);

		if ( ! $this->upload->do_upload('image'))
		{
			$flag = false;
			$error = array('warning' =>  $this->upload->display_errors());
			$this->session->set_flashdata('error',($error[warning]));
			redirect('admins/project/manageimage/'.$uniqueid.'/'.$this->session->userdata('page_num'),$error);
		}
		else
		{
			$upload_data = $this->upload->data();
			$imgdir = $_SERVER ["DOCUMENT_ROOT"];
			list($width,$height)=getimagesize(FCPATH.'/userfiles/photogallery/'.$upload_data['file_name']);
			$flag = TRUE;
			$resize_conf = array(
				'source_image'  => $upload_data['full_path'], 
				'new_image'=>realpath('userfiles/photogallery/main').'/'.$upload_data['file_name'],
				'width'         => '',
				'height'        => '',
				'quality'		=> $this->config->item('image_quality'),
			);
			$this->load->library('image_lib', $resize_conf);
			$this->image_lib->clear();
			$this->image_lib->initialize($resize_conf);
				
			if ( ! $this->image_lib->resize())
			{
				$error['resize'][] = $this->image_lib->display_errors();
				$flag = false;
			}
			else
			{
				$main_image = $upload_data['file_name'];
				$flag = TRUE;														 
			}
			
			$resize_conf = array(
				'source_image'  => $upload_data['full_path'], 
				'new_image'=>realpath('userfiles/photogallery/small').'/'.$upload_data['file_name'],
				'quality' => $this->config->item('image_quality'),
				'width'         => 100,
				'height'        => 76,
				'master_dim'=>'width',
			);
			$this->image_lib->clear();	
			$this->load->library('image_lib', $resize_conf);
			$this->image_lib->initialize($resize_conf);
			if ( ! $this->image_lib->resize())
			{
			   $error['resize'][] = $this->image_lib->display_errors();
			   $flag = false;
			}
			else
			{
				$data['image'] = $upload_data['file_name'];
				$flag = TRUE;
			}
					
			if(FILE_EXISTS(FCPATH.'/userfiles/photogallery/'.$upload_data['file_name'])==1)
			{
				UNLINK(FCPATH.'/userfiles/photogallery/'.$upload_data['file_name']);	
			}	
		}
		
		if($flag == true )
		{
			$data['image'] = $upload_data['file_name'];
			$this->db->insert('tbl_project_image',$data);
			return $uniqueid;
		}
		else
		{
			return 0;
		}
	}
	
	function deletephotogallery()
	{
		$id=$_POST['id'];
		$this->load->helper('file');
		$options = array('id' =>$id);
		$Q = $this->db->get_where('tbl_project_image',$options);
		if ($Q->num_rows() > 0)
		{  
			foreach ($Q->result_array() as $row)
			{
				if($row['image'])
				{
					if(FILE_EXISTS(FCPATH.'/userfiles/photogallery/small/'.$row['image'])==1)
					{
						UNLINK(FCPATH.'/userfiles/photogallery/small/'.$row['image']);	
					}
					if(FILE_EXISTS(FCPATH.'/userfiles/photogallery/'.$row['image'])==1)
					{
						UNLINK(FCPATH.'/userfiles/photogallery/'.$row['image']);	
					}
					if(FILE_EXISTS(FCPATH.'/userfiles/photogallery/main/'.$row['image'])==1)
					{
						UNLINK(FCPATH.'/userfiles/photogallery/main/'.$row['image']);	
					}
				}
			}
		}
		
		$this->db->where('id',$id);
		$this->db->delete('tbl_project_image');
		
		return true;
	}
	
	function GetProjectAllimagebyid($pid)
	{
		$data = array();
		$Q = $this->db->select('* from tbl_project_image where project_id="'.$pid.'"');
		$Q =  $this->db->get();

		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}		
		$Q->free_result();  
		return $data; 
	}
	
	// Image Code Ends
}
