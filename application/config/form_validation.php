<?php

$config = array(
   'member/signup' => array(
    array(
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'required'
        ),
    array(
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required'
        ),
    array(
        'field' => 'passconf',
        'label' => 'Password Confirmation',
        'rules' => 'required'
        ),
    array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required'
        )
    ),
   'contact/email' => array(
    array(
        'field' => 'emailaddress',
        'label' => 'Email Address',
        'rules' => 'required|valid_email'
        ),
    array(
        'field' => 'name',
        'label' => 'Name',
        'rules' => 'required|alpha'
        ),
    array(
        'field' => 'title',
        'label' => 'Title',
        'rules' => 'required'
        ),
    array(
        'field' => 'message',
        'label' => 'Message Body',
        'rules' => 'required'
        )
    )                          
   );