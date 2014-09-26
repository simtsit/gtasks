<?php

/* This model is related to Task Priorities. */

class Priority extends CI_Model
{
 
 /* This function returns an array with all task priorities. */

 public function all_priorities() {
   return $this->db->get('priorities')->result_array();
 }

}

/* End of file priority.php */
/* Location: ./application/models/priority.php */
