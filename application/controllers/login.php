<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		session_start();
	}


	/**
	 * Index Page for this controller.
	 *
	 */
	public function index(){
		// $data['title'] = 'Gecko Tasks Login';
		
		// $this->load->library('form_validation');
		// $this->form_validation->set_rules('username','Username','required');
		// $this->form_validation->set_rules('password','Password','required');
		
		// if($this->form_validation->run() !== false) {
		// 	//then vlidation passed. get from the db.
		// 	$this->load->model('user');
		// 	$this->user->verify_user('simos','haha');
		// }

		if (isset($_SESSION['username']) ) {
			redirect('dashboard');
		}


		$this->load->library('form_validation');
		$this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');

		if ($this->form_validation->run() !== false ) {
			// then validation passed. Get from the db.
			$this->load->model('admin_model');
			$res = $this
					->admin_model
					->verify_user(
						$this->input->post('email_address'), 
						$this->input->post('password')
					);
		
			if ($res !== false ) {
				// person has an account
				$_SESSION['username'] = $this->input->post('email_address');

				redirect('dashboard');
			}

		}

		$this->load->view('login');

	}



	public function logout()
	{
		session_destroy();
		$this->load->view('login');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */