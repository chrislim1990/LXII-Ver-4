<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portfolio extends CI_Controller {

	function index()
	{
		$data = array();

		if ($q = $this->data_model->get_records()) {
			$data["records"] = $q;
		}
		$data["path"] = "portfolio.php";
		$this->load->view("includes/template",$data);
	}


	function lookup()
	{
		$data = array();

		if ($q = $this->data_model->get_products()) {
			$data["records"] = $q;
		}
		$data["path"] = "lookup.php";
		$this->load->view("includes/template",$data);
	}

}