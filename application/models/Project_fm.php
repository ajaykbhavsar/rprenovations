<?php
class project_fm extends CI_Model
{
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
	
	function getprojectdetails($uniqueid)
	{
		$data = array();
		$Q = $this->db->select('*,(select name from tbl_maincategory where uniqueid=tbl_project.category) as categoryname from tbl_project where uniqueid="'.$uniqueid.'"');
		$Q =  $this->db->get();
		if ($Q->num_rows() > 0)
		{
			$data = $Q->row_array();
		}
		//print_r($this->db->last_query());die;
		$Q->free_result();  
		return $data; 
	}
	
	function getallprojectimage($id)
	{
		$data = array();
		$Q = $this->db->select('id,image FROM tbl_project_image where project_id="'.$id.'" order by id asc');
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
}
?>