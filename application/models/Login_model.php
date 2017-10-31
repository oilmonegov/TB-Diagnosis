<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	public $details;

	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Africa/Lagos'); // set the default timezone to Nigeria
	}

	public function clean_login_input($details) {
		$details = htmlspecialchars(stripslashes(strtolower(trim($details))));
    	return $details;
	}

	public function validate_username_password($userDetails) {
   		$username = $this->clean_login_input($userDetails['username']);
    	$password = $this->clean_login_input($userDetails['password']);
    	$hash = $this->get_hashed_password($username);

    	if ($hash !== NULL) {
	    	if (password_verify($password, $hash)) {

	    		$where_clause = ['username' => $username];

	    		try {
		    		$result = $this->db->get_where('user', $where_clause)->result();

		    		if (is_array($result) && count($result) > 0 && $result !== NULL) {
		    			$this->details = $result[0];
		    			$this->set_session();

		    			return TRUE;
		    		}
    			} catch (Exception $e) {
    				$this->show_error($e);
    			}

	    	}
	    }
	    return FALSE; 
	}

	public function set_session() {
		$this->session->set_userdata(
			[
        		'fullname' => $this->details->othernames . ' ' . $this->details->surname,
        		'username' => $this->details->username,
        		'last_login_time' => $this->details->last_login_time,
        		'othername' => $this->details->othernames,
        		'surname' => $this->details->surname,
        		'isLoggedIn' => TRUE
    		]
    	);
	}

	public function get_hashed_password($username) {
		$where_clause = ['username' => $username];

		try {
  			$password = $this->db->get_where('user', $where_clause)->result();

  			foreach ($password as $hash) {
 				return $hash->password;
 			}
  		} catch (Exception $e) {
			$this->show_error($e);
		}
	}

	public function update_login_time($username) {
		$where_clause = 'username='.$this->db->escape($username);

		try {
			$this->db->where($where_clause)->update('user', array('last_login_time' => date('Y-m-d H:i:s')));
		} catch (Exception $e) {
			$this->show_error($e);
		}
  	}

  	public function show_error($e) {
  		$data['error_msg'] = $e->getMessage();
    	$this->load->view('error', $data);
  	}
}