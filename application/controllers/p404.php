<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class P404 extends CI_Controller {

/** 
*   This fucntion check if user is loged in.
*  If not, it redirects user to login page.
*
*/
	public function __construct ()
	{
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
		$data['title'] = 'Page not Found';
		$data['active'] = 'pagenotfound';


				$data['active_user'] = $this->user->active_user_details($_SESSION['username']);
		$data['preview'] = base_url() . "dist/assets/img/users/" . $data['active_user'][0]['preview']; 
		
		$info['positions']=$this->position->all_positions();

		foreach($info['positions'] as $position){
			if ($data['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}

		
		$this->load->view('p404', $data);

	}


}

/* End of file p404.php */
/* Location: ./application/controllers/p404.php */