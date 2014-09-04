<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

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
		$data['title'] = 'Users list';
		$data['active'] = 'Users';

		$info['active_user'] = $this->user->active_user_details($_SESSION['username']);
		$data['preview'] = base_url() . "dist/assets/img/users/" . $info['active_user'][0]['preview']; 
		
		$info['positions']=$this->position->all_positions();

		foreach($info['positions'] as $position){
			if ($info['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}

		$data['first_name'] = $info['active_user'][0]['first_name'];


		$data['positions'] = $this->position->all_positions();
		$data['users'] = $this->user->all_users();
		$this->load->view('users', $data);
	}


	public function profile($username=''){
		

		$data['target_user']= $username;
		$data['title'] = $username . " user's profile";
		$data['active'] = 'Users';

		$info['active_user'] = $this->user->active_user_details($_SESSION['username']);
		$data['preview'] = base_url() . "dist/assets/img/users/" . $info['active_user'][0]['preview']; 
		
		$info['positions']=$this->position->all_positions();
		$info['target_user'] = $this->user->get_user_details($username);

		foreach($info['positions'] as $position){
			if ($info['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}

		$data['first_name'] = $info['active_user'][0]['first_name'];

		$data['users'] = $this->user->get_user($username);

		$data['tasks_for'] = $this->task->get_tasks_set_for($data['users'][0]['id']);
		$data['tasks_from'] = $this->task->get_tasks_set_from($data['users'][0]['id']);
		
		$data['positions'] = $this->position->all_positions();

		$data['priorities'] = $this->priority->all_priorities();

		$data['usernames'] = $this->user->all_users();		
		$data['task_types'] = $this->task_type->all_task_types();
		$data['projects'] = $this->project->all_projects();
		$data['task_statuses'] = $this->task_status->all_task_statuses();

		
		$this->load->view('user_profile', $data);
	}

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */