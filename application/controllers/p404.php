<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class P404 extends CI_Controller {


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


				$info['active_user'] = $this->user->active_user_details($_SESSION['username']);
		$data['preview'] = base_url() . "dist/assets/img/users/" . $info['active_user'][0]['preview']; 
		
		$info['positions']=$this->position->all_positions();

		foreach($info['positions'] as $position){
			if ($info['active_user'][0]['position'] == $position['id'])
				$data['position'] = $position['name']; 
		}

		
		$this->load->view('p404', $data);

	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */