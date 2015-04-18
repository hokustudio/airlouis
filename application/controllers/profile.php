<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function index($user_name = null)
	{
    	//if(isset($_GET['username'])) {
    	//	$username = mysql_real_escape_string($_GET['username']);
    	//	$user_name = $_GET['username'];
        //echo $id;
        $this->load->model('usermodel');
        $check = $this->usermodel->CheckUser($user_name);
        echo $user_name;
        echo "<br/>";
        echo $check;
        if($check) {
            $data['datauser'] = $this->usermodel->GetUser($user_name);
            $this->load->view('profile/profile_view.php',$data);
        }
    	else {
    		echo "user not exist";
    	}
    	//}
    }
}

