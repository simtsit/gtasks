<?php

/* This model is related to task types */

class Task_type extends CI_Model
{

/* This function returns an array with all active task types */
 public function all_task_types() {
   $this->db->where(array('active'=>1));
   return $this->db->get('task_types')->result_array();
 }

}

/* End of file task_type.php */
/* Location: ./application/models/task_type.php */
