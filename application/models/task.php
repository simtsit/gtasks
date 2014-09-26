<?php

/* This model is related to Tasks. */

class Task extends CI_Model
{


/* This function returns an array with all active tasks. */

 public function all_tasks() {
   $this->db->where(array('active'=>1));
   return $this->db->get('tasks')->result_array();
 }


/* This function returns an array with a single task based on task id. */

  public function get_task_by_id($taskid){
    $this->db->where(array('active'=>1));
    $this->db->where('id',$taskid);
    return $this->db->get('tasks')->result_array();
  }


/* This function returns an array with all tasks that their project is in array $projectids. */

  public function get_tasks_by_project_ids($projectids) {
    $this->db->where(array('active'=>1));
    $this->db->where_in('project',$projectids);
    return $this->db->get('tasks')->result_array();
  }


/* This function returns an array with all tasks of a project, based on project id. */

  public function get_tasks_by_project_id($projectid) {
    $this->db->where(array('active'=>1));
    $this->db->where('project',$projectid);
    return $this->db->get('tasks')->result_array();
  }


/* This function returns an array with all tasks set for a user, based on user id. */

  public function get_tasks_set_for($userid){
   $this->db->where(array('active'=>1));
   $this->db->where('setfor',$userid);
   return $this->db->get('tasks')->result_array();
  }


/* This function returns an array with all tasks set by a user, based on user id. */

 public function get_tasks_set_from($userid){
  $this->db->where(array('active'=>1));
  $this->db->where('setfrom',$userid);
  return $this->db->get('tasks')->result_array();
 }



/* This function adds a task in the database. */

public function insert_task($taskinfo) {

    $this->load->database(); 

    $taskdetails = array(
      
           'setfrom' => $taskinfo['setfrom'],
           'setfor' => $taskinfo['setfor'],
           'type' => $taskinfo['task_type'],
           'project' => $taskinfo['project'],
           'priority' => $taskinfo['priority'],
           'description'=> $taskinfo['description'],
           'status' => 1,
           'active'=> 1
        );

     $this->db->insert('tasks',$taskdetails);
     
    }

}

/* End of file task.php */
/* Location: ./application/models/task.php */
