<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

				$info['active_user'] = $this->user->active_user_details($_SESSION['username']);
		$data['preview'] = base_url() . "dist/assets/img/users/" . $info['active_user'][0]['preview']; 
		
		$info['positions']=$this->position->all_positions();

		foreach($info['positions'] as $position){
			if ($info['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}

		$data['first_name'] = $info['active_user'][0]['first_name'];
		$data['tasks'] = $this->task->all_tasks();
		$data['priorities'] = $this->priority->all_priorities();
		$data['users'] = $this->user->all_user_names();
		$data['task_types'] = $this->task_type->all_task_types();
		$data['projects'] = $this->project->all_projects();
		$data['task_statuses'] = $this->task_statuses->all_task_statuses();
		
		$this->load->view('tasks', $data);
	}

public function mytasks(){
	//Code coming soon....
}



	public function create(){
		$data['title'] = 'Create Task';
		$data['active'] = 'Tasks';

		$info['active_user'] = $this->user->active_user_details($_SESSION['username']);
		$data['preview'] = base_url() . "dist/assets/img/users/" . $info['active_user'][0]['preview']; 
		
		$info['positions']=$this->position->all_positions();

		foreach($info['positions'] as $position){
			if ($info['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}

		$data['first_name'] = $info['active_user'][0]['first_name'];		
		$data['priorities'] = $this->priority->all_priorities();
		$data['users'] = $this->user->all_user_names();
		$data['task_types'] = $this->task_type->all_task_types();
		$this->load->view('add_task_form', $data);
	}



	public function add(){

		$data['title'] = 'Task added';
		$data['active'] = 'Tasks';

		$info['active_user'] = $this->user->active_user_details($_SESSION['username']);
		$data['preview'] = base_url() . "dist/assets/img/users/" . $info['active_user'][0]['preview']; 
		
		$info['positions']=$this->position->all_positions();

		foreach($info['positions'] as $position){
			if ($info['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}

		$data['first_name'] = $info['active_user'][0]['first_name'];

		$data['tasks'] = $this->task->all_tasks();
		$data['task_types'] = $this->task_type->all_task_types();
		$data['users'] = $this->user->all_user_names();	
		$data['priorities'] = $this->priority->all_priorities();

		$taskinfo['setfrom'] = $this->input->post("setfrom");
		$taskinfo['setfor'] = $this->input->post("setfor");
		$taskinfo['priority'] = $this->input->post('priority');
		$taskinfo['description'] = $this->input->post("description");
		$taskinfo['task_type'] = $this->input->post("task_type");


		$this->task->insert_task($taskinfo);
		$this->load->view('tasks', $data);

	}
	
	
	public function edit(){
		// Code coming soon...
	}

}

/* End of file tasks.php */
/* Location: ./application/controllers/tasks.php */
