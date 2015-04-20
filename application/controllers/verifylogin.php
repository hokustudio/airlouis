<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {
    
    function UserLogin() {
        
        if (isset($_POST)) {
            $query_params = array(
            'user_name' => $_POST['username']
            );

            $this->load->model('usermodel');
            $check = $this->usermodel->CheckUserbyPassword($query_params);

            $login_ok = false;
            $pass = md5($_POST['password']);    
            foreach ($check as $key) {
                if ($check) {
                    if ($pass === $key['user_password']) 
                    {
                        $login_ok = true;
                    }
                }
            }
     
            if ($login_ok) {
                foreach ($check as $row) {
                    $array_items = array(
                        'user_id' => $row['user_id'],
                        'user_name' => $row['user_name'],
                        'logged_in' => true
                        );
                    $this->session->set_userdata($array_items);
                }

                redirect(site_url('home'));
            }
            else {
                redirect(site_url('login'));
            }
        }
        else {
            redirect(site_url('login'));
        }      
    }
}