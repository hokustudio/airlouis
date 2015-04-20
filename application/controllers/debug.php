<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Debug extends CI_Controller {
	function index() {
        
            
            $this->load->view('debug.php');
        
    }
}