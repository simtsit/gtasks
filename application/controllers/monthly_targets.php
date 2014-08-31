<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Monthly_targets extends CI_Controller {

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
		$data['title'] = 'Monthly Target List';
		$data['active'] = 'Customers';

		$info['active_user'] = $this->user->active_user_details($_SESSION['username']);
		$data['preview'] = base_url() . "dist/assets/img/users/" . $info['active_user'][0]['preview']; 
		
		$info['positions']=$this->position->all_positions();

		foreach($info['positions'] as $position){
			if ($info['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}

		$data['first_name'] = $info['active_user'][0]['first_name'];

		$data['users'] = $this->user->all_users();
		$data['review_marks'] = $this->review_mark->all_review_marks();
		$data['monthly_reviews'] = $this->monthly_review->all_monthly_reviews();
		
		$this->load->view('monthly_reviews', $data);

	}

}

/* End of file monthly_targets.php */
/* Location: ./application/controllers/monthly_targets.php */