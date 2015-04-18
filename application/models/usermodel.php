<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usermodel extends CI_Model {

	function __construct()
    {
         parent::__construct();
    }

	public function CheckUsername($tabelName, $query_params)
	{
		$this->db->select(1);
		$this->db->from($tabelName);
		$this->db->where($query_params);
		$query = $this->db->get();

		if(!$query){
			$response["success"] = 0;
	        $response["message"] = "Database Error1. Please Try Again!";
	        die(json_encode($response));
		}

    	return $query->num_rows();
	}

	public function InsertUser($tabelName, $query_params)
	{
		$query = $this->db->insert($tabelName, $query_params);
		if(!$query){
			$response["success"] = 0;
	        $response["message"] = "Database Error2. Please Try Again!";
	        die(json_encode($response));
		}
    }

    public function CheckUserpass($tabelName, $query_params)
    { 
        $this->db->select('user_id, user_name, user_password');
        $this->db->from($tabelName);
        $this->db->where($query_params);
        $query = $this->db->get();

        if(!$query){
        	$response["success"] = 0;
        	$response["message"] = "Database Error3. Please Try Again!";
        	die(json_encode($response));
        }

        return $query->result_array();
    }

	public function GetUser($user_name){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_name', $user_name);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function CheckUser($user_name)
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

	public function UpdateUser($user_id, $data) { 
		$this->db->where('user_id', $user_id);
		$this->db->update('users', $data); 
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
