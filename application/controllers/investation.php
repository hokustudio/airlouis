<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Investation extends CI_Controller {

    function index()
    {
        if($this->session->userdata('logged_in')) {
            $this->load->model('usermodel');
            $this->load->model('businessmodel');

            $mydata = $this->usermodel->GetUserbyId($this->session->userdata('user_id'));

            if($mydata != "") {
                foreach ($mydata as $cols) {
                    $myinvest = $cols['user_investation_array'];
                    $data['investdata'] = explode(",", $myinvest);
                }
            }

            if($myinvest == "") {
                $data['investdata'] = 0;
            }
            
        	$this->load->view('headerfooter/header_view');
            $this->load->view('investation/my_investation_view',$data);
        	$this->load->view('headerfooter/footer_view'); 
        }
        else {
            redirect('welcome', 'refresh');
        }       
    }

    
}
