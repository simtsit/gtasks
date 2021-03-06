<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* This Controller is related to Projects. */

class Projects extends CI_Controller {

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
		$data['title'] = 'Projects';
		$data['active'] = 'Projects';

		$data['active_user'] = $this->user->active_user_details($_SESSION['username']);
		$data['preview'] = base_url() . "dist/assets/img/users/" . $data['active_user'][0]['preview']; 
		
		$info['positions']=$this->position->all_positions();

		foreach($info['positions'] as $position){
			if ($data['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}

		$data['first_name'] = $data['active_user'][0]['first_name'];
		
		$data['customers'] = $this->customer->all_customers();
		$data['projects'] = $this->project->all_projects();

		$count=0;
		foreach ($data['customers'] as $customer){
			$projectcount=0;
			foreach($data['projects'] as $project){
				
				if ($project['customer']==$customer['id']){
                    $projectcount++;
                }
                $count++;
			}

			$data['projectcount'][$customer['id']] = $projectcount;
		}

		$this->load->view('projects', $data);
	}

/* This function loads the project profile page based on project codename. */

	public function project_info($codename=''){
		$data['title'] = 'Projects';
		$data['active'] = 'Projects';
		$data['codename'] = $codename;

		$data['active_user'] = $this->user->active_user_details($_SESSION['username']);
		$data['preview'] = base_url() . "dist/assets/img/users/" . $data['active_user'][0]['preview']; 
		
		$info['positions']=$this->position->all_positions();

		foreach($info['positions'] as $position){
			if ($data['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}

		$data['first_name'] = $data['active_user'][0]['first_name'];
		
		$data['projects'] = $this->project->get_project_by_project_codename($codename);
		$data['customers'] = $this->customer->get_customer_by_id($data['projects'][0]['customer']);

		$count=0;
		foreach ($data['customers'] as $customer){
			$projectcount=0;
			foreach($data['projects'] as $project){
				
				if ($project['customer']==$customer['id']){
                    $projectcount++;
                }
                $count++;
			}

			$data['projectcount'][$customer['id']] = $projectcount;
		}

		foreach($data['projects'] as $project) {
			if($project['codename']==$codename)
				$projectid=$project['id'];
		}

		$data['priorities']=$this->priority->all_priorities();
		$data['tasks'] = $this->task->get_tasks_by_project_id($projectid);
		$data['task_types'] = $this->task_type->all_task_types();
		$data['users'] = $this->user->all_users();
		$data['task_statuses'] = $this->task_status->all_task_statuses();


		$this->load->view('project_profile', $data);
	}

}

/* End of file projects.php */
/* Location: ./application/controllers/projects.php */
