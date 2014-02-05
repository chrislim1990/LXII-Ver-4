<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hidden extends CI_Controller {

   function index()
   {
      $data = array();

      $data["path"] = "test.php";
      $this->load->view("includes/template",$data);
   }
}

?>