<?php

/* This model is related to User Positions. */

class Position extends CI_Model
{

/* This function returns an array with all active user positions. */

	public function all_positions() {
		$this->db->where(array('active'=>1));
		return $this->db->get('positions')->result_array();
	}
	
}

/* End of file position.php */
/* Location: ./application/models/position.php */
