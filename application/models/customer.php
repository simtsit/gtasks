<?php
class Customer extends CI_Model
{

	public function all_customers() {
		$this->db->where(array('active'=>1));
		return $this->db->get('customers')->result_array();
	}

	public function get_customer_by_username($username) {
		$this->db->where(array('active'=>1));
		$this->db->where('username',$username);
		return $this->db->get('customers')->result_array();
	}

	public function get_customer_by_id($customerid) {
		$this->db->where(array('active'=>1));
		$this->db->where('id',$customerid);
		return $this->db->get('customers')->result_array();
	}	

}