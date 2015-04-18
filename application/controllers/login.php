<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

  function __construct()
  {
      parent::__construct();
  }

	function index() {

		if($this->session->userdata('logged_in')) {
      redirect('home', 'refresh');
    }
    else {
      $this->load->view('headerfooter/header_view');
      $this->load->view('login/login_view');
      $this->load->view('headerfooter/footer_view');
    }
  }
}
