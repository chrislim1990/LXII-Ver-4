<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portfolio extends CI_Controller {

	function index()
	{
		$data = array(
			'title' => "Portfolio",
			'description' => "At LX2, We create value and make a difference.",
			'path' => "portfolio.php",
			'records' => $this->data_model->get_all_projects()
			);

		$this->load->view("includes/template",$data);
	}


	function lookup()
	{
		$project = $this->data_model->get_project();

		$data = array(
			'project' => $project,
			'other_projects' => $this->data_model->get_all_other_projects(),
			'title' => "Portfolio | ".$project[0]->title,
			'description' => $project[0]->desc,
			'path' => "lookup.php",
			);

		$this->load->view("includes/template",$data);
	}

}