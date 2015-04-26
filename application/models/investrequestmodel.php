<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Investrequestmodel extends CI_Model {
	function InsertRequest($query_params) {
		$query = $this->db->insert('investrequest', $query_params);
	}

	function GetRequest($business_id) {
		$this->db->select('*');
		$this->db->from('investrequest');
		$this->db->where('business_to',$business_id);
		$query = $this->db->get();

		return $query->result_array();
	}
}