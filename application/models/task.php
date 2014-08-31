<?php
class Task extends CI_Model
{

 public function all_tasks() {
   // $this->db->select('id, creator, owner, description');
   $this->db->where(array('active'=>1));
   return $this->db->get('tasks')->result_array();
 }

  //public function get_tasks_by_project_id($project_id) {
  public function get_tasks_by_project_ids($projectids) {
    $this->db->where_in('project',$projectids);
    return $this->db->get('tasks')->result_array();
  }

  public function get_tasks_by_project_id($projectid) {
    $this->db->where('project',$projectid);
    return $this->db->get('tasks')->result_array();
  }


  // public function all_g_tasks() {
  //   $this->db->select('type, priority');
  //   $this->db->where(array('active'=>1));
  //   return $this->db->get('tasks')->result_array();
  // }





  // public function get_tasks_by_customer_id($customerid){
  //   $this->db->where('customer',$customerid);
  //   return $this->db->get('tasks')->result_array(); 
  // }






public function insert_task($taskinfo) {

    $this->load->database(); 

    $taskdetails = array(
           'setfrom' => $taskinfo['setfrom'],
           'setfor' => $taskinfo['setfor'],
           'type' => $taskinfo['task_type'],
           'priority' => $taskinfo['priority'],
           'description'=> $taskinfo['description'],
           'active'=> 1
        );

     $this->db->insert('tasks',$taskdetails);
     
    }


}