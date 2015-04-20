<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usermodel extends CI_Model {

	function __construct()
    {
         parent::__construct();
    }

	function CheckUserbyPassword($query_params)
    { 
        $this->db->select('user_id, user_name, user_password');
        $this->db->from('users');
        $this->db->where($query_params);
        $query = $this->db->get();

        return $query->result_array();
    }

    function CheckUserbyUsername($user_name)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_name',$user_name);
		$query = $this->db->get();

		if($query->num_rows() >0)
		{
			$result = $query->num_rows();
			return $result;
		}
		else
		{
			return '0';
		}
	}

	function GetUserbyUsername($user_name){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_name',$user_name);
		$query = $this->db->get();

		return $query->result_array();
	}

	function InsertUser($query_params)
	{
		$query = $this->db->insert('users', $query_params);
    }

	function GetUser(){
		$this->db->select('*');
		$this->db->from('users');

		$query = $this->db->get();

		return $query->result_array();
	}

	function UpdateUser($user_name,$query_params) { 
		$this->db->where('user_name', $user_name);
		$this->db->update('users', $query_params); 
	}  

	function DeleteUser() { 
		$this->db->where('user_id', $this->uri->segment(3));
		$this->db->delete('users'); 
	}  

	function SendEmail($username,$email,$code)
    {
      $config = Array(
       'protocol' => 'smtp',
       'smtp_host' => 'ssl://smtp.googlemail.com.',
       'smtp_port' => 465,
       'smtp_user' => 'dwiagungprastya@gmail.com', // change it to yours
       'smtp_pass' => 'rindurasul', // change it to yours
       'mailtype' => 'html'
      );

      $this->load->library('email',$config);

      $this->email->set_newline("\r\n");

      $this->email->from('dwiagungprastya@gmail.com','Admin'); // change it to yours
      $this->email->to($email);// change it to yours
      $this->email->subject('Confirm activate lockhome');
      
      $message = '<a href="'.base_url().'register/validateemail/'.$email.'/'.$code.'">click here</a>';

      $this->email->message($message);

      $this->email->send();
    }
 }
