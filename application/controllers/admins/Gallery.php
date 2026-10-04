<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gallery extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') != 1)
		{
			redirect('admins/page404', 'refresh');
		}
	}

	function index()
	{
		$data['title'] = 'Gallery';
		$data['subtitle'] = 'Manage Gallery';
		$data['main'] = 'admin/gallery/manage';
		$data['webpagename'] = 'gallery';
		$data['subwebpagename'] = 'gallery';
		$data['categories'] = $this->gallery_m->get_categories();
		$data['active_categories'] = $this->gallery_m->get_active_categories();
		$data['images'] = $this->gallery_m->get_images();

		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');
	}

	function add_category()
	{
		$name = trim($this->input->post('name', TRUE));
		$sort_order = $this->input->post('sort_order');
		$isactive = $this->input->post('isactive') === '1';
		if ($name === '' || ! ctype_digit((string) $sort_order))
		{
			$this->session->set_flashdata('error', 'Enter a category name and a valid sort order.');
		}
		elseif ($this->gallery_m->add_category($name, $sort_order, $isactive))
		{
			$this->session->set_flashdata('message', 'Gallery category added successfully.');
		}
		else
		{
			$this->session->set_flashdata('error', 'That category already exists or could not be saved.');
		}

		redirect('admins/gallery');
	}

	function update_category()
	{
		$category_id = $this->input->post('category_id');
		$sort_order = $this->input->post('sort_order');
		$isactive = $this->input->post('isactive') === '1';

		if ( ! ctype_digit((string) $category_id) || ! ctype_digit((string) $sort_order))
		{
			$this->session->set_flashdata('error', 'Invalid category or sort order.');
		}
		elseif ($this->gallery_m->update_category($category_id, $sort_order, $isactive))
		{
			$this->session->set_flashdata('message', 'Gallery category updated successfully.');
		}
		else
		{
			$this->session->set_flashdata('error', 'The gallery category could not be updated.');
		}

		redirect('admins/gallery');
	}

	function upload_photo()
	{
		$category_id = $this->input->post('category_id');
		$title = trim($this->input->post('title', TRUE));

		if ( ! ctype_digit((string) $category_id) || $title === '')
		{
			$this->session->set_flashdata('error', 'Select a category and enter a photo title.');
		}
		elseif ($this->gallery_m->add_photo($category_id, $title))
		{
			$this->session->set_flashdata('message', 'Gallery photo uploaded successfully.');
		}

		redirect('admins/gallery');
	}

	function delete_category()
	{
		$category_id = $this->input->post('category_id');
		if ( ! ctype_digit((string) $category_id))
		{
			$this->session->set_flashdata('error', 'Invalid gallery category.');
		}
		else
		{
			$result = $this->gallery_m->delete_category($category_id);
			if ($result === 'deleted')
			{
				$this->session->set_flashdata('message', 'Gallery category deleted successfully.');
			}
			elseif ($result === 'in_use')
			{
				$this->session->set_flashdata('error', 'Delete the category photos before deleting this category.');
			}
			else
			{
				$this->session->set_flashdata('error', 'Gallery category was not found.');
			}
		}

		redirect('admins/gallery');
	}

	function delete_photo()
	{
		$photo_id = $this->input->post('photo_id');
		if ( ! ctype_digit((string) $photo_id) || ! $this->gallery_m->delete_photo($photo_id))
		{
			$this->session->set_flashdata('error', 'The gallery photo could not be deleted.');
		}
		else
		{
			$this->session->set_flashdata('message', 'Gallery photo deleted successfully.');
		}

		redirect('admins/gallery');
	}
}
