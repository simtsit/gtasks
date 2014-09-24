<?php
class Priority extends CI_Model
{

 public function all_priorities() {
   // $this->db->where(array('active'=>1));
   return $this->db->get('priorities')->result_array();
 }

}
