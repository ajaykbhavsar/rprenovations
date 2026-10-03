<?php
class dashboard_fm extends CI_Model
{
	function get_homebanner()
	{ 
		$this->db->SELECT("id,banner_image,title,bannnersubtitle,status");
		$this->db->FROM('tbl_homebanners');
		$this->db->where('status','1');
		$this->db->ORDER_BY('id','ASC');
		$Q = $this->db->GET();
		return  $Q->result_array();
	}
	
	function getcategories()
	{ 
		$this->db->SELECT("*,(select count(id) from tbl_project where category=tbl_maincategory.uniqueid) as projectcount");
		$this->db->FROM('tbl_maincategory');
		$this->db->where('isactive','1');
		$this->db->ORDER_BY('sort_order','ASC');
		$Q = $this->db->GET();
		return  $Q->result_array();
	}
	
	function get_projects_bycategory($category)
	{ 
		$this->db->SELECT("*,(select image from tbl_project_image where project_id=tbl_project.id and image!='' limit 1) as image");
		$this->db->FROM('tbl_project');
		$this->db->where('isactive','1');
		$this->db->where('category',$category);
		$this->db->where('tbl_project.id IN (select tbl_project_image.project_id from tbl_project_image where tbl_project_image.image!="")', NULL, FALSE);
		$this->db->ORDER_BY('sort_order','ASC');
		$this->db->distinct();
		$Q = $this->db->GET();
		//echo $this->db->last_query(); die;
		return  $Q->result_array();
	}
	
	function get_subscriber($id)
    {
        $Q = $this->db->query('SELECT id,newslwtter_email FROM tbl_newsletter where id="'.$id.'"');//echo $this->db->last_query();die;
        return $Q->row_array();
    }
	
    function checkemail()
    {
        $Q = $this->db->query('SELECT newslwtter_email FROM tbl_newsletter where newslwtter_email="'.$_POST['subscribe'].'"');
        //echo $this->db->last_query();die();
        if ($Q->num_rows() > 0)
        {
            return true; 
        } 
        else
        {
            return false;
        }
    }

    function addsubscriber(){
		
        $charid = strtoupper(md5(uniqid(rand(), true)));
		$hyphen = chr(45);// "-"
		$uniqueid = substr($charid, 0, 8).$hyphen
		.substr($charid, 8, 4).$hyphen
		.substr($charid,12, 4).$hyphen
		.substr($charid,16, 4).$hyphen
		.substr($charid,20,12);

		$data=array(
			'newslwtter_email'=>$_POST['subscribe'],
			'uniqueid'=>$uniqueid,
			'createddate'=>date('Y-m-d'),
		);
		
		$this->db->INSERT('tbl_newsletter',$data);
		//echo $this->db->last_query();die();
		$id = $this->db->insert_id();
		return $id;
    }
}
?>