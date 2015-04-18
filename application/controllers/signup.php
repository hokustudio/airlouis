<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

  function __construct()
  {
      parent::__construct();
  }

	public function index() {

		if($this->session->userdata('logged_in')) {
      redirect('home', 'refresh');
    }
    else {
      //If no session, redirect to login page
      $this->load->view('headerfooter/header_view');
      $this->load->view('register/register_view');
      $this->load->view('headerfooter/footer_view');
    }
  }
}
