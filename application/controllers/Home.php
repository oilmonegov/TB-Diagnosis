<?php
/**
 *		*********************************
 *		PRORAM DOCUMENTATION SHEET
 *		*********************************
 *		Filename: Home.php
 *		Type: CodeIgniter Controller File
 *		*********************************	
 */

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Name: Home Class
 * Description:
 * The Home class is the default class of the Web Application that 
 * loads the homepage and user login page. It consists of only two 
 * member methods index() & login(), 
 *
 * @author hackdaemon
 */

class Home extends CI_Controller {
	/**
 	 * Default constructor: 
 	 * It loads the necessary helpers (URL helper), and libraries (Form Validation & Session Libraries), and sets the 
 	 * the default timezone to the Nigerian timezone.
 	 */
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Africa/Lagos'); // set the default timezone to Nigeria
		$this->load->helper('url'); // Load the URL helper
		$this->load->library('session'); // Load the Session Library
		$this->load->library('form_validation'); // Load the Form Validation Library
	}

	// Loads the default page for the Web Application
	public function index() {
		$this->session->sess_destroy(); // Destroy all session variables
		$this->load->view('home'); //Load the home.php view file
	}

	// Loads the the Web Application's login page
	public function login() {
		$this->load->view('login'); // Load the login.php view file
	}
}
