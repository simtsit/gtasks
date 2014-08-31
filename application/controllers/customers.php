<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {


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
		$data['title'] = 'Customers';
		$data['active'] = 'Customers';


		$info['active_user'] = $this->user->active_user_details($_SESSION['username']);
		$data['preview'] = base_url() . "dist/assets/img/users/" . $info['active_user'][0]['preview']; 
		
		$info['positions']=$this->position->all_positions();

		foreach($info['positions'] as $position){
			if ($info['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}

		$data['first_name'] = $info['active_user'][0]['first_name'];


		$data['customers'] = $this->customer->all_customers();
		$data['projects'] = $this->project->all_projects();

		$taskcount[] = 0;
		$count = 1;

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


		$count=1;
		foreach ($data['customers'] as $customer){	
			
			$data['customer_projects'] = $this->project->get_projects_by_customer_id($customer['id']);
			$task_summary = 0;

			foreach ($data['customer_projects'] as $project) {
				$data['taskcount'][$count] = count($this->task->get_tasks_by_project_id($project['id']));
				$task_summary = $task_summary + $data['taskcount'][$count];
				$count++;
			}
			$data['customer_tasks'][$customer['id']] = $task_summary;
			$task_summary = 0;
		}
		
		$data['tasks'] = $this->task->all_tasks();
		$data['task_types'] = $this->task_type->all_task_types();
		$data['priorities'] = $this->priority->all_priorities();


	$this->load->view('customers', $data);

	}





	public function profile($username=''){
		$data['title'] = 'Customer Profile';
		$data['active'] = 'Customers';


		$info['active_user'] = $this->user->active_user_details($_SESSION['username']);
		$data['preview'] = base_url() . "dist/assets/img/users/" . $info['active_user'][0]['preview']; 
		
		$info['positions']=$this->position->all_positions();

		foreach($info['positions'] as $position){
			if ($info['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}

		$data['first_name'] = $info['active_user'][0]['first_name'];


		$data['customers'] = $this->customer->get_customer_by_id($username);

		foreach($data['customers'] as $customer){
			if($username==$customer['username'])
				$customer_id = $customer['id'];
		}

		$data['projects'] = $this->project->get_projects_by_customer_id($customer_id);

		foreach($data['projects'] as $project){		
			$projectids[]= $project['id'];
		}

		$data['tasks'] = $this->task->get_tasks_by_project_ids($projectids);
		$data['users'] = $this->user->all_user_names();		
		$data['task_types'] = $this->task_type->all_task_types();
		$data['priorities'] = $this->priority->all_priorities();

		$count=1;
		foreach ($data['projects'] as $project) {
			$data['taskcount'][$count] = count($this->task->get_tasks_by_project_id($project['id']));
			$count++;
		}


		$this->load->view('customer_profile', $data);
	}


}

/* End of file customers.php */
/* Location: ./application/controllers/customers.php */