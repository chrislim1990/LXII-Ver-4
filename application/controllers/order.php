<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

   function project(){
      if ($q = $this->data_model->get_all_forms()) {
         $data["records"] = $q;
      };
      $data["path"] = "order/project.php";
      $this->load->view("includes/template",$data);   
   }

   function index()
   {
      $data = array();

      if ($q = $this->data_model->get_allproducts()) {
         $data["records"] = $q;
      };

      $data["path"] = "order.php";
      $this->load->view("includes/template",$data);
   }

   function success()
   {
      $data = array();

      if ($q = $this->data_model->get_allproducts()) {
         $data["records"] = $q;
      };

      $data["path"] = "success.php";
      $this->load->view("includes/template",$data);
   }


   function result()
   {
      $data = array();

      if ($q = $this->data_model->get_products2()) {
         $data["records"] = $q;
      };

      if ($z = $this->data_model->get_similiar()) {
         $data["category"] = $z;
      };
      $data["path"] = "step1.php";
      $this->load->view("includes/template",$data);
   }
   function details()
   {
      $data = array();

      if ($q = $this->data_model->get_products3()) {
         $data["records"] = $q;
      }
      $data["path"] = "step3.php";
      $this->load->view("includes/template",$data);
   }

   function brief()
   {
      $data = array();

      if ($q = $this->data_model->get_products3()) {
         $data["records"] = $q;
      }
      $data["path"] = "step2.php";
      $this->load->view("includes/template",$data);
   }

   function confirm()
   {
      $data = array();

      if ($q = $this->data_model->get_products3()) {
         $data["records"] = $q;
      }
      $data["path"] = "confirm.php";
      $this->load->view("includes/template",$data);
   }
   function search()
   {
      $data = array();
      $data["path"] = "search.php";
      $this->load->view("includes/template",$data);
   }


   function email()
   {      
      $this->load->library('form_validation');
      
      if ($this->form_validation->run() == FALSE)
      {
         $data["path"] = "order.php";
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

   function orderform()
   {      
      $this->load->library('form_validation');
      
      if ($this->form_validation->run() == FALSE)
      {
         $data["path"] = "order.php";
         $this->load->view("includes/template",$data);
      }
      else
      {
         $field1 = $this->input->post('field1');
         $field2 = $this->input->post('field2');
         $field3 = $this->input->post('field3');
         $field4 = $this->input->post('field4');
         $field5 = $this->input->post('field5');
         $field6 = $this->input->post('field6');
         $field7 = $this->input->post('field7');
         $field8 = $this->input->post('field8');
         $field9 = $this->input->post('field9');
         $field10 = $this->input->post('field10');
         $field11 = $this->input->post('field11');
         $email_title = "LXII Order Form";
         $email_msg = $this->input->post('field12');

         $this->load->library('email');
         $this->email->set_newline("\r\n");

         $this->email->from('tlyon_90@hotmail.com');
         $this->email->to('clcy.chris@gmail.com');
         $this->email->subject('test');
         $this->email->message('test');

         if ($this->email->send()) {

            $data["path"] = "order.php";
            $this->load->view("includes/template",$data);

         }else{
            show_error($this->email->print_debugger());
         }
      }
   }
}
?>