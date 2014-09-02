<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

}

/* End of file projects.php */
/* Location: ./application/controllers/projects.php */