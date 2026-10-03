<?php
class newsletter_m extends CI_Model
{
	// Get all address	count
	function get_count_address_data()
	{
		$this->db->SELECT("*");
		$this->db->FROM("tbl_newsletter");
		$this->db->ORDER_BY("id","desc");
		$Q = $this->db->GET();
		return $Q->num_rows();
	}

	// Get all address	data
	function getAllData($limit,$start)
	{
		$this->db->SELECT("*");
		$this->db->FROM("tbl_newsletter");
		$this->db->ORDER_BY("id","DESC");
		$this->db->LIMIT($limit,$start);
		$Q = $this->db->GET();

		return $Q->result_array();
	}

	// Get address	by  id
	function getaddressbyid($id)
	{
		$this->db->SELECT("*");
		$this->db->FROM("tbl_newsletter");
		$this->db->WHERE("id",$id);
		$Q = $this->db->GET();
		return $Q->row_array();
	}

	
	// Update address
	function update()
	{
		

		$data=array(
			
			'address'=>$_POST['address'],
			'email'=>$_POST['email'],
			'phoneno'=>$_POST['phoneno'],
			'txt_url'=>$_POST['txt_url'],
			
		);
       
			$this->db->WHERE('id',$_POST['id']);
			$this->db->UPDATE('tbl_newsletter', $data);
	}

	// Delete address
	function delete()
	{

			$this->db->where('id',$_POST['id']);
			$this->db->DELETE('tbl_newsletter');
			return true;
		
	}
	
	function exporttoexcel()
	{
		$this->db->SELECT('*');
		$this->db->FROM('tbl_newsletter');
		$this->db->DISTINCT();
		$this->db->ORDER_BY('id','DESC');
		$Q = $this->db->GET();
		//echo $this->db->last_query();exit;
		return $Q->result_array();
	}
	
}
