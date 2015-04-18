<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	function PostUser() {
	   
       if (isset($_POST)) {
    
            if (empty($_POST['username'])) {
            	
    		}

    	   else if(empty($_POST['email'])) {
        		
    		}

        	else if (empty($_POST['password'])) {
        		
        	}

        	else if (empty($_POST['phonenumber'])) {
        		
        	}

            /*check usename*/
            $query_params = array('user_name' => $_POST['username']);

            $this->load->model('usermodel');
            $check = $this->usermodel->CheckUsername($query_params);
            $code = md5(uniqid(rand()));

            if($check) {
                //$response["success"] = 0;
                $response["message"] = "I'm sorry, this username is already in use";
                //die(json_encode($response));
                redirect(site_url('signup'));
            }
            else {
                date_default_timezone_set("Asia/Bangkok");
                $now = date("Y-m-d H:i:s");
                $query_params = array(
                    'user_name' => $_POST['username'],
                    'user_picture' => base_url()."uploads/default/newuser.png",
                    'user_email' => $_POST['email'],
                    'user_password' => md5($_POST['password']),
                    'user_phone_number' => $_POST['phonenumber'],
                    'user_code' => $code,
                    //'user_identity_number' => $_POST['identitynumber'],
                    //'user_npwp' => $_POST['npwpnumber'],
                    'user_date_created' => $now,
                    'user_activated' => '0'
                );
        	}

            $this->usermodel->InsertUser($query_params);
            $this->usermodel->SendEmail($_POST['username'],$_POST['email'],$code);

            if(!is_dir("uploads/".$_POST['username']."/")){
                mkdir("uploads/".$_POST['username']."/");
            }

            $direct="uploads/".$_POST['username']."/";
            if(!file_exists("uploads/".$_POST['username']."/")){
                $increment='';
                while(file_exists("uploads/".$_POST['username'].$increment."/")) {
                    $increment++;
                }
                mkdir("uploads/".$_POST['username'].$increment."/");
                $direct="uploads/".$_POST['username'].$increment;
            }
    
            $response["success"] = 1;
            $response["message"] = "Username Successfully Added!";
            echo json_encode($response);

            /*control after register*/
            redirect(site_url('welcome')); 
        } 
        else {
            echo "access denied"; 
        }
    }

    function ValidateEmail($email,$code)
    {
        
    }
}