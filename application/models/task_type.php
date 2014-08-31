<?php
class Task_type extends CI_Model
{

 public function all_task_types() {
   // $this->db->select('id, creator, owner, description');
   $this->db->where(array('active'=>1));
   return $this->db->get('task_types')->result_array();
 }

}