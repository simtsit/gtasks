<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dontclickhere extends CI_Controller {

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
		
		$data['title']="Don't Click Here";
		$data['active'] = 'Dontclickhere';

		$info['active_user'] = $this->user->active_user_details($_SESSION['username']);
		$data['preview'] = base_url() . "dist/assets/img/users/" . $info['active_user'][0]['preview']; 
		
		$info['positions']=$this->position->all_positions();

		foreach($info['positions'] as $position){
			if ($info['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}
		$data['first_name'] = $info['active_user'][0]['first_name'];

		
		$data['positions'] = $this->position->all_positions();
		$this->load->view('Dontclickhere',$data);

	}

}

/* End of file dontclickhere.php */
/* Location: ./application/controllers/dontclickhere.php */