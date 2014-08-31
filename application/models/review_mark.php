<?php
class Review_Mark extends CI_Model
{

 public function all_review_marks() {
   return $this->db->get('review_marks')->result_array();
 }

}