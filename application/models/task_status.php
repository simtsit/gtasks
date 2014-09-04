<?php
class Task_Status extends CI_Model
{

 public function all_task_statuses() {
   // $this->db->select('id, creator, owner, description');
   $this->db->where(array('active'=>1));
   return $this->db->get('task_statuses')->result_array();
 }

}