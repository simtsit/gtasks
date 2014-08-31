<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {


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

		foreach($info['positions'] as $position){
			if ($info['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}

		$data['first_name'] = $info['active_user'][0]['first_name'];

		
		$data['positions'] = $this->position->all_positions();
		$data['users'] = $this->user->get_user($username);

		//$data['user_id'] = $this->user->get_user_id($username);

		// $user_ids = $this->user->get_user_id($username);
		// $user_id=$user_ids->id;

		$data['monthly_reviews'] = $this->monthly_review->user_monthly_reviews($data['users'][0]['id']);

		$data['usernames'] = $this->user->all_users();
		$data['review_marks'] = $this->review_mark->all_review_marks();
		




		
		$this->load->view('user_profile', $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */