<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

  function __construct()
  {
      parent::__construct();
  }

	public function index() {

		if($this->session->userdata('logged_in')) {
      //$session_data = $this->session->userdata('logged_in');
      //$data['username'] = $session_data['username'];
      //$this->load->view('home\home_view', $data);
      redirect('home', 'refresh');
    }
    else {
      //If no session, redirect to login page
      
      redirect('welcome', 'refresh');
    }
  }
}
