<?php
class cms_m extends CI_Model
{
	// Get all cms	count
	function get_count_cms_data()
	{
		$this->db->SELECT("id,title,description");
		$this->db->FROM("tbl_cms");
		$this->db->ORDER_BY("id","desc");
		$Q = $this->db->GET();
		return $Q->num_rows();
	}

	// Get all cms	data
	function getAllData($limit,$start)
	{
		$this->db->SELECT("id,title,description");
		$this->db->FROM("tbl_cms");
		$this->db->ORDER_BY("id","DESC");
		$this->db->LIMIT($limit,$start);
		$Q = $this->db->GET();

		return $Q->result_array();
	}

	// Get cms	by  id
	function getcmsbyid($id)
	{
		$decrypt_id = decrypt_url($id);
		$this->db->SELECT("id,title,description");
		$this->db->FROM("tbl_cms");
		$this->db->WHERE("id",$decrypt_id);
		$Q = $this->db->GET();
		return $Q->row_array();
	}

	// Check duplication
	function checkduplication()
	{
		$Q = $this->db->query('SELECT title FROM tbl_cms where title="'.$this->input->post('name').'"');
		if ($Q->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	// Check duplication by	id
	function checkduplicationbyid()
	{
		$Q = $this->db->query('SELECT name FROM tbl_cms where name="'.$this->input->post('title').'" and id !="'.$_POST['id'].'"');

		if ($Q->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// Update cms
	function update()
	{
		

		$data=array(
			
			'title'=>$_POST['title'],
			'description'=>$_POST['description'],
			'createddate'=>date('Y-m-d'),
		);
       
			$this->db->WHERE('id',$_POST['id']);
			$this->db->UPDATE('tbl_cms', $data);
	}

	// Delete cms
	function delete()
	{

			$this->db->where('id',$_POST['id']);
			$this->db->DELETE('tbl_cms');
			return true;
		
	}
	
}
