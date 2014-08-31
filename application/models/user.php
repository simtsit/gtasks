<?php
Class User extends CI_Model
{
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


public function verify_user($username, $password) {
   $query = $this
               ->db
               ->where('username', $username)
               ->where('password', $password)
               ->limit(1)
               ->get('users');

   if ($query->num_rows > 0) {
      // echo'<pre>';
      // print_r($query->row());
      // echo '</pre>';
      return $query->row();
   }

}

public function active_user_details($username){
   $this->db->select('preview, position, first_name');
   $this->db->where('email',$username);
   return $this->db->get('users')->result_array();
}

 public function all_users() {
   $this->db->select('id, username, preview, first_name, last_name, position, email');
   $this->db->where(array('active'=>1));
   return $this->db->get('users')->result_array();
 }

 public function all_user_names() {
   $this->db->select('id, username');
   return $this->db->get('users')->result_array();
 }


 public function get_user($username){
   $this->db->select('id, username, preview, first_name, last_name, position, email, stat1, stat2, stat3, stat4, stat5, stat6');
   $this->db->where('users.username',$username);
   return $this->db->get('users')->result_array();
 }
 

 public function get_user_id($username){
   $this->db->select('id');
   $this->db->from('users');
   $this->db->where('users.username',$username);
   return $this->db->get('users')->result_array();
 }

}


?>