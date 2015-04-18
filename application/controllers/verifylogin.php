<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {
    
    public function UserLogin() {
        
        if (!empty($_POST)) {
            $query_params = array(
            'user_name' => $_POST['username']
            );

            $this->load->model('usermodel');
            $check = $this->usermodel->CheckUserpass('users',$query_params);
            $validated_info = false;
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
                $response["success"] = 1;
                $response["message"] = "Login successful!";
                json_encode($response);
                redirect(site_url('home'));
            }

            else {
                $this->session->set_flashdata('notification', 'Warning: invalid username or password');
                $response["success"] = 0;
                $response["message"] = "Your username or password is invalid!";
                json_encode($response);
                redirect(site_url('welcome'));
            }
        }
        else {
            redirect(site_url('welcome'));
        }      
    }
}