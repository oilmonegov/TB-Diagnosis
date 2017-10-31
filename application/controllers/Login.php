<?php
/**
 *		*********************************
 *		PRORAM DOCUMENTATION SHEET
 *		*********************************
 *		Filename: Login.php
 *		Type: CodeIgniter Controller File
 *		*********************************	
 */

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Name: Login Class
 * Description:
 * The login class is used to vaidate/authenticate users who login view the login view page. 
 *
 * @author hackdaemon
 */

class Login extends CI_Controller {
	/**
 	 * Default constructor: 
 	 * It loads the necessary helpers (URL helper), and libraries (Form Validation & Session Libraries), and sets the 
 	 * the default timezone to the Nigerian timezone. It also loads the Database Library and establishes a database 
 	 * connection to the backend database.
 	 */
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Africa/Lagos'); // set the default timezone to Nigeria
		$this->load->database(); // Establish database connection
		$this->load->helper('url'); // Load the URL helper
		$this->load->library('session'); // Load the Session Library
		$this->load->library('form_validation'); // Load the Form Validation Library
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url('home/login'));
	}

	public function login_user() {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$user['username'] = $this->input->post('username');
			$user['password'] = $this->input->post('password');

			$username_error_msg = [
									'required' => 'Username is required', 
									'min_length' => 'Minimum username length is 6',
									'max_length' => 'Maximum username length is 50'
								  ];

			$password_error_msg = [ 
									'required' => 'Password is required',
									'min_length' => 'Minimum password length is 6',
									'max_length' => 'Maximum password length is 255'
								  ];

			$this->form_validation->set_rules('username', 'Username', 'required|min_length[6]|max_length[50]', $username_error_msg);
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[255]', $password_error_msg);

			if (!$this->form_validation->run()) {
				$message = "<div class='alert alert-error'><center>". validation_errors() ."</center></div>";
				$this->session->set_flashdata('message', $message);
				$this->load->view('login');
			} else {
				$this->load->model('login_model');
				$validate_login = $this->login_model->validate_username_password($user);
		
				if ($validate_login) {
					$this->login_model->update_login_time($user['username']);
					redirect(base_url('user/dashboard'));
				} else {
					$this->session->set_flashdata('error_message', '<div class="alert alert-error"><center>Invalid login!</center></div>');
					$this->load->view('login');
				}
			}
		} else {
			redirect(base_url());
		}
		
	}
}
