<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gallery_fm extends CI_Model
{
	function get_categories_with_images()
	{
		$this->db->select('category.id, category.name');
		$this->db->from('tbl_gallery_category AS category');
		$this->db->join('tbl_gallery_image AS gallery', 'gallery.category_id = category.id');
		$this->db->where('category.isactive', 1);
		$this->db->group_by('category.id');
		$this->db->order_by('category.sort_order', 'ASC');
		$this->db->order_by('category.name', 'ASC');

		return $this->db->get()->result_array();
	}

	function get_gallery_images()
	{
		$this->db->select('gallery.image, gallery.title, gallery.category_id, category.name AS category_name');
		$this->db->from('tbl_gallery_image AS gallery');
		$this->db->join('tbl_gallery_category AS category', 'category.id = gallery.category_id');
		$this->db->where('category.isactive', 1);
		$this->db->order_by('category.sort_order', 'ASC');
		$this->db->order_by('category.name', 'ASC');
		$this->db->order_by('gallery.id', 'DESC');

		return $this->db->get()->result_array();
	}
}
