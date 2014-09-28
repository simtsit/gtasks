<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* This Controller is related to Tasks. */

class Tasks extends CI_Controller {

/** 
*   This fucntion check if user is loged in.
*  If not, it redirects user to login page.
*
*/
	public function __construct ()
	{
		session_start();
		parent::__construct();

		if (!isset($_SESSION['username']))
		{
			redirect('login');
		}
	}


	/**
	 * Index Page for this controller.
	 *
	 */
	public function index(){
		$data['title'] = 'Task list';
		$data['active'] = 'Tasks';

		$data['active_user'] = $this->user->active_user_details($_SESSION['username']);
		
		$data['preview'] = base_url() . "dist/assets/img/users/" . $data['active_user'][0]['preview']; 
		
		$info['positions']=$this->position->all_positions();

		foreach($info['positions'] as $position){
			if ($data['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}

		$data['first_name'] = $data['active_user'][0]['first_name'];
		$data['tasks'] = $this->task->all_tasks();
		$data['priorities'] = $this->priority->all_priorities();
		$data['users'] = $this->user->all_user_names();
		$data['task_types'] = $this->task_type->all_task_types();
		$data['projects'] = $this->project->all_projects();
		$data['task_statuses'] = $this->task_status->all_task_statuses();
		
		$this->load->view('tasks', $data);
	}

/* This Function loads all tasks for the Active User. */

	public function mytasks($username=''){
		
		$data['title'] = $username . "'s Tasks";
		$data['active']='Tasks';

		$data['active_user'] = $this->user->active_user_details($_SESSION['username']);
			
		$data['first_name'] = $data['active_user'][0]['first_name'];
		$data['preview'] = base_url() . "dist/assets/img/users/" . $data['active_user'][0]['preview']; 

		$info['positions']=$this->position->all_positions();

		foreach($info['positions'] as $position){
			if ($data['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}

		$info['target_user'] = $this->user->get_user($username);
		
		$data['tasks_for'] = $this->task->get_tasks_set_for($info['target_user'][0]['id']);
		$data['tasks_from'] = $this->task->get_tasks_set_from($info['target_user'][0]['id']);
		
		$data['priorities'] = $this->priority->all_priorities();

		$data['projects'] = $this->project->all_projects();
		$data['users'] = $this->user->all_user_names();
		$data['task_types'] = $this->task_type->all_task_types();
		$data['task_statuses'] = $this->task_status->all_task_statuses();
		
		$this->load->view('user_tasks', $data);
	
	}


/* This function creates a new task. */

	public function create(){
		$data['title'] = 'Create Task';
		$data['active'] = 'Tasks';

		$data['active_user'] = $this->user->active_user_details($_SESSION['username']);
		$data['preview'] = base_url() . "dist/assets/img/users/" . $data['active_user'][0]['preview']; 
		
		$info['positions']=$this->position->all_positions();

		foreach($info['positions'] as $position){
			if ($data['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}

		$data['first_name'] = $data['active_user'][0]['first_name'];		
		$data['priorities'] = $this->priority->all_priorities();
		$data['users'] = $this->user->all_user_names();
		$data['task_types'] = $this->task_type->all_task_types();
		$data['projects'] = $this->project->all_projects();
		$data['task_statuses'] = $this->task_status->all_task_statuses();

		$this->load->view('add_task_form', $data);
	}


/* This Function adds the new task to database. */

	public function add(){

		$data['title'] = 'Task added';
		$data['active'] = 'Tasks';

		$data['active_user'] = $this->user->active_user_details($_SESSION['username']);
		$data['preview'] = base_url() . "dist/assets/img/users/" . $data['active_user'][0]['preview']; 
		
		$info['positions']=$this->position->all_positions();

		foreach($info['positions'] as $position){
			if ($data['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}

		$data['first_name'] = $data['active_user'][0]['first_name'];

		$data['tasks'] = $this->task->all_tasks();
		$data['task_types'] = $this->task_type->all_task_types();
		$data['users'] = $this->user->all_user_names();	
		$data['priorities'] = $this->priority->all_priorities();
		$data['projects'] = $this->project->all_projects();


			$taskinfo['setfrom'] = $data['active_user'][0]['id'];
			$taskinfo['setfor'] = $this->input->post("setfor");
			$taskinfo['project'] = $this->input->post("project");
			$taskinfo['priority'] = $this->input->post('priority');
			$taskinfo['description'] = $this->input->post("description");
			$taskinfo['task_type'] = $this->input->post("task_type");


		$data['task_statuses'] = $this->task_status->all_task_statuses();
		
		$this->task->insert_task($taskinfo);

		$this->load->view('tasks', $data);

	}


	
/* This Function creates a task for a project, based on project codename. */	
	
public function create_task_for_project($codename=''){
		$data['title'] = 'Create Task';
		$data['active'] = 'Tasks';

		$data['active_user'] = $this->user->active_user_details($_SESSION['username']);
		$data['preview'] = base_url() . "dist/assets/img/users/" . $data['active_user'][0]['preview']; 
		
		$info['positions']=$this->position->all_positions();

		foreach($info['positions'] as $position){
			if ($data['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}

		$data['first_name'] = $data['active_user'][0]['first_name'];		
		$data['priorities'] = $this->priority->all_priorities();
		$data['users'] = $this->user->all_user_names();
		$data['task_types'] = $this->task_type->all_task_types();
		$data['projects'] = $this->project->all_projects();
		$data['task_statuses'] = $this->task_status->all_task_statuses();


		foreach($data['projects'] as $project){
			if($project['codename']==$codename){
				$data['project_id']=$project['id'];
				$data['project_name']=$project['name'];
				$data['codename']=$project['codename'];
			}
		}

		$this->load->view('add_task_for_project_form', $data);
	}

/* This Function is related to adding task to a project based on the project codename. */

	public function add_to($codename=''){

		$data['title'] = 'Task added';
		$data['active'] = 'Tasks';

		$data['codename']=$codename;

		$data['active_user'] = $this->user->active_user_details($_SESSION['username']);
		$data['preview'] = base_url() . "dist/assets/img/users/" . $data['active_user'][0]['preview']; 
		
		$info['positions']=$this->position->all_positions();

		foreach($info['positions'] as $position){
			if ($data['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}

		$data['first_name'] = $data['active_user'][0]['first_name'];

		$data['tasks'] = $this->task->all_tasks();
		$data['task_types'] = $this->task_type->all_task_types();
		$data['users'] = $this->user->all_user_names();	
		$data['priorities'] = $this->priority->all_priorities();
		$data['projects'] = $this->project->all_projects();


		foreach($data['projects'] as $project){
			if($project['codename']==$codename){
				$data['project_id']=$project['id'];
				$data['project_name']=$project['name'];
			}
		}

			$taskinfo['setfrom'] = $data['active_user'][0]['id'];
			$taskinfo['setfor'] = $this->input->post("setfor");
			$taskinfo['project'] = $data['project_id'];
			$taskinfo['priority'] = $this->input->post('priority');
			$taskinfo['description'] = $this->input->post("description");
			$taskinfo['task_type'] = $this->input->post("task_type");


		$data['task_statuses'] = $this->task_status->all_task_statuses();
		
		$this->task->insert_task($taskinfo);

		$this->load->view('tasks', $data);

	}
	
	
/* This Function shows a task based on the task id. */	
	
	public function view($taskid=''){
		
		$data['title'] = "View Task";
		$data['active']='Tasks';

		$data['active_user'] = $this->user->active_user_details($_SESSION['username']);
			
		$data['first_name'] = $data['active_user'][0]['first_name'];
		$data['preview'] = base_url() . "dist/assets/img/users/" . $data['active_user'][0]['preview']; 

		$info['positions']=$this->position->all_positions();

		foreach($info['positions'] as $position){
			if ($data['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}
		
		$data['priorities'] = $this->priority->all_priorities();

		$data['tasks'] = $this->task->get_task_by_id($taskid);

		$data['projects'] = $this->project->all_projects();
		$data['users'] = $this->user->all_user_names();
		$data['task_types'] = $this->task_type->all_task_types();
		$data['task_statuses'] = $this->task_status->all_task_statuses();
		
		$this->load->view('display_task', $data);
	}	




	public function edit(){
		// Code coming soon...
	}

}

/* End of file tasks.php */
/* Location: ./application/controllers/tasks.php */
