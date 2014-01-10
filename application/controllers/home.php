<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function index()
	{
		$data = array();

		if ($q = $this->data_model->get_records()) {
			$data["records"] = $q;
		}

		$data["path"] = "home.php";
		$this->load->view("includes/template",$data);
	}

}