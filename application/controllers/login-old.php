<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		// $this->load->database();
		
		// $query = $this->db->query('SELECT username,password FROM users');

		// foreach ($query->result() as $row)
		// {
		//     echo $row->username;
		//     echo $row->password;

		// }
		// echo 'Total Results: ' . $query->num_rows();


		 function __construct()
		 {
		   parent::__construct();
		 }
		 


		$this->load->helper(array('form'));
		 $this->load->view('login_view');

		// $this->load->view('login');


	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */