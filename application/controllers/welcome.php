<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in')) {
			redirect('home', 'refresh');
		}
		else {
			//$this->load->view('welcome/login_view');
			//$this->load->view('welcome/register_view');
			$this->load->view('headerfooter/header_view');
			$this->load->view('welcome/welcome_view');
			$this->load->view('headerfooter/footer_view');
		}		
	}
}
