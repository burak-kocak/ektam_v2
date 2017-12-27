<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Auth_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();

		if(empty($this->input->post('logout')))
			$this->default_loginRedirect();
		
		$this->load->model('Login_Model', 'login');
	}
	public function index()
	{
		$this->load->view('login');
	}

	public function validate_login() {
		if(!empty($this->input->post('logout'))) {
			// LOGOUT
			$this->session->sess_destroy();
		} else {
			// LOGIN
			$credentials = (object) [
				'username'	=>	$this->input->post('username', TRUE),
				'password'	=>	$this->input->post('password', TRUE)
			];

			$result = $this->login->index($credentials);

			if($result) 
				$this->session->set_userdata(array('user' => $result));
		}

		$this->control_loginRedirects();
	}
}
