<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mission extends CI_Controller {

	function index()
	{
		$data["path"] = "mission.php";
		$this->load->view("includes/template",$data);
	}

}