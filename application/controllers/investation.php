<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Investation extends CI_Controller {

    function index()
    {
        if($this->session->userdata('logged_in')) {
        	$this->load->view('headerfooter/header_view');
            $this->load->view('investation/my_investation_view');
        	$this->load->view('headerfooter/footer_view'); 
        }
        else {
            redirect('welcome', 'refresh');
        }       
    }

    function InvestationRequest() {
    	if (isset($_POST)) {
    		$user_id = $this->uri->segment(3);
    		$business_id = $this->uri->segment(4);
    		$query_params = array('user_from' => $user_id,
    								'business_to' => $business_id);
    		
    		$this->load->model('investrequestmodel');
    		$this->investrequestmodel->InsertRequest($query_params);
    	}
    }
}
