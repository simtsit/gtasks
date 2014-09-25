<?php

/* This model is related to task status */

class Task_Status extends CI_Model
{

/* This function return an array with all active task statuses */
 public function all_task_statuses() {
   $this->db->where(array('active'=>1));
   return $this->db->get('task_statuses')->result_array();
 }

}

/* End of file task_status.php */
/* Location: ./application/models/task_status.php */
