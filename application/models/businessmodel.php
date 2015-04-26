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

	function GetMyBusiness($user_id)
	{
		$this->db->select('*');
		$this->db->from('business');
		$this->db->where('business_owner_id', $user_id);

		$query = $this->db->get();

		return $query->result_array();
	}

	function GetBusinessbyName($bname) {
		$this->db->select('*');
		$this->db->from('business');
		$this->db->where('business_name', $bname);

		$query = $this->db->get();

		return $query->result_array();
	}

	function GetBusinessData($tableName)
	{
		$this->db->order_by('business_id', 'desc');
		$query = $this->db->get($tableName);

		return $query->result_array();	
	}
	
	function InsertBusiness($tabelName, $query_params)
	{
		$query = $this->db->insert($tabelName, $query_params);
    }
	
 }
