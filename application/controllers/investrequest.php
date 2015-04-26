<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class investrequest extends CI_Controller {
	function index()
    {
        if($this->session->userdata('logged_in')) {
        	$this->load->model('businessmodel');
        	$this->load->model('usermodel');
        	$this->load->model('investrequestmodel');

        	$databusiness = $this->businessmodel->GetMyBusiness($this->session->userdata('user_id'));
        	if(count($databusiness) > 0) {
        		foreach ($databusiness as $row) {
        			echo $row['business_id'];
        			$datarequest = $this->investrequestmodel->GetRequest($row['business_id']);
        			if(count($datarequest) > 0) {
        				foreach ($datarequest as $roww) {
        					echo $roww['user_from'];
        					$data['requestdata'] = $datarequest;
        				}
        			}
        			else {
        				$data['requestdata'] = 1;
        			}
        		}
        	}
        	else {
        		$data['requestdata'] = 0; 
        	}
        	

        	$this->load->view('headerfooter/header_view');
            $this->load->view('investation/investation_request_view', $data);
        	$this->load->view('headerfooter/footer_view'); 
        }
        else {
            redirect('welcome', 'refresh');
        }       
    }

    function Request() {
    	if (isset($_POST)) {
    		$user_id = $this->uri->segment(3);
    		$business_id = $this->uri->segment(4);
    		$query_params = array('user_from' => $user_id,
    								'business_to' => $business_id);
    		
    		$this->load->model('investrequestmodel');
    		$this->investrequestmodel->InsertRequest($query_params);
    	}
    }

    function AcceptRequest() {
    	$user_id = $this->uri->segment(3);
    	if (isset($_POST['acceptrequest'.$user_id])) {
    		echo "dapat";
    	}
    }
}