<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data = array();
		$data = array(
			'title' => "Connect . Refine . Perpetual",
			'description' => "A professional web-based design firm. We are ready to bring your brands to new heights. Online purchase conveniently available.",
			);

		if ($q = $this->data_model->get_slides_records()) {
			$data["records"] = $q;
		};
		$data["path"] = "welcome_message.php";
		$this->load->view("includes/template",$data);
	}
}