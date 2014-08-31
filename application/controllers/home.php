<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

   public function __construct ()
   {
      session_start();
      parent::__construct();

      if (!isset($_SESSION['username']))
      {
         redirect('login');
      }
   }

 function index()
 {
   // if($this->session->userdata('logged_in'))
   // {
   //   $session_data = $this->session->userdata('logged_in');
   //   $data['username'] = $session_data['username'];
   //   $this->load->view('home_view', $data);
   // }
   // else
   // {
   //   //If no session, redirect to login page
   //   redirect('login', 'refresh');
   // }

   $data['users'] = $this->user->all_users();
   $this->load->view('dashboard', $data);
 }

 // function logout()
 // {
 //   $this->session->unset_userdata('logged_in');
 //   session_destroy();
 //   redirect('home', 'refresh');
 // }

}

?>
