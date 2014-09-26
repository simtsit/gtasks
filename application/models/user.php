<?php

/* This model is related to Users. */

Class User extends CI_Model
{
 
 /* This function is related for authentication. */

 function login($username, $password)
 {
   $this -> db -> select('id, username, password');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', $password);
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();

   }
   else
   {
     return false;
   }
 }


/* This function is related to user verification. */

public function verify_user($username, $password) {
   $query = $this
               ->db
               ->where('username', $username)
               ->where('password', $password)
               ->limit(1)
               ->get('users');

   if ($query->num_rows > 0) {
      return $query->row();
   }

}


/* This function returns an array with the active user (you!). */

public function active_user_details($username){
   $this->db->where(array('active'=>1));
   $this->db->where('email',$username);
   return $this->db->get('users')->result_array();
}


/* This function returns an array with all active users. */

 public function all_users() {   
   $this->db->where(array('active'=>1));
   return $this->db->get('users')->result_array();
 }


/* This function returns an array with all usernames (of active users of course!). */

 public function all_user_names() {
   $this->db->where(array('active'=>1));
   $this->db->select('id, username');
   return $this->db->get('users')->result_array();
 }


/* This function returns an array with a single user, based on user's username. */

 public function get_user($username){
   $this->db->where(array('active'=>1));
   $this->db->where('username',$username);
   return $this->db->get('users')->result_array();
 }
 
 
 /* This function returns an array with a single user, based on user's id. */

 public function get_user_id($username){
   $this->db->select('id');
   $this->db->from('users');
   $this->db->where('users.username',$username);
   return $this->db->get('users')->result_array();
 }

}

/* End of file user.php */
/* Location: ./application/models/user.php */
