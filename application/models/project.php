<?php
class Project extends CI_Model
{

	public function all_projects() {
		return $this->db->get('projects')->result_array();
	}


	// public function all_project_owners() {
	// 	$this->db->select('customer');
	// 	return $this->db->get('projects')->result_array();
	// }


	public function get_projects_by_customer_id($customer) {
		$this->db->where('customer', $customer);
		return $this->db->get('projects')->result_array();
	}
}