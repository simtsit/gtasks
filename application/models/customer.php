<?php
/* This model is related to customers. */

class Customer extends CI_Model
{

/* This function returns an array with all active customers */
	public function all_customers() {
		$this->db->where(array('active'=>1));
		return $this->db->get('customers')->result_array();
	}

/* This function returns an array with a single customer based on the customer username */
	public function get_customer_by_username($username) {
		$this->db->where(array('active'=>1));
		$this->db->where('username',$username);
		return $this->db->get('customers')->result_array();
	}

/* This function return an array with a single customer based on the customer id */
	public function get_customer_by_id($customerid) {
		$this->db->where(array('active'=>1));
		$this->db->where('id',$customerid);
		return $this->db->get('customers')->result_array();
	}	

}

/* End of file customer.php */
/* Location: ./application/models/customers.php */
