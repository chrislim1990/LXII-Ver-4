<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {

	function load_view($data)
	{
		$this->load->view("includes/template",$data);
	}
	
	function index()
	{
		$data = array();
		if ($q = $this->data_model->show_records(2)) {
			$data["records"] = $q[0];
		}
		$data["path"] = "article.php";
		$this->load_view($data);
	}
	
	function create_new()
	{
		$data["path"] = "article_create_new.php";
		$this->load_view($data);
	}
	
	function create()
	{
		$form_config = array(
			array(
				'field' => 'title',
				'label' => 'Title',
				'rules' => 'trim|required'
				),
			array(
				'field' => 'contents',
				'label' => 'Contents',
				'rules' => 'trim|required'
				)
			);

		$this->form_validation->set_rules($form_config);

		if ($this->form_validation->run() == FALSE) :
			$this->create_new();
		else :

			$data = array(
				'title' => $this->input->post('title'),
				'contents' => $this->input->post('contents'),
				);

		$this->data_model->add_records($data);
		
		$data["path"] = "article_added.php";
		$this->load_view($data);

		endif;
	}
	
	function delete_article()
	{
		$this->load->library('table');
		$this->load->library('pagination');

		$config["base_url"] = 'http://localhost:8888/article/delete_article';
		$config["total_rows"] = $this->db->get('data')->num_rows();
		$config["per_page"] = 5;
		$config["num_links"] = 20;
		$config["full_tag_open"] = "<div class='pagination'><ul>";
		$config["full_tag_close"] = "</ul></div>";
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		
		$data["records"] = $this->data_model->all_records($config['per_page']);

		$data["path"] = "article_delete.php";
		$this->load_view($data);
	}
	
	function delete()
	{
		$this->data_model->delete_records();
		redirect("article/delete_article/");
	}
	
	function edit()
	{
		$data = array();
		if ($q = $this->data_model->show_records(3)) {
			$data["records"] = $q[0];
		}
		$data['path'] = 'edit_article';
		$this->load_view($data);
	}
	function update()
	{
		$form_config = array(
			array(
				'field' => 'title',
				'label' => 'Title',
				'rules' => 'trim|required'
				),
			array(
				'field' => 'contents',
				'label' => 'Contents',
				'rules' => 'trim|required'
				)
			);

		$this->form_validation->set_rules($form_config);

		if ($this->form_validation->run() == FALSE) :
			$this->create_new();
		else :

			$data = array(
				'title' => $this->input->post('title'),
				'contents' => $this->input->post('contents'),
				'id' => $this->input->post('id'),
				);

		$this->data_model->update_records($data);
		
		$data["path"] = "edit_success.php";
		$this->load_view($data);

		endif;
	}
}