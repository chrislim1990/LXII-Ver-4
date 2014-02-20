<?php

class Data_model extends CI_Model{


	// Home
	function get_slides_records(){
		return $this->db->get('slideshows')->result();
	}

	// Testimonial
	function get_testimonial(){
		return $this->db->get('testimonial')->result();
	}

	// About
	function get_faqs(){
		return $this->db->get('faqs')->result();
	}

	// Portfolio
	function get_all_projects(){
		return $this->db->get_where('portfolio', array('hidden !=' => 1))->result();
	}
	function get_project(){
		$project_id = $this->uri->segment(2);
		return $this->db->get_where('portfolio', array('url' => $project_id))->result();
	}
	function get_all_other_projects(){
		$project_id = $this->uri->segment(2);
		$this->db->order_by('id', 'RANDOM');
		return $this->db->get_where('portfolio', array('hidden !=' => 1,'url !=' => $project_id),4)->result();
	}


	// Products
	function get_allproducts(){
		return $this->db->get_where('products', array('hidden !=' => 1))->result();
	}
	function get_product(){
		$product_id = $this->uri->segment(2);
		return $this->db->get_where('products', array('id' => $product_id))->result();
	}
	function get_similiar(){
		$product_id = $this->uri->segment(2);
		return $this->db->get_where('products', array('id !=' => $product_id))->result();
	}

	function show_records($num){
		return $this->db->where('url', $this->uri->segment($num))->get('portfolio')->result(); 
	}

	function all_records($config){
		$query = $this->db->get('portfolio', $config, $this->uri->segment(3));

		if($query->num_rows()>0){
			foreach($query->result() as $row){
				$data[] = array(
					$row->id,
					$row->title,
					$row->author,
					$row->contents
					);
			}
			return $data;
		}
	}
	function get_all_forms(){
		return $this->db->get('forms')->result();
	}
}