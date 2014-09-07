<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**  
* This controller is related to homepage (Dashboard).
*
*/

class Dashboard extends CI_Controller {


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
	public function index()
	{


		 function __construct()
		 {
		   parent::__construct();
		 }
		 

		$data['title'] = 'Dashboard';
		$data['active'] = 'Dashboard';		

		$data['active_user'] = $this->user->active_user_details($_SESSION['username']);
		$data['preview'] = base_url() . "dist/assets/img/users/" . $data['active_user'][0]['preview']; 
		
		$data['positions']=$this->position->all_positions();

		foreach($data['positions'] as $position){
			if ($data['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}

		// $data['first_name'] = $data['active_user'][0]['first_name'];

		$data['users'] = $this->user->all_users();
		$data['customers'] = $this->customer->all_customers();
		$data['projects'] = $this->project->all_projects();
		$data['tasks'] = $this->task->all_tasks();
		$data['task_types'] = $this->task_type->all_task_types();
		$data['priorities'] = $this->priority->all_priorities();

		$this->load->view('dashboard', $data);


	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */