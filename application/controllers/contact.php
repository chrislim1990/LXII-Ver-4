<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

   function index()
   {
      $data = array(
         'title' => "Contact Us",
         'description' => "A-6-3A, Casa Idaman, 51100, KL, Malaysia | services@lx2.com.my | (+60)3-62418948",
         'path' => "contact.php",
         );
      $this->load->view("includes/template",$data);
   }

   function sent()
   {    
     $data = array(
      'title' => "Successfully Sent!",
      'description' => "A-6-3A, Casa Idaman, 51100, KL, Malaysia | services@lx2.com.my | (+60)3-62418948",
      'path' => "sent.php",
      );
     $this->load->view("includes/template",$data);
  }
}
?>