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
				
				$data['active_user'] = $this->user->active_user_details($_SESSION['username']);

				$_SESSION['user'] = $data['active_user'][0]['username'];

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

/* End of file login.php */
/* Location: ./application/controllers/login.php */