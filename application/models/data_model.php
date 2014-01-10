<?php

class Data_model extends CI_Model{

	function get_records(){
		return $this->db->get('portfolio')->result();
	}
	function get_testimonial(){
		return $this->db->get('testimonial')->result();
	}
	function get_allproducts(){
		return $this->db->get('products')->result();
	}
	function get_products(){
		$product_id = $this->uri->segment(2);
		return $this->db->get_where('portfolio', array('url' => $product_id))->result();
	}
	function get_products2(){
		$product_id = $this->uri->segment(2);
		return $this->db->get_where('products', array('id' => $product_id))->result();
	}
	function get_similiar(){
		$product_id = $this->uri->segment(2);
		return $this->db->get_where('products', array('id !=' => $product_id))->result();
	}
	function get_products3(){
		$product_id = $this->uri->segment(3);
		return $this->db->get_where('products', array('id' => $product_id))->result();
	}
	function show_records($num){
		return $this->db->where('url', $this->uri->segment($num))->get('portfolio')->result(); 
	}
	function add_records($data){
		return $this->db->insert('portfolio',$data);
	}
	function update_records($data){
		$this->db->where('id', $data['id']);
		$this->db->update('portfolio',$data);
	}
	function delete_records(){
		return $this->db->where('id', $this->uri->segment(3))->delete('portfolio'); 
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
	function get_slides_records(){
		return $this->db->get('slideshows')->result();
	}
	function get_all_forms(){
		return $this->db->get('forms')->result();
	}
}