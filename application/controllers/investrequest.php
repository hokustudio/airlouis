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
        			$datarequest = $this->investrequestmodel->GetRequest($row['business_id']);
        			if(count($datarequest) > 0) {
        				foreach ($datarequest as $roww) {
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

    function ConfirmRequest() {
        $this->load->model('investrequestmodel');
    	$user_id = $this->uri->segment(3);
        $business_id = $this->uri->segment(4);
    	if (isset($_POST['acceptrequest'.$user_id])) {
            
            $get_business_user_array_check = $this->investrequestmodel->GetBusinessUserArraybyBusinessid($business_id);
            $get_business_user_array_row = array_shift($get_business_user_array_check);
            $business_user_array = $get_business_user_array_row['business_user_array'];
            $business_user_array_explode = explode(",", $business_user_array);
            $business_user_array_count = count($business_user_array_explode);

            $this->load->model('investrequestmodel');
            $get_user_investation_array_check = $this->investrequestmodel->GetUserInvestationArraybyUserid($user_id);
            $get_user_investation_array_row = array_shift($get_user_investation_array_check);
            $user_investation_array = $get_user_investation_array_row['user_investation_array'];
            $user_investation_array_explode = explode(",", $user_investation_array);
            $user_investation_array_count = count($user_investation_array_explode);

            if($business_user_array == "") {
                $business_user_array_count = count(NULL);
            }

            if($user_investation_array == "") {
                $user_investation_array_count = count(NULL);
            }

            if($business_user_array_count == NULL) {
                $insert_business_user_query = $this->investrequestmodel->UpdateNewBusinessUserArraybyBusninessid($business_id,$user_id);
            }

            if($user_investation_array_count == NULL) {
                $insert_user_investation_query = $this->investrequestmodel->UpdateNewUserInvestationbyUserid($user_id,$business_id);
            }

            if($business_user_array_count >= 1) {
                $insert_business_user_query = $this->investrequestmodel->UpdateBusinessUserArraybyBusninessid($business_id,$user_id);
            }

            if($user_investation_array_count >= 1) {
                $insert_user_investation_query = $this->investrequestmodel->UpdateUserInvestationbyUserid($user_id,$business_id);
            }

            $delete_request = $this->investrequestmodel->DeleteRequest($user_id,$business_id);

            redirect(site_url('investrequest'), 'refresh');
            //echo $get_user_investation_array;
        }

        if (isset($_POST['declinerequest'.$user_id])) {
            $delete_request = $this->investrequestmodel->DeleteRequest($user_id,$business_id);
            
            redirect(site_url('investrequest'), 'refresh');
        }
    }
}