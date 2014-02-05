<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

   function index()
   {
      $data["path"] = "contact.php";
      $this->load->view("includes/template",$data);
   }

   function sent()
   {    
      $data["path"] = "sent.php";
      $this->load->view("includes/template",$data);
   }
}
?>