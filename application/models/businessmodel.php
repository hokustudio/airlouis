<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Businessmodel extends CI_Model {
	/*public function getBusiness()
	{
		$query = $this->db->get('business');

		if(!$query){
			$response["success"] = 0;
	        $response["message"] = "Database Error1. Please Try Again!";
	        die(json_encode($response));
		}

    	return $query->result_array();
	}*/

	public function GetMyBusiness($user_id,$tableName)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where('business_owner_id', $user_id);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function GetBusinessData($tableName)
	{
		$query = $this->db->get($tableName);

		return $query->result_array();	
	}
	
	public function InsertBusiness($tabelName, $query_params)
	{
		$query = $this->db->insert($tabelName, $query_params);
		if(!$query){
			$response["success"] = 0;
	        $response["message"] = "Database Error2. Please Try Again!";
	        die(json_encode($response));
		}

    }
	
 }
