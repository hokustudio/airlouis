<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	function index() {
        $user_name = $this->uri->segment(2);
        $this->load->model('usermodel');
        $check = $this->usermodel->CheckUserbyUsername($user_name);

        if($check) {
            $data['datauser'] = $this->usermodel->GetUserbyUsername($user_name);

            $this->load->view('headerfooter/header_view');
            $this->load->view('profile/profile_view.php',$data);
            $this->load->view('headerfooter/footer_view');
        }
    	else {
    		echo "user not exist";
    	}
    	//}
    }

    function MyProfile() {
        $user_name = $this->uri->segment(3);
        $this->load->model('usermodel');
        $check = $this->usermodel->CheckUserbyUsername($user_name);

        if($check) {
            $data['datauser'] = $this->usermodel->GetUserbyUsername($user_name);

            $this->load->view('headerfooter/header_view');
            $this->load->view('profile/profile_view.php',$data);
            $this->load->view('headerfooter/footer_view');
        }
        else {
            echo "user not exist";
        }
    }

    function UpdateUsername($user = null) {
        if ($_POST['username'] != "") {
            
            $query_params = array('user_name' => $_POST['username']);

            $this->load->model('usermodel');
            $users = $this->usermodel->GetUserbyUsername($user);
            
            foreach ($users as $row) {
                $username = $row['user_name'];

                if($username == $_POST['username']) {
                    $this->session->set_userdata('user_name',$_POST['username']);
                    $this->usermodel->UpdateUser($user,$query_params);
                    $data['datauser'] = $this->usermodel->GetUserbyUsername($_POST['username']);
                    $this->load->view('headerfooter/header_view');
                    redirect(base_url().'profile/index/'.$_POST['username'],$data);
                    $this->load->view('headerfooter/footer_view');
                }
                else {
                    
                    $check = $this->usermodel->CheckUserbyUsername($_POST['username']);
                    if($check>0) {
                        echo "username udah ada";
                    }
                    else {
                        $this->session->set_userdata('user_name',$_POST['username']);
                        $this->usermodel->UpdateUser($user,$query_params);
                        $data['datauser'] = $this->usermodel->GetUserbyUsername($_POST['username']);
                        $this->load->view('headerfooter/header_view');
                        redirect(base_url().'profile/myprofile/'.$_POST['username'],$data);
                    }
                }
            }   
        }
        else {
            echo "tidak";
            /*redirect(site_url('profile'));*/
        }
    }

    function UpdatePicture($user = null) {
        
    }

    function UpdateEmail($user = null) {
        if ($_POST['email'] != "") {
            
            $query_params = array('user_email' => $_POST['email']);

            $this->load->model('usermodel');
            $users = $this->usermodel->GetUserbyUsername($user);
            
            foreach ($users as $row) {
                $this->usermodel->UpdateUser($user,$query_params);
                $data['datauser'] = $this->usermodel->GetUserbyUsername($user);
                $this->load->view('headerfooter/header_view');
                redirect(base_url().'profile/index/'.$user,$data);
                $this->load->view('headerfooter/footer_view');
            }   
        }
        else {
            echo "tidak";
            /*redirect(site_url('profile'));*/
        }
    }

    function UpdatePhone($user = null) {
        if ($_POST['phonenumber'] != "") {
            
            $query_params = array('user_phone_number' => $_POST['phonenumber']);

            $this->load->model('usermodel');
            $users = $this->usermodel->GetUserbyUsername($user);
            
            foreach ($users as $row) {
                $this->usermodel->UpdateUser($user,$query_params);
                $data['datauser'] = $this->usermodel->GetUserbyUsername($user);
                $this->load->view('headerfooter/header_view');
                redirect(base_url().'profile/index/'.$user,$data);
                $this->load->view('headerfooter/footer_view');
            }   
        }
        else {
            echo "tidak";
            /*redirect(site_url('profile'));*/
        }
    }
}

