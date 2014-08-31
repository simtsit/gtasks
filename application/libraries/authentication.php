<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication {

	public function __construct ()
	{
		 session_start();
		 parent::__construct();

		if (!isset($_SESSION['username']))
		{
			redirect('login');
		}
	}
}

/* End of file Someclass.php */