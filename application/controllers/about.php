<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	function index()
	{
		$data = array(
			'title' => "Who We Are",
			'description' => "Advertising has always been a must to promote every business and product, and this is what LX2 excels in. We create memorables and recognizable identities for our clients, to connect their business or brands to the public. ",
			'path' => "about.php",
			'faqs' => $this->data_model->get_faqs()
			);

		$this->load->view("includes/template",$data);
	}
	function society_welfare()
	{
		$data = array(
			'title' => "Society Welfare",
			'description' => "Advertising has always been a must to promote every business and product, and this is what LX2 excels in. We create memorables and recognizable identities for our clients, to connect their business or brands to the public. ",
			'path' => "about.php"
			);

		$data["path"] = "society_welfare.php";
		$this->load->view("includes/template",$data);
	}

}