<?php

/**
 *		*********************************
 *		PRORAM DOCUMENTATION SHEET
 *		*********************************
 *		Filename: User.php
 *		Type: CodeIgniter Controller File
 *		*********************************	
 */

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Name: User Class
 * @author hackdaemon
 */

class User extends CI_Controller {

	/**
 	 * Default constructor: 
 	 * It loads the necessary helpers (URL helper), and libraries (Database, Form Validation, & Session Libraries), and sets the 
 	 * the default timezone to the Nigerian timezone.
 	 */
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Africa/Lagos'); // set the default timezone to Nigeria
		$this->load->database();	// load the database library
		$this->load->helper('url');	// load the URL library
		$this->load->library('session');	// load the Session library
		$this->load->library('form_validation');	// load the form validation library
	}

	// this function cleans up the user input to secure it from cross-site scripting
	// and other security vunelrabilities 
	public function clean_data($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	public function delete_user() {
		$login_status = $this->session->userdata('isLoggedIn');
		$username = $this->session->userdata('username');

		if (!$login_status) {
			redirect(base_url('home/login'));
		}

		$this->load->model('user_model');
		$patient_id = $this->input->post('id');
		$delete = $this->user_model->delete_user($patient_id);

		if ($delete) {
			$message = "<div class='alert alert-success'>Patient record successfully deleted!</div>";
			$this->session->set_flashdata('error_message', $message);
			redirect(base_url('user/dashboard'));
		} else {
			$message = "<div class='alert alert-success'>Patient record could not be deleted successfully!</div>";
			$this->session->set_flashdata('error_message', $message);
			redirect(base_url('user/dashboard'));
		}
	}

	public function delete_staff() {
		$login_status = $this->session->userdata('isLoggedIn');
		$username = $this->session->userdata('username');

		if (!$login_status) {
			redirect(base_url('home/login'));
		}

		$this->load->model('user_model');
		$username = $this->input->post('uname');
		$delete = $this->user_model->delete_staff($username);

		if ($delete) {
			$message = "<div class='alert alert-success'>Staff record successfully deleted!</div>";
			$this->session->set_flashdata('error_message', $message);
			redirect(base_url('user/dashboard'));
		} else {
			$message = "<div class='alert alert-success'>Staff record could not be deleted successfully!</div>";
			$this->session->set_flashdata('error_message', $message);
			redirect(base_url('user/dashboard'));
		}
	}

	public function diagnose_result($id) {
		$login_status = $this->session->userdata('isLoggedIn');
		$username = $this->session->userdata('username');

		if (!$login_status) {
			redirect(base_url('home/login'));
		}
		
		$data['data'] = $this->user_model->get_patient_report($id);
		$data['name'] = $this->user_model->get_patient_names($id);

		$this->load->view('result', $data);
	}

	public function diagnose_handler() {
		$login_status = $this->session->userdata('isLoggedIn');
		$username = $this->session->userdata('username');

		if (!$login_status) {
			redirect(base_url('home/login'));
		}

		$critical = $moderate = $low = '';

		$this->session->set_userdata('diagnose', 1);

		//$userDetails['surname'] = $this->clean_data($this->input->post('surname'));
		//$userDetails['othernames'] = $this->clean_data($this->input->post('othernames'));
		//$userDetails['patient_id'] = $this->clean_data($this->input->post('patient_id'));	
		$userDetails['lymph_nodes'] = $this->input->post('lymph_nodes');
		$userDetails['abnormal_breast'] = $this->input->post('abnormal_breast');
		$userDetails['rale_breath'] = $this->input->post('rale_breath');
		$userDetails['cough'] = $this->input->post('cough');
		$userDetails['hemoptysis'] = $this->input->post('hemoptysis');
		$userDetails['chest_pain'] = $this->input->post('chest_pain');
		$userDetails['fever'] = $this->input->post('fever');
		$userDetails['weight'] = $this->input->post('weight');
		$userDetails['night_sweats'] = $this->input->post('night_sweats');	
		$userDetails['appetite'] = $this->input->post('appetite');
		$userDetails['fatigue'] = $this->input->post('fatigue');
		$userDetails['hiv'] = $this->input->post('hiv');
		$userDetails['radiography'] = $this->input->post('radiography');
		$userDetails['skin_test'] = $this->input->post('skin_test');
		$userDetails['blood_test'] = $this->input->post('blood_test');	

		$details['captcha_word'] = $this->input->post('captcha_word');
		$details['captcha'] = $this->input->post('captcha');

		if ($details['captcha_word'] !== $details['captcha']) {
			$message = '<div class="container-fluid"><div class="alert alert-error">Captcha text does not match with the captcha image</div></div>';
			$this->session->set_flashdata('error_message', $message);
			redirect(base_url('user/diagnose'));
		}

			$critical = $userDetails['hiv'] == 'Positive' && $userDetails['radiography'] == 'Positive' && $userDetails['skin_test'] == 'Positive' && $userDetails['blood_test'] == 'Positive' && $userDetails['weight'] == 'Yes' && $userDetails['lymph_nodes'] == 'Yes' && $userDetails['hemoptysis'] == 'Yes' && $userDetails['cough'] == 'Yes' && $userDetails['fever'] == 'Yes' && $userDetails['appetite'] == 'Yes' && $userDetails['fatigue'] == 'Yes';

			$moderate = $userDetails['skin_test'] == 'Positive' && $userDetails['blood_test'] == 'Positive' && $userDetails['weight'] == 'Yes' && $userDetails['lymph_nodes'] == 'Yes' && $userDetails['fever'] == 'Yes' || $userDetails['appetite'] == 'Yes' || $userDetails['fatigue'] == 'Yes';

			$low =  $userDetails['weight'] == 'Yes' || $userDetails['lymph_nodes'] == 'Yes' || $userDetails['cough'] == 'Yes' || $userDetails['fever'] == 'Yes' || $userDetails['appetite'] == 'Yes' || $userDetails['fatigue'] == 'Yes' && $userDetails['hiv'] == 'Negative' && $userDetails['radiography'] == 'Negative' && $userDetails['skin_test'] == 'Negative' && $userDetails['blood_test'] == 'Negative';

			if ($critical && $moderate) {
				$diagnosis = 4;
			} elseif ($critical || $moderate) {
				$diagnosis = 3;
			} elseif ($moderate) {
				$diagnosis = 2;
			} elseif ($low) {
				$diagnosis = 1;
			} else {
				$diagnosis = 0;
			}

			$last_patient_id = $this->user_model->insert_patient_report($diagnosis);
			
			redirect(base_url('user/diagnose_result/' . $last_patient_id));
		
	}
	
	public function report()
	{
		$data['report'] = $this->db->get('diagnosis_report')->result();
		$this->load->view('report', $data);
	}

	public function diagnose() {
		$login_status = $this->session->userdata('isLoggedIn');
		$username = $this->session->userdata('username');

		if (!$login_status) {
			redirect(base_url('home/login'));
		}

		$this->load->helper('captcha');

		$captcha_config = array(
			'img_path' => 'captcha_images/', 
			'img_url' => base_url(). '/captcha_images',
			'img_width' => 150,
			'img_height' => 30,
			'word_length' => 8,
			'expiration' => 120,
			'font_size' => 12,
			'pool' => '0123456789ABCDEF',
			'colors' => array(
                'background' => array(0, 0, 0),
                'border' => array(251, 102, 234),
                'text' => array(251, 102, 234),
                'grid' => array(0, 0, 0)
       		)
       	);

		$captcha = create_captcha($captcha_config);
		$data['captcha'] = $captcha;

		$data['patient_details'] = $this->user_model->get_all_patient();

		$this->load->view('diagnose', $data);
	}

	public function add_patient_handler() {
		$login_status = $this->session->userdata('isLoggedIn');
		$username = $this->session->userdata('username');

		if (!$login_status) {
			redirect(base_url('home/login'));
		}

		$this->load->model('user_model');

		$userDetails['surname'] = $this->clean_data($this->input->post('surname'));
		$userDetails['othernames'] = $this->clean_data($this->input->post('othernames'));
		$userDetails['address'] = $this->clean_data($this->input->post('address'));
		$userDetails['mobile_number'] = $this->clean_data($this->input->post('mobile_number'));
		$userDetails['birth_date'] = $this->clean_data($this->input->post('birth_date'));
		$userDetails['sex'] = $this->clean_data($this->input->post('sex'));
		$userDetails['marital_status'] = $this->clean_data($this->input->post('marital_status'));
		$userDetails['blood_group'] = $this->clean_data($this->input->post('blood_group'));
		$userDetails['registration_date'] = date('Y-m-d');
		$details['captcha_word'] = $this->input->post('captcha_word');
		$details['captcha'] = $this->input->post('captcha');

		if ($details['captcha_word'] !== $details['captcha']) {
			$message = '<div class="container-fluid"><div class="alert alert-error">Captcha text does not match with the captcha image</div></div>';
			$this->session->set_flashdata('error_message', $message);
			redirect(base_url('user/change_password'));
		}

		$this->form_validation->set_rules('surname', 'Surname', 'required|min_length[1]');
		$this->form_validation->set_rules('othernames', 'Other Name', 'required|min_length[1]');
		$this->form_validation->set_rules('address', 'Address', 'required|min_length[6]');
		$this->form_validation->set_rules('mobile_number', 'Birth Date', 'required|min_length[11]|max_length[11]|is_unique[patient_biodata.mobile_number]');
		$this->form_validation->set_rules('birth_date', 'Birth Date', 'required');

		if ($this->form_validation->run()) {
			$new_patient = $this->user_model->create_new_patient($userDetails);
	
			if ($new_patient) {
				$message = "<div class='alert alert-success'>Patient record successfully created!</div>";
				$this->session->set_flashdata('error_message', $message);
			} else {
				$this->session->set_flashdata('error_message', '<div class="alert alert-error">Patient record not successfully created!</div>');
			}

			redirect(base_url('user/dashboard'));
		} else {
			$message = "<div class='alert alert-error'>". validation_errors() ."</div>";
			$this->session->set_flashdata('error_message', $message);
			redirect(base_url('user/add_patient'));
		}
	}

	public function add_staff_handler() {
		$login_status = $this->session->userdata('isLoggedIn');
		$username = $this->session->userdata('username');

		if (!$login_status) {
			redirect(base_url('home/login'));
		}

		$this->load->model('user_model');

		$userDetails['surname'] = $this->clean_data($this->input->post('surname'));
		$userDetails['othernames'] = $this->clean_data($this->input->post('othernames'));
		$userDetails['password'] = $this->clean_data($this->input->post('password'));
		$userDetails['cpassword'] = $this->clean_data($this->input->post('cpassword'));
		$userDetails['username'] = $this->clean_data($this->input->post('username'));

		$details['captcha_word'] = $this->input->post('captcha_word');
		$details['captcha'] = $this->input->post('captcha');

		if ($details['captcha_word'] !== $details['captcha']) {
			$message = '<div class="container-fluid"><div class="alert alert-error">Captcha text does not match with the captcha image</div></div>';
			$this->session->set_flashdata('error_message', $message);
			redirect(base_url('user/add_staff'));
		}


		$this->form_validation->set_rules('username', 'Username', 'is_unique[user.username]|required|min_length[6]');
		$this->form_validation->set_rules('surname', 'Surname', 'required|min_length[1]');
		$this->form_validation->set_rules('othernames', 'Other Name', 'required|min_length[1]');
		$this->form_validation->set_rules('password', 'Password', 'matches[cpassword]|required|min_length[6]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'matches[password]|required|min_length[6]');

		if ($this->form_validation->run()) {
			$new_staff = $this->user_model->create_new_staff($userDetails);
	
			if ($new_staff) {
				$message = "<div class='alert alert-success'>Medical staff account successfully created!</div>";
				$this->session->set_flashdata('error_message', $message);
			} else {
				$this->session->set_flashdata('error_message', '<div class="alert alert-error">Medical staff account was not successfully created!</div>');
			}

			redirect(base_url('user/dashboard'));
		} else {
			$message = "<div class='alert alert-error'>". validation_errors() ."</div>";
			$this->session->set_flashdata('error_message', $message);
			redirect(base_url('user/add_staff'));
		}
	}

	public function change_password() {
		$login_status = $this->session->userdata('isLoggedIn');
		$username = $this->session->userdata('username');

		if (!$login_status) {
			redirect(base_url('home/login'));
		}

		$this->load->helper('captcha');
		$captcha_config = array(
						'img_path' => 'captcha_images/',
						'img_url' => base_url(). '/captcha_images',
						'img_width' => 150,
						'img_height' => 30,
						'word_length' => 8,
						'expiration' => 120,
						'font_size' => 12,
						'pool' => '0123456789ABCDEF',
        				'colors' => array(
                			'background' => array(0, 0, 0),
                			'border' => array(251, 102, 234),
                			'text' => array(251, 102, 234),
                			'grid' => array(0, 0, 0)
        				)
        			);

		$captcha = create_captcha($captcha_config);
		$data['captcha'] = $captcha;

		$this->load->view('changepassword', $data);
	}

	public function change_password_handler() {
		$login_status = $this->session->userdata('isLoggedIn');
		$username = $this->session->userdata('username');

		if (!$login_status) {
			redirect(base_url('home/login'));
		}
		
		$this->load->model('user_model');
		
		$detail['password'] = $this->clean_data($this->input->post('password'));
		$detail['new_password'] = $this->input->post('newpassword');
		$detail['confirm_new_password'] = $this->input->post('cnewpassword');
		$details['captcha_word'] = $this->input->post('captcha_word');
		$details['captcha'] = $this->input->post('captcha');

		if ($details['captcha_word'] !== $details['captcha']) {
			$message = '<div class="container-fluid"><div class="alert alert-error">Captcha text does not match with the captcha image</div></div>';
			$this->session->set_flashdata('error_message', $message);
			redirect(base_url('user/change_password'));
		}

		$this->form_validation->set_rules('newpassword', 'New Password', 'matches[cnewpassword]|required|min_length[6]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('cnewpassword', 'Confirm New Password', 'matches[newpassword]|required|min_length[6]');

		if ($this->form_validation->run()) {
			$update = $this->user_model->update_password($this->session->userdata('username'), $detail['password'], $detail['new_password']);

			if ($update) {
				$this->session->set_flashdata('error_message', '<div class="container-fluid"><div class="alert alert-success">Your password has been successfully updated!</div></div>');
			} else {
				$this->session->set_flashdata('error_message', '<div class="container-fluid"><div class="alert alert-success">Your password could not be successfully updated!</div></div>');
			}

			redirect(base_url('user/change_password'));
			
		} else {
			$message = '<div class="container-fluid"><div class="alert alert-error">'. validation_errors() .'</div></div>';
			$this->session->set_flashdata('error_message', $message);
			redirect(base_url('user/change_password'));
		}
	}

	public function update_profile() {
		$login_status = $this->session->userdata('isLoggedIn');
		$username = $this->session->userdata('username');

		if (!$login_status) {
			redirect(base_url('home/login'));
		}

		$this->load->model('user_model');

		$userDetails['surname'] = $this->clean_data($this->input->post('surname'));
		$userDetails['othernames'] = $this->clean_data($this->input->post('othernames'));
		$userDetails['captcha_word'] = $this->input->post('captcha_word');
		$userDetails['captcha'] = $this->input->post('captcha');

		if ($userDetails['captcha_word'] !== $userDetails['captcha']) {
			$message = '<div class="container-fluid"><div class="alert alert-error">Captcha text does not match with the captcha image</div></div>';
			$this->session->set_flashdata('error_message', $message);
			redirect(base_url('user/profile'));
		}
		
		$this->form_validation->set_rules('surname', 'Surname', 'required|min_length[1]');
		$this->form_validation->set_rules('othernames', 'Other Name', 'required|min_length[1]');
		$this->form_validation->set_rules('captcha', 'Captcha', 'required|min_length[8]');
		
		if ($this->form_validation->run()) {
			$edit_staff = $this->user_model->edit_staff($userDetails);
	
			if ($edit_staff) {
				$message = '<div class="container-fluid"><div class="alert alert-success">Your profile was successfully updated!</div></div>';
				$this->session->set_flashdata('error_message', $message);
			} else {
				$this->session->set_flashdata('error_message', '<div class="container-fluid"><div class="alert alert-error">Your profile was not successfully updated!</div></div>');
			}

			redirect(base_url('user/profile'));
		} else {
			$message = '<div class="container-fluid"><div class="alert alert-error">'. validation_errors() .'</div></div>';
			$this->session->set_flashdata('error_message', $message);
			redirect(base_url('user/profile'));
		}
	}

	public function add_patient() {
		$login_status = $this->session->userdata('isLoggedIn');
		$username = $this->session->userdata('username');

		if (!$login_status) {
			redirect(base_url('home/login'));
		}

		$this->load->model('user_model');
		$this->load->helper('captcha');

		$captcha_config = array(
				'img_path' => 'captcha_images/',
				'img_url' => base_url(). '/captcha_images',
				'img_width' => 150, 'img_height' => 30,
				'word_length' => 8,
				'expiration' => 120,
				'font_size' => 12,
				'pool' => '0123456789ABCDEF',
        		'colors' => array(
                	'background' => array(0, 0, 0),
                	'border' => array(251, 102, 234),
                	'text' => array(251, 102, 234),
                	'grid' => array(0, 0, 0)
        		)
        	);

		$captcha = create_captcha($captcha_config);
		$data['captcha'] = $captcha;
		$this->load->view('addpatient', $data);
	}

	public function add_staff() {
		$login_status = $this->session->userdata('isLoggedIn');
		$username = $this->session->userdata('username');

		if (!$login_status) {
			redirect(base_url('home/login'));
		}

		$this->load->helper('captcha');

		$captcha_config = array(
					'img_path' => 'captcha_images/',
					'img_url' => base_url(). '/captcha_images',
					'img_width' => 150, 'img_height' => 30,
					'word_length' => 8,'expiration' => 120,
					'font_size' => 12, 'pool' => '0123456789ABCDEF',
        			'colors' => array(
                		'background' => array(0, 0, 0),
                		'border' => array(251, 102, 234),
                		'text' => array(251, 102, 234),
                		'grid' => array(0, 0, 0)
        			)
        		);

		$captcha = create_captcha($captcha_config);
		$data['captcha'] = $captcha;
		$this->load->view('addstaff', $data);
	}

	public function dashboard() {
		$login_status = $this->session->userdata('isLoggedIn');
		$username = $this->session->userdata('username');

		if (!$login_status) {
			redirect(base_url('home/login'));
		}

		$this->load->model('user_model');
		$this->load->library('pagination');

		$data['total_users'] = $this->user_model->get_total_users();
		$data['total_patients'] = $this->user_model->get_total_patients();
		$data['patient_details'] = $this->user_model->get_all_patient();
		$data['staff_details'] = $this->user_model->get_all_staff();
		$data['count'] = 0;
		$data['count2'] = 0;

		$config['base_url'] = base_url('page');
		$config['total_rows'] = $data['total_users'];
		$config['per_page'] = 1;

		$data['links'] = $this->pagination->initialize($config);
		$this->load->view('dashboard', $data);
	}

	public function profile() {
		$login_status = $this->session->userdata('isLoggedIn');
		$username = $this->session->userdata('username');

		if (!$login_status) {
			redirect(base_url('home/login'));
		}

		$this->load->model('user_model');

		$staff_detail = $this->user_model->get_staff($username);

		foreach ($staff_detail as $staff) {
			$data['name'] = $staff->othernames . ' ' . $staff->surname;
			$data['username'] = $staff->username;
			$data['last_login_time'] = $staff->last_login_time;
			$data['surname'] = $staff->surname;
			$data['othernames'] = $staff->othernames;
		}

		$this->load->helper('captcha');
		
		$captcha_config = array('img_path' => 'captcha_images/',
					'img_url' => base_url(). '/captcha_images',
					'img_width' => 150, 'img_height' => 30,
					'word_length' => 8,'expiration' => 120,
					'font_size' => 12,
					'pool' => '0123456789ABCDEF',
		        	'colors'        => array(
		                'background' => array(0, 0, 0),
		                'border' => array(251, 102, 234),
		                'text' => array(251, 102, 234),
		                'grid' => array(0, 0, 0)
        			)
        		);

		$captcha = create_captcha($captcha_config);
		$data['captcha'] = $captcha;

		$this->load->view('profile', $data);
	}
}
