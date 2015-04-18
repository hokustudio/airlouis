<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Investation extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('logged_in')) {
            $this->load->view('investation/my_investation_view');
        }
        else {
            redirect('welcome', 'refresh');
        }       
    }
}
