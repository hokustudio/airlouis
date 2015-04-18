<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
 	}
	
	public function index()
	{
    $this->load->model('usermodel');
    if($this->session->userdata('logged_in')) {
     	$session_data = $this->session->userdata('logged_in');
    	$data['username'] = $session_data['username'];
      //$datauser =  $this->usermodel->GetUser($session_data['username']); 
      //$data['user'] = $this->usermodel->GetUser($this->session->userdata('user_id'));

      
      
      $data['datauser'] = $this->usermodel->GetUser($this->session->userdata('user_name'));
      //foreach ($datauser as $row) {
      //  echo $row['user_id'];
      //  echo $row['user_name'];
      //  echo $row['user_email'];
      //}
      $this->load->model('businessmodel');
      $data['databusiness'] = $this->businessmodel->GetBusinessData('business');

      $this->load->view('headerfooter/header_view');
      $this->load->view('home/home_view', $data);
      $this->load->view('headerfooter/footer_view');   
   	}
   	else {
     	//If no session, redirect to login page
     	echo "fail";
      //redirect('welcome', 'refresh');
   	}
	}

	public function UserLogout(){
		$this->session->unset_userdata('logged_in');
    $this->session->sess_destroy();
    //session_destroy();
    redirect(site_url('welcome'));
  }
}
