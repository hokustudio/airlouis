<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {
  
  function __construct()
  {
      parent::__construct();
  }

  function index($username,$email,$code)
  {
      $config = Array(
       'protocol' => 'smtp',
       'smtp_host' => 'ssl://smtp.googlemail.com.',
       'smtp_port' => 465,
       'smtp_user' => 'dwiagungprastya@gmail.com', // change it to yours
       'smtp_pass' => 'rindrasul', // change it to yours
       'mailtype' => 'html'
      );

      $this->load->library('email',$config);

      $this->email->set_newline("\r\n");

      $this->email->from('dwiagungprastya@hotmail.com','Admin'); // change it to yours
      $this->email->to($email);// change it to yours
      $this->email->subject('Confirm activate lockhome');
      
      $message = '<a href="'.base_url().'register/validateemail/'.$email.'/'.$code.'">click here</a>';

      $this->email->message($message);
  }
}