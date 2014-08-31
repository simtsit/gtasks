<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects extends CI_Controller {


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
		$data['title'] = 'Projects list';
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
		
		$this->load->view('projects', $data);

	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */