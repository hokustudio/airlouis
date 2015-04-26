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

	function GetBusinessUserArraybyBusinessid($businessid) {
		$this->db->select('business_user_array');
		$this->db->from('business');
		$this->db->where('business_id',$businessid);
		$query = $this->db->get();

		//$query = "SELECT `business_user_array` FROM `business` WHERE `business_id`= $businessid";
		//$query = $this->db->get();
		return $query->result_array();
	}

	function GetUserInvestationArraybyUserid($myuserid) {
		$this->db->select('user_investation_array');
		$this->db->from('users');
		$this->db->where('user_id',$myuserid);
		$query = $this->db->get();

		return $query->result_array();
	}

	function UpdateNewBusinessUserArraybyBusninessid($businessid,$user_id_from) {
		
		$query = "UPDATE `business` SET `business_user_array` = CONCAT(`business_user_array`, ".$user_id_from.") WHERE `business_id`= ".$businessid;
		$result = $this->db->query($query);
		return $result;
	}

	function UpdateNewUserInvestationbyUserid($userid,$business_id_to) {
		
		$query = "UPDATE `users` SET `user_investation_array` = CONCAT(`user_investation_array`, ".$business_id_to.") WHERE `user_id`= ".$userid;	
		$result = $this->db->query($query);
		return $result;
	}

	function UpdateBusinessUserArraybyBusninessid($businessid,$user_id_from) {
		
		$query = 'UPDATE `business` SET `business_user_array` = CONCAT_WS("," ,`business_user_array`, ';
		$query .= $user_id_from;
		$query .= ') WHERE `business_id`= '.$businessid;
		$result = $this->db->query($query);
		return $result;
	}

	function UpdateUserInvestationbyUserid($userid,$business_id_to) {
		
		$query = 'UPDATE `users` SET `user_investation_array` = CONCAT_WS("," ,`user_investation_array`, ';
		$query .= $business_id_to;
		$query .= ') WHERE `user_id`= '.$userid;	
		$result = $this->db->query($query);;

		return $result;
	}

	function DeleteRequest($userid,$businessid)
	{
		$this->db->where('user_from', $userid)->where('business_to', $businessid);
		$result = $this->db->delete('investrequest');
	
		return $result;
	}
}