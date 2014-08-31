<?php
class Position extends CI_Model
{

	public function all_positions() {
		$this->db->where(array('active'=>1));
		return $this->db->get('positions')->result_array();
	}


}