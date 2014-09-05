<?php
class Project extends CI_Model
{

	public function all_projects() {
		$this->db->where(array('active'=>1));
		return $this->db->get('projects')->result_array();
	}

	public function get_projects_by_customer_id($customer) {
		$this->db->where(array('active'=>1));
		$this->db->where('customer', $customer);
		return $this->db->get('projects')->result_array();
	}

	public function get_project_by_project_codename($projectcodename) {
		$this->db->where(array('active'=>1));
		$this->db->where('codename', $projectcodename);
	return $this->db->get('projects')->result_array();
	}
}