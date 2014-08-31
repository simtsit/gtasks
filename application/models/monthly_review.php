<?php
class Monthly_Review extends CI_Model
{

 public function all_monthly_reviews() {
   // $this->db->select('id, creator, owner, description');
   return $this->db->get('monthly_reviews')->result_array();
 }
 
 public function user_monthly_reviews($user_id) {
  $this->db->where('monthly_reviews.review_employee', $user_id);
  return $this->db->get('monthly_reviews')->result_array();
 }

}