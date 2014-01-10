<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

   function index()
   {
      $data["path"] = "contact.php";
      $this->load->view("includes/template",$data);
   }

   function email()
   {      
      $this->load->library('form_validation');
      
      if ($this->form_validation->run() == FALSE)
      {
         $data["path"] = "contact.php";
         $this->load->view("includes/template",$data);
      }
      else
      {
         $name = $this->input->post('name');
         $email = $this->input->post('emailaddress');
         $email_title = $this->input->post('title');
         $email_msg = $this->input->post('message');

         $this->load->library('email');
         $this->email->set_newline("\r\n");

         $this->email->from('tlyon_90@hotmail.com');
         $this->email->to('clcy.chris@gmail.com');
         $this->email->subject('test');
         $this->email->message('test');

         if ($this->email->send()) {

            $data["path"] = "success.php";
            $this->load->view("includes/template",$data);

         }else{
            show_error($this->email->print_debugger());
         }
      }
   }
}
?>