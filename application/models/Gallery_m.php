<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gallery_m extends CI_Model
{
	function get_categories()
	{
		$this->db->select('category.id, category.name, category.isactive, category.sort_order, COUNT(gallery.id) AS photo_count');
		$this->db->from('tbl_gallery_category AS category');
		$this->db->join('tbl_gallery_image AS gallery', 'gallery.category_id = category.id', 'left');
		$this->db->group_by('category.id');
		$this->db->order_by('category.sort_order', 'ASC');
		$this->db->order_by('category.name', 'ASC');

		return $this->db->get()->result_array();
	}

	function get_active_categories()
	{
		return $this->db->where('isactive', 1)
			->order_by('sort_order', 'ASC')
			->order_by('name', 'ASC')
			->get('tbl_gallery_category')
			->result_array();
	}

	function get_images()
	{
		$this->db->select('gallery.id, gallery.title, gallery.image, gallery.created_at, category.name AS category_name');
		$this->db->from('tbl_gallery_image AS gallery');
		$this->db->join('tbl_gallery_category AS category', 'category.id = gallery.category_id');
		$this->db->order_by('gallery.id', 'DESC');

		return $this->db->get()->result_array();
	}

	function add_category($name, $sort_order, $isactive)
	{
		$name = trim($name);
		if ($name === '' || ! is_numeric($sort_order) || (int) $sort_order < 0)
		{
			return FALSE;
		}

		$this->db->where('name', $name);
		if ($this->db->count_all_results('tbl_gallery_category') > 0)
		{
			return FALSE;
		}

		return $this->db->insert('tbl_gallery_category', array(
			'name' => $name,
			'sort_order' => (int) $sort_order,
			'isactive' => (int) (bool) $isactive
		));
	}

	function update_category($category_id, $sort_order, $isactive)
	{
		$category_id = (int) $category_id;
		if ( ! $this->category_exists($category_id) || ! ctype_digit((string) $sort_order))
		{
			return FALSE;
		}

		$this->db->where('id', $category_id);
		return $this->db->update('tbl_gallery_category', array(
			'sort_order' => (int) $sort_order,
			'isactive' => (int) (bool) $isactive
		));
	}

	function category_exists($category_id)
	{
		return $this->db->where('id', (int) $category_id)
			->count_all_results('tbl_gallery_category') > 0;
	}

	function delete_category($category_id)
	{
		$category_id = (int) $category_id;
		if ( ! $this->category_exists($category_id))
		{
			return 'missing';
		}

		if ($this->db->where('category_id', $category_id)->count_all_results('tbl_gallery_image') > 0)
		{
			return 'in_use';
		}

		$this->db->where('id', $category_id)->delete('tbl_gallery_category');
		return $this->db->affected_rows() > 0 ? 'deleted' : 'missing';
	}

	function add_photo($category_id, $title)
	{
		$category_id = (int) $category_id;
		$title = trim($title);
		if ( ! $this->category_exists($category_id) || ! $this->db->where(array('id' => $category_id, 'isactive' => 1))->count_all_results('tbl_gallery_category') || $title === '' || empty($_FILES['image']['name']))
		{
			$this->session->set_flashdata('error', 'Select an active category, enter a title, and choose an image.');
			return FALSE;
		}

		$original_dir = FCPATH.'userfiles/gallery/original/';
		$thumbnail_dir = FCPATH.'userfiles/gallery/thumbnail/';
		foreach (array($original_dir, $thumbnail_dir) as $directory)
		{
			if ( ! is_dir($directory) && ! mkdir($directory, 0755, TRUE))
			{
				$this->session->set_flashdata('error', 'The gallery upload folders could not be created.');
				return FALSE;
			}
		}

		$this->load->library('upload');
		$this->load->library('image_lib');
		$upload_config = array(
			'upload_path' => $original_dir,
			'allowed_types' => 'jpg|jpeg|png|gif',
			'max_size' => 12000,
			'file_name' => substr(sha1(uniqid(mt_rand(), TRUE)), 0, 24),
			'overwrite' => FALSE,
			'remove_spaces' => TRUE
		);
		$this->upload->initialize($upload_config);

		if ( ! $this->upload->do_upload('image'))
		{
			$this->session->set_flashdata('error', trim(strip_tags($this->upload->display_errors('', ''))));
			return FALSE;
		}

		$upload = $this->upload->data();
		$filename = $upload['file_name'];
		$thumbnail_config = array(
			'image_library' => 'gd2',
			'source_image' => $upload['full_path'],
			'new_image' => $thumbnail_dir.$filename,
			'quality' => '85%',
			'width' => 400,
			'height' => 400,
			'master_dim' => 'width',
			'maintain_ratio' => TRUE
		);
		$this->image_lib->initialize($thumbnail_config);
		if ( ! $this->image_lib->resize())
		{
			$error = trim(strip_tags($this->image_lib->display_errors()));
			$this->image_lib->clear();
			unlink($upload['full_path']);
			if (is_file($thumbnail_dir.$filename))
			{
				unlink($thumbnail_dir.$filename);
			}
			$this->session->set_flashdata('error', $error === '' ? 'The thumbnail could not be generated.' : $error);
			return FALSE;
		}
		$this->image_lib->clear();

		$inserted = $this->db->insert('tbl_gallery_image', array(
			'category_id' => $category_id,
			'title' => $title,
			'image' => $filename
		));
		if ( ! $inserted)
		{
			unlink($upload['full_path']);
			unlink($thumbnail_dir.$filename);
			$this->session->set_flashdata('error', 'The photo could not be saved to the gallery.');
			return FALSE;
		}

		return TRUE;
	}

	function delete_photo($photo_id)
	{
		$photo = $this->db->get_where('tbl_gallery_image', array('id' => (int) $photo_id))->row_array();
		if (empty($photo))
		{
			return FALSE;
		}

		if ( ! $this->db->delete('tbl_gallery_image', array('id' => (int) $photo_id)))
		{
			return FALSE;
		}

		$original = FCPATH.'userfiles/gallery/original/'.basename($photo['image']);
		$thumbnail = FCPATH.'userfiles/gallery/thumbnail/'.basename($photo['image']);
		if (is_file($original) && ! unlink($original))
		{
			log_message('error', 'Unable to delete gallery original image: '.$original);
		}
		if (is_file($thumbnail) && ! unlink($thumbnail))
		{
			log_message('error', 'Unable to delete gallery thumbnail: '.$thumbnail);
		}

		return TRUE;
	}
}
