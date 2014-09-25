<?php

/* This model is related to projects */

class Project extends CI_Model
{

/* This function returns an array with all active projecgts */
	public function all_projects() {
		$this->db->where(array('active'=>1));
		return $this->db->get('projects')->result_array();
	}

/* This function returns an array with all active projects of a specific customer, based on the customerid */
	public function get_projects_by_customer_id($customerid) {
		$this->db->where(array('active'=>1));
		$this->db->where('customer', $customerid);
		return $this->db->get('projects')->result_array();
	}

/* This function returns an array with a single active project, based on the project codename */
	public function get_project_by_project_codename($codename) {
		$this->db->where(array('active'=>1));
		$this->db->where('codename', $codename);
	return $this->db->get('projects')->result_array();
	}
}

/* End of file project.php */
/* Location: ./application/models/project.php */
