<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

  function index() {

   $data = array(
      'title' => "Products",
      'description' => "We provide a myriad of quality services, have a look here!",
      'path' => "order.php",
      'records' => $this->data_model->get_allproducts(),
      );

   $this->load->view("includes/template",$data);
}

function result() {

   $product = $this->data_model->get_product();

   $data = array(
      'title' => "Products | ".$product[0]->title,
      'description' => $product[0]->desc,
      'path' => "step1.php",
      'records' => $product,
      'category' => $this->data_model->get_similiar(),
      );

   $this->load->view("includes/template",$data);
}

function project(){

   $data = array(
      'title' => "Products | Details",
      'description' => "We'd like to learn more about you!",
      'path' => "order/project.php",
      'records' => $this->data_model->get_all_forms()
      );

   $this->load->view("includes/template",$data);   
}

function success()
{   
   $data = array(
      'title' => "Products",
      'description' => "Advertising has always been a must to promote every business and product, and this is what LX2 excels in. We create memorables and recognizable identities for our clients, to connect their business or brands to the public. ",
      'path' => "success.php",
      'records' => $this->data_model->get_allproducts(),
      );

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