<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	function index()
	{
		$data["path"] = "about.php";
		$this->load->view("includes/template",$data);
	}
	function methods()
	{
		$data["path"] = "methods.php";
		$this->load->view("includes/template",$data);
	}

}